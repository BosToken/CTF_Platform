<x-layout.admin>
    <title>Admin Dashboard</title>

    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Dashboard</h1>
            <div class="flex flex-col md:flex-row justify-center items-center md:mb-16 gap-8 md:mt-16 mt-8">
                <div class="bg-[#31373b] rounded-xl mb-3 shadow-red-500 w-96">
                    <div class="px-6 py-4 shadow overflow-auto ">
                        <div class="text-white font-bold text-xl mb-2">
                            Competition
                        </div>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <div class="text-white font-bold text-3xl mb-2">
                            {{ $total_competition }}
                        </div>
                    </div>
                </div>

                <div class="bg-[#31373b] rounded-xl mb-3 shadow-red-500 w-96">
                    <div class="px-6 py-4 shadow overflow-auto ">
                        <div class="text-white font-bold text-xl mb-2">
                            Participant
                        </div>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <div class="text-white font-bold text-3xl mb-2">
                            {{ $participant }}
                        </div>
                    </div>
                </div>

                <div class="bg-[#31373b] rounded-xl mb-3 shadow-red-500 w-96">
                    <div class="px-6 py-4 shadow overflow-auto ">
                        <div class="text-white font-bold text-xl mb-2">
                            Team
                        </div>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <div class="text-white font-bold text-3xl mb-2">
                            {{ $team }}
                        </div>
                    </div>
                </div>

                <div class="bg-[#31373b] rounded-xl mb-3 shadow-red-500 w-96">
                    <div class="px-6 py-4 shadow overflow-auto ">
                        <div class="text-white font-bold text-xl mb-2">
                            User
                        </div>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <div class="text-white font-bold text-3xl mb-2">
                            {{ $user }}
                        </div>
                    </div>
                </div>
            </div>


            <h4
                class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-5xl dark:text-white">
                Detail</h4>
            <div class="flex flex-col flex-wrap md:flex-row justify-center items-center md:mb-16 gap-8 md:mt-16 mt-8">

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
                    <div class="bg-[#31373b] rounded-xl mb-3 shadow-red-500 w-96">
                        <div class="pt-2 shadow overflow-auto ">
                            <div class="text-white font-bold text-xl mb-2">
                                {{ $information->information }}
                                <table class="w-full text-left table-auto min-w-max text-white">
                                    <thead>
                                        <tr>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                                    Challenge </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                                    Team </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                                    User </p>
                                            </th>
                                            <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                                                <p
                                                    class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70">
                                                    Training Score </p>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="even:bg-blue-gray-50/50 text-center">
                                            <td>{{ count($information->challenges) }}</td>
                                            <td>{{ $team }}</td>
                                            <td>{{ $user }}</td>
                                            <td>{{ $score }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <a href="/admin/report/{{ $information->id }}" type="button" class="text-white bg-gradient-to-r from-[#37d63e] via-[#37d63e] to-[#37d63e] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-[#37d63e] dark:focus:ring-[#37d63e] font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Detail</a>
                            <a href="/admin/report-download/{{ $information->id }}" type="button" class="text-white bg-gradient-to-r from-[#484bd4] via-[#484bd4] to-[#484bd4] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-[#484bd4] dark:focus:ring-[#484bd4] font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Download PDF</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
</x-layout.admin>
