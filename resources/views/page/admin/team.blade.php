<x-layout.admin>
    <title>Admin Team</title>
    <h1 class="text-center mb-3"><a href="{{ route('admin-create-team') }}">Team</a></h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $key => $team)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td><a href="/admin/team/detail/{{ $team->id }}"
                            style="text-decoration: none;">{{ $team->name }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.admin>
