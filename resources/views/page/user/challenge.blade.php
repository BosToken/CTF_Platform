{{-- <x-layout.user>
    <title>LEGICOMP | Challenges</title>

    <h1 class="text-center mb-3">Challenge</h1>

    @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>
        <div class="d-flex flex-wrap justify-content-start mb-5">
            @foreach ($solveChallenges as $solveChallenge)
                @if ($solveChallenge->challenge->category->name == $category->name)
                    <div class="card bg-success text-white my-3 me-3" style="width: 20rem;" data-bs-toggle="modal"
                        data-bs-target="#modal{{ $solveChallenge->challenge->id }}">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $solveChallenge->challenge->name }}</h4>
                            <h4 class="card-subtitle text-center mt-3">{{ $solveChallenge->challenge->value }}</h4>
                        </div>
                    </div>

                    <div class="modal fade" id="modal{{ $solveChallenge->challenge->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <h4>{{ $solveChallenge->challenge->name }}</h4>
                                        <h4>{{ $solveChallenge->challenge->value }}</h4>
                                    </div>
                                    <div class="mx-3">
                                        <p>
                                            {!! $solveChallenge->challenge->message !!}
                                        </p>
                                    </div>
                                    <form action="submitFlag/{{ $solveChallenge->challenge->id }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Flag" name="flag"
                                                aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-success" type="submit"
                                                id="button-addon2">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($unsolveChallenges as $unsolveChallenge)
                @if ($unsolveChallenge->category->name == $category->name)
                    <div class="card my-3 me-3" style="width: 20rem;" data-bs-toggle="modal"
                        data-bs-target="#modal{{ $unsolveChallenge->id }}">
                        <div class="card-body">
                            <h4 class="card-title text-center">{{ $unsolveChallenge->name }}</h4>
                            <h4 class="card-subtitle text-center mt-3">{{ $unsolveChallenge->value }}</h4>
                        </div>
                    </div>

                    <div class="modal fade" id="modal{{ $unsolveChallenge->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <h4>{{ $unsolveChallenge->name }}</h4>
                                        <h4>{{ $unsolveChallenge->value }}</h4>
                                    </div>
                                    <div class="mx-3">
                                        <p>
                                            {!! $unsolveChallenge->message !!}
                                        </p>
                                    </div>
                                    <form action="submitFlag/{{ $unsolveChallenge->id }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Flag" name="flag"
                                                aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-outline-success" type="submit"
                                                id="button-addon2">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
</x-layout.user> --}}

