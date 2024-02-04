<x-layout.admin>
    <title>Create Challenge</title>
    <h1 class="text-center mb-3">Create Challenge</h1>

    <form action="{{ route('admin-store-challenge') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Challenge Name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" required></textarea>
            <div id="emailHelp" class="form-text">You can enter the script in this input column.</div>
        </div>

        <label for="exampleFormControlTextarea1" class="form-label">Category</label>
        <div class="input-group mb-3">
            <select class="form-select" name="challenge_categories_id" id="inputGroupSelect02">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <label for="exampleFormControlTextarea1" class="form-label">Information</label>
        <div class="input-group mb-3">
            <select class="form-select" name="information_id" id="inputGroupSelect02">
                @foreach ($informations as $information)
                    <option value="{{ $information->id }}">{{ $information->information }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Value</label>
            <input type="number" class="form-control" name="value" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Flag</label>
            <input type="text" class="form-control" name="flag" required>
        </div>

        <label for="exampleFormControlTextarea1" class="form-label">Type</label>
        <div class="input-group mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="challenge_type" id="flexRadioDefault1"
                    value=1 checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Dynamic
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="challenge_type" id="flexRadioDefault2"
                    value=0>
                <label class="form-check-label" for="flexRadioDefault2">
                    Static
                </label>
            </div>
            
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout.admin>
