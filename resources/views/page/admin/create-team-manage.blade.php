{{-- <x-layout.admin>
    <title>Create Manage</title>
    <h1 class="text-center mb-3">Create Manage</h1>

    <form action="{{ route('admin-store-team-manage') }}" method="post">
        @csrf

        <label for="exampleFormControlTextarea1" class="form-label">Competition</label>
        <div class="input-group mb-3">
            <select class="form-select" name="information_id" id="inputGroupSelect02">
                @foreach ($informations as $information)
                    <option value="{{ $information->id }}">{{ $information->information }}</option>
                @endforeach
            </select>
        </div>

        
        <label for="exampleFormControlTextarea1" class="form-label">Team</label>
        <div class="input-group mb-3">
            <select class="form-select" name="team_id" id="inputGroupSelect02">
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <label for="exampleFormControlTextarea1" class="form-label">Username</label>
        <div class="input-group mb-3">
            <select class="form-select" name="user_id" id="inputGroupSelect02">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->username }} ({{$user->name}})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout.admin> --}}

<x-layout.admin>
    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <h1 class="text-center mb-4 text-4xl font-extrabold tracking-tight leading-none  md:text-5xl lg:text-6xl text-white"><a>Manage</a></h1>
            <p class="mb-8 text-lg font-normal  lg:text-xl sm:px-16 lg:px-48 text-gray-400"></p>
            <div class="flex items-flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 ">
                <div class="w-full p-6 rounded-lg md:mt-0 sm:max-w-md bg-[#282d31] sm:p-8">
                    <h2 class="text-center mb-1 text-xl font-bold leading-tight tracking-tight  md:text-2xl text-white">
                        Create Manage
                    </h2>
                    <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="{{ route('admin-store-user') }}" method="post">
                        @csrf
                        <div>
                            <label class="block mb-2 text-sm font-medium text-white">Competition</label>
                            <select class="text-sm font-medium border text-white text-medium sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 p-2.5 inline-flex items-center justify-between">
                                @foreach ($informations as $information)
                                <option value="{{ $information->id }}">{{ $information->information }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-white">Team</label>
                            <select class="text-sm font-medium border text-white text-medium sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 p-2.5 inline-flex items-center justify-between">
                                @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-white">Username</label>
                            <select class="text-sm font-medium border text-white text-medium sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 p-2.5 inline-flex items-center justify-between">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->username }} ({{$user->name}})</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="w-full text-white bg-[#D83639] hover:bg-red-700 focus:ring-red-700 font-bold rounded-lg text-sm px-5 py-2.5 text-center focus:ring-primary-800">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        const dropdownButton = document.getElementById('dropdownDefaultButton');
        const dropdownMenu = document.getElementById('dropdown');
    
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    
        // Menutup dropdown jika di luar dropdown diklik
        window.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</x-layout.admin>