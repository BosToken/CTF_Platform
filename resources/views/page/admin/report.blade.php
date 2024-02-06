<x-layout.admin>

    <title>Report {{ $information->information }}</title>
    @php
        $score = 0;
        $user = count($information->manages->groupBy('user_id'));
        $userGroup = $information->manages->groupBy('user_id');
        $challenge_id = [];
        $team = count($information->manages->groupBy('team_id'));
        $totalChallenge = count($information->challenges);
        $totalCategory = count($information->challenges->groupBy('category.id'));

        foreach ($information->challenges as $challenge) {
            $score += $challenge->value;
        }

        foreach ($information->challenges as $challenge) {
            array_push($challenge_id, $challenge->id);
        }
    @endphp

    <div class="mt-5 mb-4">
        <h5>Competition : {{ $information->information }}</h5>
        <h5>Description : {{ $information->description }}</h5>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Training Challenge</h5>
            <table class="table mb-3">
                <thead>
                    <tr>
                        <th scope="col">Total Challenge</th>
                        <th scope="col">Total Category</th>
                        <th scope="col">Total Training Score</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $totalChallenge }}</td>
                        <td>{{ $totalCategory }}</td>
                        <td>{{ $score }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table mb-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Challenge Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Type</th>
                        <th scope="col">Solves Number</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($information->challenges as $key => $challenge)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $challenge->name }}</td>
                            <td>{{ $challenge->category->name }}</td>
                            @if ($challenge->challenge_type === 1)
                                <td>Dynamic</td>
                            @else
                                <td>Static</td>
                            @endif
                            <td>{{ count($challenge->solvers) }}</td>
                            <td>{{ $challenge->value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card ">
        <div class="card-body">
            <h5 class="card-title">Delegation Training</h5>
            <table class="table mb-3">
                <thead>
                    <tr>
                        <th scope="col">Total Team</th>
                        <th scope="col">Total Delegation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $team }}</td>
                        <td>{{ $user }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table mb-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">FullName</th>
                        <th scope="col">Team</th>
                        <th scope="col">Total Solve</th>
                        <th scope="col">Training Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($information->manages as $key => $user)
                        @php
                            $userScore = $user->user->solvers->whereIn('challenge_id', $challenge_id)->sum('challenge.value');
                        @endphp

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->user->username }}</td>
                            <td>{{ $user->user->name }}</td>
                            <td>{{ $user->team->name }}</td>
                            <td>{{ count($user->user->solvers) }}</td>
                            <td>{{ $userScore }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- </body>

</html> --}}
</x-layout.admin>
