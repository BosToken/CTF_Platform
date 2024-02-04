<x-layout.admin>
    <title>Admin Manage</title>
    <h1 class="text-center mb-3"><a href="{{ route('admin-create-team-manage') }}">Manage</a></h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Competition</th>
                <th scope="col">Team</th>
                <th scope="col">User</th>
                <th scope="col">Fullname</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($manages as $key => $manage)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{$manage->information->information}}</td>
                    <td>{{$manage->team->name}}</td>
                    <td>{{$manage->user->username}}</td>
                    <td>{{$manage->user->name}}</td>
                    <td><a href="/admin/team-manage/delete/{{ $manage->id }}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.admin>
