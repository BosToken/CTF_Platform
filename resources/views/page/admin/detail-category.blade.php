{{-- <x-layout.admin>
    <title>Detail Category</title>
    <h1 class="text-center mb-3">Detail Category</h1>

    <form action="/admin/category/update/{{$category->id}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Category Name" name="name" value="{{$category->name}}" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required>{{$category->description}}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="/admin/category/delete/{{ $category->id }}" class="btn btn-danger">Delete</a>
    </form>
</x-layout.admin> --}}

<x-layout.admin>
    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <h1 class="text-center mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><a>Category {{$category->name}}</a></h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400"></p>
            <div class="flex items-flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 ">
                <div class="w-full p-6 rounded-lg md:mt-0 sm:max-w-screen-md bg-[#282d31] sm:p-8">
                    <h2 class="text-center mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Edit Category
                    </h2>
                    <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="/admin/category/update/{{$category->id}}" method="post">
                        @csrf
                        <div>
                            <label for="exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" value="{{$category->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="large-exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea type="text" name="description" class="h-32 resize-none bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">{{$category->description}}</textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4 content-start">
                            <a href="/admin/category/delete/{{ $category->id }}" type="submit" class="w-full text-white bg-[#D83639] hover:bg-red-700 focus:ring-red-700 font-bold rounded-lg text-sm px-5 py-2.5 text-center focus:ring-primary-800">Delete</a>
                            <button type="submit" class="w-full text-white bg-[#36d85e] hover:bg-green-600 focus:ring-red-700 font-bold rounded-lg text-sm px-5 py-2.5 text-center focus:ring-primary-800">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </x-layout.admin>