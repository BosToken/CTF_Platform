<x-layout.admin>
    <title>Admin Dashboard</title>
    <h1 class="text-center mb-3">Dashboard</h1>
    @foreach ($informations as $information)
        @php
            $score = 0;
            $user = 0;
            $team = 0;

            if (!empty($information->challenges)) {
                foreach ($information->challenges as $challenge) {
                    $score += $challenge->value;
                }
            }
            if (!empty($information->manages)) {
                $user = count($information->manages->groupBy('user_id'));
                $team = count($information->manages->groupBy('team_id'));
            }
        @endphp
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">{{ $information->information }}</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Challenge</th>
                            <th scope="col">Team</th>
                            <th scope="col">User</th>
                            <th scope="col">Total Training score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ count($information->challenges) }}</td>
                            <td>{{ $team }}</td>
                            <td>{{ $user }}</td>
                            <td>{{ $score }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <center><a href="/admin/report/{{$information->id}}" class="btn btn-success my-3">Detail</a> <a href="/admin/report-download/{{$information->id}}" class="btn btn-primary my-3">Download PDF</a></center>
        </div>
    @endforeach
</x-layout.admin>
