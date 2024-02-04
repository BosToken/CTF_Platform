<x-layout.admin>
    <title>Detail Challenge</title>
    <h1 class="text-center mb-3">Detail Challenge</h1>

    <form action="/admin/challenge/update/{{ $challenge->id }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Challenge Name" name="name"
                value="{{ $challenge->name }}" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" required>{{ $challenge->message }}</textarea>
            <div id="emailHelp" class="form-text">You can enter the script in this input column.</div>
        </div>

        <label for="exampleFormControlTextarea1" class="form-label">Category</label>
        <div class="input-group mb-3">
            <select class="form-select" name="challenge_categories_id" id="inputGroupSelect02">
                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Value</label>
            <input type="number" class="form-control" name="value" value="{{ $challenge->value }}" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Flag</label>
            <input type="text" class="form-control" name="flag" value="{{ $challenge->flag }}" required>
        </div>

        <label for="exampleFormControlTextarea1" class="form-label">Type</label>
        <div class="input-group mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="challenge_type" id="flexRadioDefault1" value=1
                    checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Dynamic
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="challenge_type" id="flexRadioDefault2" value=0>
                <label class="form-check-label" for="flexRadioDefault2">
                    Static
                </label>
            </div>

        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="/admin/challenge/delete/{{ $challenge->id }}" class="btn btn-danger">Delete</a>
    </form>
</x-layout.admin>
