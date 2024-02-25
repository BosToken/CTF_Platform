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
    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="mb-8">
                <div class="flex">
                    <div class="flex-none w-32">
                        <p
                            class="mb-4 text-md font-bold tracking-tight leading-none text-gray-900 md:text-xl lg:text-xl dark:text-white">
                            Competition</p>
                    </div>
                    <div class="flex-none w-4">
                        <p
                            class="mb-4 text-md font-bold tracking-tight leading-none text-gray-900 md:text-xl lg:text-xl dark:text-white">
                            :</p>
                    </div>
                    <div class="flex-none w-full">
                        <p
                            class="mb-4 text-md font-bold tracking-tight leading-none text-gray-900 md:text-xl lg:text-xl dark:text-white">
                            {{ $information->information }}</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-none w-32">
                        <p
                            class="mb-4 text-md font-bold tracking-tight leading-none text-gray-900 md:text-xl lg:text-xl dark:text-white">
                            Description</p>
                    </div>
                    <div class="flex-none w-4">
                        <p
                            class="mb-4 text-md font-bold tracking-tight leading-none text-gray-900 md:text-xl lg:text-xl dark:text-white">
                            :</p>
                    </div>
                    <div class="flex-none w-full">
                        <p
                            class="mb-4 text-md font-bold tracking-tight leading-none text-gray-900 md:text-xl lg:text-xl dark:text-white">
                            {{ $information->description }}</p>
                    </div>
                </div>
            </div>
            <div class="mb-8">
                <div class="bg-[#31373b] rounded-xl mb-3">
                    <p
                        class="px-6 py-4 text-md font-bold tracking-tight leading-none text-gray-900 md:text-xl lg:text-xl dark:text-white">
                        Training Challenge</p>
                    <div class="px-6 py-4 shadow overflow-auto">
                        <table class="w-full table-auto min-w-max text-white text-center">
                            <thead>
                                <tr>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                            Total Challenge </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                            Total Category </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                            Total Training Score </p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-4">
                                        <p>{{ $totalChallenge }}</p>
                                    </td>
                                    <td class="p-4">
                                        <p>{{ $totalCategory }}</p>
                                    </td>
                                    <td class="p-4">
                                        <p>{{ $score }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <table class="w-full table-auto min-w-max text-white text-center">
                            <thead>
                                <tr>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                            # </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                            Challenge Name </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                            Category </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                            Type </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                            Solves Number </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                            Value </p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($information->challenges as $key => $challenge)
                                    <tr>
                                        <td class="p-4">{{ $key + 1 }}</td>
                                        <td class="p-4">{{ $challenge->name }}</td>
                                        <td class="p-4">{{ $challenge->category->name }}</td>
                                        @if ($challenge->challenge_type === 1)
                                            <td class="p-4">Dynamic</td>
                                        @else
                                            <td class="p-4">Static</td>
                                        @endif
                                        <td class="p-4">{{ count($challenge->solvers) }}</td>
                                        <td class="p-4">{{ $challenge->value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <div class="bg-[#31373b] rounded-xl mb-3">
                    <p
                        class="px-6 py-4 text-md font-bold tracking-tight leading-none text-gray-900 md:text-xl lg:text-xl dark:text-white">
                        Delegation Training</p>
                    <div class="px-6 py-4 shadow overflow-auto">
                        <table class="w-full table-auto min-w-max text-white text-center">
                            <thead>
                                <tr>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                            Total Team </p>
                                    </th>
                                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                            Total Delegation </p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-4">
                                        <p>{{ $team }}</p>
                                    </td>
                                    <td class="p-4">
                                        <p>{{ $user }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                @foreach ($information->manages as $key => $user)
                    @php
                        $userScore = $user->user->solvers->whereIn('challenge_id', $challenge_id)->sum('challenge.value');
                    @endphp
                    <div class="mb-4">
                        <div class="bg-[#31373b] rounded-xl mb-3">
                            <div class="px-6 py-4 shadow overflow-auto">
                                <table class="w-full table-auto min-w-max text-white text-center">
                                    <thead>
                                        <tr>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                                    Username </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                                    FullName </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                                    Team </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                                    Total Solve </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                                    Training Score </p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="p-4">{{ $user->user->username }}</td>
                                            <td class="p-4">{{ $user->user->name }}</td>
                                            <td class="p-4">{{ $user->team->name }}</td>
                                            <td class="p-4">{{ count($user->user->solvers) }}</td>
                                            <td class="p-4">{{ $userScore }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="px-6 py-4 shadow overflow-auto">
                                <table class="w-full table-auto min-w-max text-white text-center">
                                    <thead>
                                        <tr>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                                    Challenge Name </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                                    Category </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                                    Value </p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($user->user->solvers) === 0)
                                            <tr>
                                                <td colspan="3">Not Challenge Solve</td>
                                            </tr>
                                        @endif
                                        @foreach ($user->user->solvers as $solve)
                                            @if ($solve->challenge->information_id == $information->id)
                                                <tr>
                                                    <td class="p-4">{{ $solve->challenge->name }}</td>
                                                    <td class="p-4">{{ $solve->challenge->category->name }}</td>
                                                    <td class="p-4">{{ $solve->challenge->value }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout.admin>
