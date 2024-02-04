<x-layout.admin>
    <title>Create User</title>
    <h1 class="text-center mb-3">Create User</h1>

    <form action="{{ route('admin-store-user') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Full Name</label>
            <input type="text" class="form-control" placeholder="Full Name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout.admin>
