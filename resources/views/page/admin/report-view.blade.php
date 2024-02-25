<!DOCTYPE html>
<html>

<head>
    <title>Report {{ $information->information }}</title>
    <style>
        body {
            /* background-color: #161A1D; */
            color: black;
        }

        h1 {
            text-align: center;
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            padding: 8px;
        }

        table tr:nth-child(even) {
            background-color: grey;
            color: white;
        }

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
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

    <h1>{{ $information->information }}</h1>
    <p>{{ $information->description }}</p>

    <br>
    <h3>Training Challenge</h3>
    <table>
        <tr>
            <th>Total Challenge</th>
            <th>Total Category</th>
            <th>Total Training Score</th>
        </tr>
        <tr>
            <td>{{ $totalChallenge }}</td>
            <td>{{ $totalCategory }}</td>
            <td>{{ $score }}</td>
        </tr>
    </table>

    <br>
    <h3>Challenge Detail</h3>
    <table>
        <tr>
            <th>#</th>
            <th>Challenge Name</th>
            <th>Category</th>
            <th>Type</th>
            <th>Solves Number</th>
            <th>Value</th>
        </tr>
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
    </table>

    <br>
    <h3>Delegation Training</h3>
    <table>
        <tr>
            <th>Total Team</th>
            <th>Total Delegation</th>
        </tr>
        <tr>
            <td>{{ $team }}</td>
            <td>{{ $user }}</td>
        </tr>
    </table>

    <br>
    <h3>Delegation Detail</h3>

    @foreach ($information->manages as $key => $user)
        @php
            $userScore = $user->user->solvers->whereIn('challenge_id', $challenge_id)->sum('challenge.value');
        @endphp
        <table>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>FullName</th>
                <th>Team</th>
                <th>Total Solve</th>
                <th>Training Score</th>
            </tr>
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->user->username }}</td>
                <td>{{ $user->user->name }}</td>
                <td>{{ $user->team->name }}</td>
                <td>{{ count($user->user->solvers) }}</td>
                <td>{{ $userScore }}</td>
            </tr>
        </table>
        <table>
            <tr>
                <th>#</th>
                <th>Challenge Name</th>
                <th>Category</th>
                <th>Value</th>
            </tr>
            @if (count($user->user->solvers) === 0)
                <tr>
                    <td colspan="4">
                        <center>Not Challenge Solve</center>
                    </td>
                </tr>
            @endif
            @foreach ($user->user->solvers as $key => $solve)
                @if ($solve->challenge->information_id == $information->id)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $solve->challenge->name }}</td>
                        <td>{{ $solve->challenge->category->name }}</td>
                        <td>{{ $solve->challenge->value }}</td>
                    </tr>
                @endif
            @endforeach
        </table>
        <br>
    @endforeach

</body>

</html>
