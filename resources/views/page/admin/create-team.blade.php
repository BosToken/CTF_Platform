<x-layout.admin>
    <title>Create Team</title>
    <h1 class="text-center mb-3">Create Team</h1>

    <form action="{{ route('admin-store-team') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Team Name</label>
            <input type="text" class="form-control" placeholder="Team Name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout.admin>
