<x-layout.admin>
    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <h1 class="text-center mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><a>Competition</a></h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400"></p>
            <div class="flex items-flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 ">
                <div class="w-full p-6 rounded-lg md:mt-0 sm:max-w-screen-md bg-[#282d31] sm:p-8">
                    <h2 class="text-center mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create Competition
                    </h2>
                    <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="{{ route('admin-store-information') }}" method="post">
                        @csrf
                        <div>
                            <label for="exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="information" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name" required="">
                        </div>
                        <div>
                            <label for="large-exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea type="text" name="description" placeholder="Description" class="h-32 resize-none bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required=""></textarea>
                        </div>
                        <button type="submit" class="w-full text-white bg-[#D83639] hover:bg-red-700 focus:ring-red-700 font-bold rounded-lg text-sm px-5 py-2.5 text-center focus:ring-primary-800">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout.admin>