<x-layout.admin>
    <title>Detail Team</title>
    <h1 class="text-center mb-3">Detail Team</h1>

    <form action="/admin/team/update/{{ $team->id }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">
                Team Name
            </label>
            <input type="text" class="form-control" placeholder="Team Name" name="name" value="{{ $team->name }}"
                required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="/admin/team/delete/{{ $team->id }}" class="btn btn-danger">Delete</a>
    </form>
</x-layout.admin>
