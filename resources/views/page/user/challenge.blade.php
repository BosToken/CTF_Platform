<x-layout.user>
    <h1
        class="py-9 text-4xl font-extrabold tracking-tight text-center leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        Challenges</h1>
    <div class="px-48 grid grid-cols-2 grid-flow gap-8">
        {{-- LEFT SECTION --}}
        <div>
            @php
                $indexLeft = 0;
            @endphp
            @foreach ($categories as $category)
                @foreach ($solveChallenges as $solveChallenge)
                    @if ($solveChallenge->challenge->category->name == $category->name)
                        <div class="bg-[#37d63e] shadow shadow-green-500 rounded-xl mb-3 hover:bg-[#2c742c] hover:border hover:border-green-600 cursor-pointer opacity-70"
                            data-index="{{ $indexLeft }}" onclick="toggleCard({{ $indexLeft }})">
                            <div class="px-6 py-4 shadow overflow-auto ">
                                <div class="text-white font-bold text-xl mb-2">
                                    {{ $solveChallenge->challenge->name }}<span
                                        class="text-[#ff181c] px-2">({{ $solveChallenge->challenge->value }})</span>
                                </div>
                                <p class="text-base text-white">
                                    @php
                                        $description = $solveChallenge->challenge->message;
                                        $brPosition = strpos($description, '<br>');
                                        if ($brPosition !== false && $brPosition < 78) {
                                            $trimmedDescription = substr($description, 0, $brPosition);
                                            $ellipsis = '...';
                                        } else {
                                            $trimmedDescription = strlen($description) > 78 ? substr($description, 0, 78) : $description;
                                            $ellipsis = strlen($description) > 78 ? '...' : '';
                                        }
                                        echo $trimmedDescription . $ellipsis;
                                    @endphp
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <span
                                    class="inline-block bg-[#31373b] rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">{{ $category->name }}</span>
                                <span
                                    class="inline-block bg-[#31373b] rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">{{ count($solveChallenge->challenge->solvers) }}
                                    Solve(s)</span>
                            </div>
                        </div>
                        @php $indexLeft++; @endphp
                    @endif
                @endforeach
                @foreach ($unsolveChallenges as $unsolveChallenge)
                    @if ($unsolveChallenge->category->name == $category->name)
                        <div class="bg-[#31373b] rounded-xl mb-3 hover:bg-[#181818] hover:cursor-pointer hover:border-red-500 hover:border shadow shadow-red-500"
                            data-index="{{ $indexLeft }}" onclick="toggleCard({{ $indexLeft }})">
                            <div class="px-6 py-4 shadow overflow-auto">
                                <div class="text-white font-bold text-xl mb-2">{{ $unsolveChallenge->name }}<span
                                        class="text-[#ff181c] px-2">({{ $unsolveChallenge->value }})</span> </div>
                                <p class="text-base text-white">
                                    @php
                                        $description = $unsolveChallenge->message;
                                        $brPosition = strpos($description, '<br>');
                                        if ($brPosition !== false && $brPosition < 78) {
                                            $trimmedDescription = substr($description, 0, $brPosition);
                                            $ellipsis = '...';
                                        } else {
                                            $trimmedDescription = strlen($description) > 78 ? substr($description, 0, 78) : $description;
                                            $ellipsis = strlen($description) > 78 ? '...' : '';
                                        }
                                        echo $trimmedDescription . $ellipsis;
                                    @endphp
                                </p>
                            </div>
                            <div class="px-6 pt-4 pb-2">
                                <span
                                    class="inline-block bg-[#D83639] rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">{{ $category->name }}</span>
                                <span
                                    class="inline-block bg-[#D83639] rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">{{ count($unsolveChallenge->solvers) }}
                                    Solve(s)</span>
                            </div>
                        </div>
                        @php $indexLeft++; @endphp
                    @endif
                @endforeach
            @endforeach
        </div>
        {{-- RIGHT SECTION --}}
        <div class="right-section">
            @php
                $indexRight = 0;
            @endphp
            @foreach ($categories as $category)
                @foreach ($solveChallenges as $solveChallenge)
                    @if ($solveChallenge->challenge->category->name == $category->name)
                        <div class="hidden bg-[#31373b] border border-[#2dad2d] shadow-md shadow-green-800 rounded-xl mb-3"
                            id="rightCard{{ $indexRight }}">
                            <div class="px-6 py-4 shadow">
                                <div class="text-white font-bold text-4xl mb-1 text-center ">
                                    {{ $solveChallenge->challenge->name }}<span
                                        class="text-[#ff181c] px-2">({{ $solveChallenge->challenge->value }})</span>
                                </div>
                                <div class="text-white font-medium italic mb-8 text-center ">{{ $category->name }}
                                </div>
                                <p class="text-base text-white">
                                    {!! $solveChallenge->challenge->message !!}
                                </p>
                                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5"
                                    action="submitFlag/{{ $solveChallenge->challenge->id }}" method="post">
                                    @csrf
                                    <div class="grid grid-cols-6 gap-2">
                                        <div class="col-span-5">
                                            <input type="text" name="flag"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="You already solved!" required="">
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="w-full text-white bg-[#D83639] hover:bg-red-700 focus:ring-red-700 font-bold rounded-lg text-sm px-5 py-2.5 text-center focus:ring-primary-800">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-white font-bold text-4xl mb-1 text-center pt-10">Solvers</div>
                                <table class="w-full text-center table-auto min-w-max text-white">
                                    <thead>
                                        <tr>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900">
                                                    No </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900">
                                                    Username </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900">
                                                    Date </p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $solves = $solveChallenge->challenge->solvers->sortBy('created_at');
                                            $index = 0;
                                        @endphp
                                        @foreach ($solves as $solve)
                                            @php
                                                $date = new DateTime($solve->created_at);
                                                $formattedDate = $date->format('l, d F Y : H:i');
                                            @endphp
                                            <tr class="even:bg-blue-gray-50/50">
                                                <th class="p-4" scope="row">{{ $index += 1 }}</th>
                                                <td class="p-4">
                                                    <a href="/user/{{ $solve->user->username }}"
                                                        style="text-decoration: none;">
                                                        {{ $solve->user->username }}
                                                    </a>
                                                </td>
                                                <td>{{ $formattedDate }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @php $indexRight++; @endphp
                    @endif
                @endforeach
                @foreach ($unsolveChallenges as $unsolveChallenge)
                    @if ($unsolveChallenge->category->name == $category->name)
                        <div class="hidden bg-[#31373b] rounded-xl mb-3 shadow-md shadow-red-500"
                            id="rightCard{{ $indexRight }}">
                            <div class="px-6 py-4 shadow">
                                <div class="text-white font-bold text-4xl mb-1 text-center ">
                                    {{ $unsolveChallenge->name }}<span
                                        class="text-[#ff181c] px-2">({{ $unsolveChallenge->value }})</span> </div>
                                <div class="text-white font-medium italic mb-8 text-center ">{{ $category->name }}
                                </div>
                                <div class="overflow-auto">
                                    <p class="text-base text-white">
                                        {!! $unsolveChallenge->message !!}
                                    </p>
                                </div>
                                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5"
                                    action="submitFlag/{{ $unsolveChallenge->id }}" method="post">
                                    @csrf
                                    <div class="grid grid-cols-6 gap-2">
                                        <div class="col-span-5">
                                            <input type="text" name="flag"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Flag" required="">
                                        </div>
                                        <div>
                                            <button type="submit"
                                                class="w-full text-white bg-[#D83639] hover:bg-red-700 focus:ring-red-700 font-bold rounded-lg text-sm px-5 py-2.5 text-center focus:ring-primary-800">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-white font-bold text-4xl mb-1 text-center pt-10">Solvers</div>
                                <table class="w-full text-center table-auto min-w-max text-white">
                                    <thead>
                                        <tr>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900">
                                                    No </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900">
                                                    Username </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900">
                                                    Date </p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $solves = $unsolveChallenge->solvers->sortBy('created_at');
                                            $index = 0;
                                        @endphp
                                        @foreach ($solves as $solve)
                                            @php
                                                $date = new DateTime($solve->created_at);
                                                $formattedDate = $date->format('l, d F Y : H:i');
                                            @endphp
                                            <tr class="even:bg-blue-gray-50/50">
                                                <th class="p-4" scope="row">{{ $index += 1 }}</th>
                                                <td class="p-4">
                                                    <a href="/user/{{ $solve->user->username }}"
                                                        style="text-decoration: none;">
                                                        {{ $solve->user->username }}
                                                    </a>
                                                </td>
                                                <td>{{ $formattedDate }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @php $indexRight++; @endphp
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
    <script>
        function toggleCard(index) {
            const allRightCards = document.querySelectorAll('[id^="rightCard"]');
            allRightCards.forEach(card => {
                card.classList.add('hidden');
            });

            const rightCard = document.getElementById(`rightCard${index}`);
            if (rightCard) {
                rightCard.classList.remove('hidden');
            }
        }
    </script>
</x-layout.user>
