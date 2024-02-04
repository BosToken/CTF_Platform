<x-layout.admin>
    <title>Detail User</title>
    <h1 class="text-center mb-3">Detail User</h1>

    <form action="/admin/user/update/{{ $user->id }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username" value="{{ $user->username }}"
                required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Fullname</label>
            <input type="text" class="form-control" placeholder="Fullname" name="name" value="{{ $user->name }}"
                required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="/admin/user/delete/{{ $user->id }}" class="btn btn-danger">Delete</a>
    </form>
</x-layout.admin>
