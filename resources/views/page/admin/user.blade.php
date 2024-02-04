<x-layout.admin>
    <title>Admin User</title>
    <h1 class="text-center mb-3"><a href="{{ route('admin-create-user') }}">User</a></h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Full Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td><a href="/admin/user/detail/{{ $user->id }}"
                            style="text-decoration: none;">{{ $user->username }}</a></td>
                    <td>{{ $user->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.admin>
