{{-- <x-layout.user>
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
</x-layout.user> --}}
<x-layout.user>
    <section>
        @foreach ($users as $user)
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">User, {{ Auth::user()->username }}!</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400"></p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                </div>
                <div class="relative flex flex-col w-full h-full overflow-hidden text-white bg-[#282d31] shadow-md bg-clip-border rounded-xl">
                    <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> Challenge Name </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> Category </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> Value </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> Time </p>
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->solvers as $solve)
                            @php
                                $date = new DateTime($solve->created_at);
                                $formattedDate = $date->format('l, d F Y : H:i');
                            @endphp

                            <tr class="even:bg-blue-gray-50/50">
                                <td class="p-4">
                                    <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900"> {{ $solve->challenge->name }} </p>
                                <td class="p-4">
                                    <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900"> {{ $solve->challenge->category->name }} </p>
                                </td>
                                <td class="p-4">
                                    <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900"> {{ $solve->challenge->value }} </p>
                                </td>
                                <td class="p-4">
                                    <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900"> {{ $formattedDate }} </p>
                                </td>
                            </tr>
                        @endforeach
                        {{-- @foreach ($user->solvers as $solve)
                            @php
                                $date = new DateTime($solve->created_at);
                                $formattedDate = $date->format('l, d F Y : H:i');
                            @endphp
                            <tr class="even:bg-blue-gray-50/50">
                                <td class="p-4">
                                    <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900"> {{ $solve->challenge->name }} </p>
                                </td>
                                <td class="p-4">
                                    <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900"> {{ $solve->challenge->category->name }} </p>
                                </td>
                                <td class="p-4">
                                    <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900"> {{ $solve->challenge->value }} </p>
                                </td>
                                <td class="p-4">
                                    <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900"> {{ $formattedDate }} </p>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </section>
</x-layout.user>
