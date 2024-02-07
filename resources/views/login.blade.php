<x-layout.user>
    <section class="bg-[#161A1D]">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-full mt-24 lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-bold text-white">
                <img class="w-8 h-8 mr-2" src="img/confidential.png" alt="logo">
                Login Legium Competition     
            </a>
            <div class="w-full rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0 bg-[#1A1E21] border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="login" method="post">
                        @csrf
                        <div>
                            <label for="exampleFormControlInput1" class="block mb-2 text-sm font-medium text-white">Username</label>
                            <input type="text" name="username" class=" border sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Username" required="">
                        </div>
                        <div>
                            <label for="exampleFormControlTextarea1" class="block mb-2 text-sm font-medium text-white">Password</label>
                            <input type="password" name="password" placeholder="••••••••••••••••••" class="border sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required="">
                        </div>
                        <div class="flex justify-end !mt-2">
                            <a href="/" class="text-sm font-medium text-primary-600 hover:underline text-white">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-[#D83639] hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-primary-600 hover:bg-primary-700 focus:ring-primary-800">Sign in</button>
                    </form>
                </div>
            </div>
            <span class="mt-6 block text-sm sm:text-center text-gray-400">© <a href="/" class="hover:underline hover:text-white">Competition Division 2024</a> - All Rights Reserved.</span>
        </div>
      </section>
</x-layout.user>
