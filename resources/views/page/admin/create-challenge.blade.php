{{-- <x-layout.admin>
    <title>Create Challenge</title>
    <h1 class="text-center mb-3">Create Challenge</h1>

    <form action="{{ route('admin-store-challenge') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Challenge Name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" required></textarea>
            <div id="emailHelp" class="form-text">You can enter the script in this input column.</div>
        </div>

        <label for="exampleFormControlTextarea1" class="form-label">Category</label>
        <div class="input-group mb-3">
            <select class="form-select" name="challenge_categories_id" id="inputGroupSelect02">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <label for="exampleFormControlTextarea1" class="form-label">Information</label>
        <div class="input-group mb-3">
            <select class="form-select" name="information_id" id="inputGroupSelect02">
                @foreach ($informations as $information)
                    <option value="{{ $information->id }}">{{ $information->information }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Value</label>
            <input type="number" class="form-control" name="value" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Flag</label>
            <input type="text" class="form-control" name="flag" required>
        </div>

        <label for="exampleFormControlTextarea1" class="form-label">Type</label>
        <div class="input-group mb-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="challenge_type" id="flexRadioDefault1"
                    value=1 checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Dynamic
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="challenge_type" id="flexRadioDefault2"
                    value=0>
                <label class="form-check-label" for="flexRadioDefault2">
                    Static
                </label>
            </div>
            
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-layout.admin> --}}

<x-layout.admin>
    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <h1 class="text-center mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><a>Challenges</a></h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400"></p>
            <div class="flex items-flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 ">
                <div class="w-full p-6 rounded-lg md:mt-0 sm:max-w-screen-md bg-[#282d31] sm:p-8">
                    <h2 class="text-center mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Create Challenges
                    </h2>
                    <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="{{ route('admin-store-challenge') }}" method="post">
                        @csrf
                        <div>
                            <label for="exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Challenge Name</label>
                            <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Challenge" required="">
                        </div>
                        <div>
                            <label for="large-exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea type="text" name="message" placeholder="Description" class="h-32 resize-none bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required=""></textarea>
                        </div>
                        <div>
                            <label for="large-exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select name="challenge_categories_id" class="text-sm font-medium border text-white text-medium sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 p-2.5 inline-flex items-center justify-between" name="information_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="large-exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Information</label>
                            <select name="information_id" class="text-sm font-medium border text-white text-medium sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full bg-gray-700 border-gray-600 placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 p-2.5 inline-flex items-center justify-between" name="information_id">
                                @foreach ($informations as $information)
                                    <option value="{{ $information->id }}">{{ $information->information }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Value</label>
                            <input type="number" name="value" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Challenge" required="">
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Flag</label>
                            <input type="text" name="flag" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Challenge" required="">
                        </div>
                        <div>
                            <label for="exampleInputEmail1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                            <div class="flex items-center mb-4">
                                <input checked type="radio" value=0 name="challenge_type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Static</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" value=1 name="challenge_type" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dynamic</label>
                            </div>
                        </div>





                        <button type="submit" class="w-full text-white bg-[#D83639] hover:bg-red-700 focus:ring-red-700 font-bold rounded-lg text-sm px-5 py-2.5 text-center focus:ring-primary-800">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout.admin>