<x-layout.user>
    <h1 class="py-9 text-4xl font-extrabold tracking-tight text-center leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Challenges</h1>
    <div class="px-48 grid grid-cols-2 grid-flow gap-8">
        {{-- LEFT SECTION --}}
        <div>
            @php
                $indexLeft = 0;
            @endphp
            @foreach ($categories as $category)
                @foreach ($solveChallenges as $solveChallenge)
                    @if ($solveChallenge->challenge->category->name == $category->name)
                        <div class="bg-[#2dad2d] rounded-xl mb-3 hover:bg-[#2c742c] hover:border hover:border-green-600 cursor-pointer" data-index="{{ $indexLeft }}" onclick="toggleCard({{ $indexLeft }})">
                            <div class="px-6 py-4 shadow overflow-auto">
                                <div class="text-white font-bold text-xl mb-2">{{ $solveChallenge->challenge->name }}<span class="text-[#ff181c] px-2">({{ $solveChallenge->challenge->value }})</span> </div>
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
                                <span class="inline-block bg-[#31373b] rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">{{ $category->name }}</span>
                                <span class="inline-block bg-[#31373b] rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">10 Solve(s)</span>
                            </div>
                        </div>
                        @php $indexLeft++; @endphp
                    @endif
                @endforeach
                @foreach ($unsolveChallenges as $unsolveChallenge)
                    @if ($unsolveChallenge->category->name == $category->name)
                        <div class="bg-[#31373b] rounded-xl mb-3 hover:bg-[#181818] hover:cursor-pointer hover:border-red-500 hover:border" data-index="{{ $indexLeft }}" onclick="toggleCard({{ $indexLeft }})">
                            <div class="px-6 py-4 shadow overflow-auto">
                                <div class="text-white font-bold text-xl mb-2">{{ $unsolveChallenge->name }}<span class="text-[#ff181c] px-2">({{ $unsolveChallenge->value }})</span> </div>
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
                                <span class="inline-block bg-[#D83639] rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">{{ $category->name }}</span>
                                <span class="inline-block bg-[#D83639] rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">10 Solve(s)</span>
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
                        <div class="hidden bg-[#31373b] border border-[#2dad2d] rounded-xl mb-3" id="rightCard{{ $indexRight }}">
                            <div class="px-6 py-4 shadow">
                                <div class="text-white font-bold text-4xl mb-1 text-center ">{{ $solveChallenge->challenge->name }}<span class="text-[#ff181c] px-2">({{ $solveChallenge->challenge->value }})</span> </div>
                                <div class="text-white font-medium italic mb-8 text-center ">{{ $category->name }}</div>
                                <p class="text-base text-white break-all">
                                    {!! $solveChallenge->challenge->message !!}
                                </p>
                                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="submitFlag/{{ $solveChallenge->challenge->id }}" method="post">
                                    @csrf
                                    <div class="grid grid-cols-6 gap-2">
                                        <div class="col-span-5">
                                            <input type="text" name="flag" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="You already solved!" required="">
                                        </div>
                                        <div>
                                            <button type="submit" class="w-full text-white bg-[#D83639] hover:bg-red-700 focus:ring-red-700 font-bold rounded-lg text-sm px-5 py-2.5 text-center focus:ring-primary-800">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-white font-bold text-4xl mb-1 text-center pt-10">Solvers</div>
                                <table class="w-full text-center table-auto min-w-max text-white">
                                    <thead>
                                    <tr>
                                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900"> No </p>
                                        </th>
                                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900"> Username </p>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="even:bg-blue-gray-50/50">
                                        <th class="p-4" scope="row">1</th>
                                        <td class="p-4">
                                            <a href="/admin/user/detail/" style="text-decoration: none;">Admin</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @php $indexRight++; @endphp
                    @endif
                @endforeach
                @foreach ($unsolveChallenges as $unsolveChallenge)
                    @if ($unsolveChallenge->category->name == $category->name)   
                        <div class="hidden bg-[#31373b] rounded-xl mb-3 shadow-lg" id="rightCard{{ $indexRight }}">
                            <div class="px-6 py-4 shadow">
                                <div class="text-white font-bold text-4xl mb-1 text-center ">{{ $unsolveChallenge->name }}<span class="text-[#ff181c] px-2">({{ $unsolveChallenge->value }})</span> </div>
                                <div class="text-white font-medium italic mb-8 text-center ">{{ $category->name }}</div>
                                <div class="overflow-auto">
                                    <p class="text-base text-white break-all">
                                        {!! $unsolveChallenge->message !!}
                                    </p>
                                </div>
                                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="submitFlag/{{ $unsolveChallenge->id }}" method="post">
                                    @csrf
                                    <div class="grid grid-cols-6 gap-2">
                                        <div class="col-span-5">
                                            <input type="text" name="flag" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flag" required="">
                                        </div>
                                        <div>
                                            <button type="submit" class="w-full text-white bg-[#D83639] hover:bg-red-700 focus:ring-red-700 font-bold rounded-lg text-sm px-5 py-2.5 text-center focus:ring-primary-800">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="text-white font-bold text-4xl mb-1 text-center pt-10">Solvers</div>
                                <table class="w-full text-center table-auto min-w-max text-white">
                                    <thead>
                                    <tr>
                                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900"> No </p>
                                        </th>
                                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900"> Username </p>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="even:bg-blue-gray-50/50">
                                        <th class="p-4" scope="row">1</th>
                                        <td class="p-4">
                                            <a href="/admin/user/detail/" style="text-decoration: none;">Admin</a>
                                        </td>
                                    </tr>
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

