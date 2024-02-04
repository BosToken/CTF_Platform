<x-layout.admin>
    <title>Admin Challenges</title>
    <h1 class="text-center mb-3"><a href="{{ route('admin-create-challenge') }}">Challenges</a></h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Value</th>
                <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($challenges as $key => $challenge)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td><a href="/admin/challenges/detail/{{ $challenge->id }}"
                            style="text-decoration: none;">{{ $challenge->name }}</a></td>
                    <td>{{ $challenge->category }}</td>
                    <td>{{ $challenge->value }}</td>
                    @if ($challenge->challenge_type === 1)
                        <td>Dynamic</td>
                    @endif
                    @if ($challenge->challenge_type === 0)
                        <td>Static</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.admin>
