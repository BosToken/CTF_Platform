<x-layout.user>
    <title>Scoreboard</title>
    <h1 class="text-center mb-3">Scoreboard</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Place</th>
                <th scope="col">Username</th>
                <th scope="col">Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td><a href="user/{{ $user['username'] }}" style="text-decoration: none;">{{ $user['username'] }}</a></td>
                    <td>{{ $user['score'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout.user>
