<x-layout.admin>
    <title>Create Information</title>
    <h1 class="text-center mb-3">Create Information</h1>

    <form action="{{ route('admin-store-information') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Information Name" name="information" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout.admin>
