<x-layout.user>
    <title>Profile</title>
    <center>

        @if (count($users) === 0)
            <h1 class="text-center mb-3">Scoreboard</h1>
        @else
            @foreach ($users as $user)
                <div class="py-2" style="border: 1px solid black; border-radius: 10px;">
                    <h1 class="">{{ $user->username }}</h1>
                </div>
                <div class="mt-3">
                    <h3>Solve</h3>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Challenge</th>
                                <th scope="col">Category</th>
                                <th scope="col">Value</th>
                                <th scope="col">Time</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($user->solvers as $solve)
                                @php
                                    $date = new DateTime($solve->created_at);
                                    $formattedDate = $date->format('l, d F Y : H:i');
                                @endphp

                                <tr>
                                    <td>{{ $solve->challenge->name }}</td>
                                    <td>{{ $solve->challenge->category->name }}</td>
                                    <td>{{ $solve->challenge->value }}</td>
                                    <td>{{ $formattedDate }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        @endif
    </center>
</x-layout.user>
