<x-layout.admin>
    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><a class="hover:underline" href="{{ route('admin-create-category') }}">Categories</a></h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400"></p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            </div>
            <div class="relative flex flex-col w-full h-full overflow-hidden text-white bg-[#282d31] shadow-md bg-clip-border rounded-xl">
                <table class="w-full text-left table-fixed min-w-max">
                  <thead>
                    <tr>
                      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> No </p>
                      </th>
                      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> Category </p>
                      </th>
                      <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-bold leading-none text-blue-gray-900 opacity-70"> Description </p>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $key => $category)
                      <tr class="even:bg-blue-gray-50/50">
                          <th class="p-4" scope="row">{{ $key + 1 }}</th>
                          <td class="p-4">
                              <a href="/admin/category/detail/{{ $category->id }}" style="text-decoration: none;">{{ $category->name }}</a>
                          </td>
                          <td class="p-4 whitespace-normal">
                              <p class="block font-sans text-sm antialiased font-bold leading-normal">{{ $category->description }}</p>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </section>
</x-layout.admin>