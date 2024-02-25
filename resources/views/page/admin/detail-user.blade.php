<x-layout.admin>
    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <h1 class="text-center mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><a>Users, {{ $user->username }}</a></h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400"></p>
            <div class="flex items-flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 ">
                <div class="w-full p-6 rounded-lg md:mt-0 sm:max-w-md bg-[#282d31] sm:p-8">
                    <h2 class="text-center mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Edit User
                    </h2>
                    <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="/admin/user/update/{{ $user->id }}" method="post">
                        @csrf
                        <div>
                            <label for="exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input type="text" name="username" value="{{ $user->username }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-white">Role</label>
                            <select name="role_id" class="text-sm font-medium border text-white text-medium sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 p-2.5 inline-flex items-center justify-between">
                                <option selected value="{{ $user->role->id }}_{{ $user->role->role->id }}">{{ $user->role->role->name }}</option>
                        
                                @foreach ($roles as $role)
                                    @php
                                        $optionValue = $user->role->id . '_' . $role->id;
                                    @endphp
                        
                                    @unless($optionValue == $user->role->id . '_' . $user->role->role->id)
                                        <option value="{{ $optionValue }}">{{ $role->name }}</option>
                                    @endunless
                                @endforeach
                            </select>
                        </div>
                        <div class="grid grid-cols-2 gap-4 content-start">
                            <a href="/admin/user/delete/{{ $user->id }}" type="submit" class="w-full text-white bg-[#D83639] hover:bg-red-700 focus:ring-red-700 font-bold rounded-lg text-sm px-5 py-2.5 text-center focus:ring-primary-800">Delete</a>
                            <button type="submit" class="w-full text-white bg-[#36d85e] hover:bg-green-600 focus:ring-red-700 font-bold rounded-lg text-sm px-5 py-2.5 text-center focus:ring-primary-800">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout.admin>