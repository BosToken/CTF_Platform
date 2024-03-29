<x-layout.admin>
    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><a class="hover:underline" href="{{ route('admin-create-team-manage') }}">Manage</a></h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400"></p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            </div>
            <div class="relative flex flex-col w-full h-full overflow-hidden text-white bg-[#282d31] shadow-md bg-clip-border rounded-xl">
                <table class="w-full text-left table-auto min-w-max">
                  <thead>
                    <tr>
                      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> No </p>
                      </th>
                      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> Competition </p>
                      </th>
                      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> Team </p>
                      </th>
                      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> User </p>
                      </th>
                      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> Full Name </p>
                      </th>
                      <th class="text-center p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> Action </p>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($manages as $key => $manage)
                        <tr class="even:bg-blue-gray-50/50">
                            <th class="p-4" scope="row">{{ $key + 1 }}</th>
                            <td class="p-4">
                                <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">{{$manage->information->information}}</p>
                            </td>
                            <td class="p-4">
                                <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">{{$manage->team->name}}</p>
                            </td>
                            <td class="p-4">
                                <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">{{$manage->user->username}}</p>
                            </td>
                            <td class="p-4">
                                <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">{{$manage->user->name}}</p>
                            </td>
                            <td class="p-4 text-center">
                                <a href="/admin/team-manage/delete/{{ $manage->id }}" type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </section>
</x-layout.admin>
