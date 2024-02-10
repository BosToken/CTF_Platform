<div>
    <nav class="border-gray-200 bg-[#161A1D]">
        <div class="max-w-screen-2xl flex flex-wrap justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">LEGICOMP</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @guest
                    <button type="button" onclick="window.location.href='/login'"
                        class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm py-2 text-center bg-[#D83639] hover:bg-red-700 focus:ring-red-700 px-10"
                        style="margin-right: 10px;">Login</button>
                @else
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="text-white focus font-medium  flex items-center justify-between w-full py-2 px-3 rounded md:border-0 md:p-0 md:w-auto md:hover:text-red-700 focus:text-white border-gray-700 hover:bg-gray-700 md:hover:bg-transparent relative">
                        {{ Auth::user()->name }}
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdownNavbar"
                        class="z-10 hidden font-normal  divide-y divide-gray-100 rounded-lg shadow w-44 bg-[#282d31] dark:divide-gray-600 absolute right-0">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            @php
                                $isAdmin = 0;
                                if (Auth::check()) {
                                    if ($checkRole->role->role->name === 'Admin') {
                                        $isAdmin = 1;
                                    } else {
                                        $isAdmin = 0;
                                    }
                                }
                            @endphp
                            @if ($isAdmin)
                                <li>
                                    <a href="{{ route('admin-dashboard') }}"
                                        class="block px-4 py-2 text-white hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-[#D83639]">Admin
                                        Page</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('user-profile') }}"
                                    class="block px-4 py-2 text-white hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-[#D83639]">Profile</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="{{ route('logout') }}"
                                class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-[#D83639] dark:text-gray-200 dark:hover:text-white">Logout</a>
                        </div>
                    </div>
                @endguest
            </div>
            <div class="items-center justify-start w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="/"
                            class="block py-2 px-3 md:p-0 text-white bg-red-600 rounded md:bg-transparent md:text-[#D83639]"
                            aria-current="page">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('users') }}"
                            class="block py-2 px-3 md:p-0 rounded md:hover:text-[#D83639] text-white hover:bg-[#D83639] hover:text-white md:hover:bg-transparent border-gray-700">Users</a>
                    </li>
                    <li>
                        <a href="{{ route('scoreboard') }}"
                            class="block py-2 px-3 md:p-0 rounded md:hover:text-[#D83639] d:hover:text-[#D83639] text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Scoreboard</a>
                    </li>
                    <li>
                        <a href="{{ route('challenges') }}"
                            class="block py-2 px-3 md:p-0 rounded md:hover:text-[#D83639] d:hover:text-[#D83639] text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700">Challenges</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownButton = document.getElementById("dropdownNavbarLink");
        const dropdownMenu = document.getElementById("dropdownNavbar");
        const dropdownIcon = document.querySelector("#dropdownNavbarLink svg");

        dropdownButton.addEventListener("click", function() {
            const buttonRect = dropdownButton.getBoundingClientRect();
            dropdownMenu.style.top = buttonRect.bottom + "px";
            dropdownMenu.style.right = window.innerWidth - buttonRect.right + "px";
            dropdownMenu.classList.toggle("hidden");
            dropdownMenu.classList.toggle("animate-slide-down");

            const isDropdownOpen = dropdownMenu.classList.contains("hidden");
            if (isDropdownOpen) {
                dropdownIcon.classList.remove("rotate-180", "animate-rotate-up");
                dropdownIcon.classList.add("animate-rotate-down");
            } else {
                dropdownIcon.classList.remove("animate-rotate-down");
                dropdownIcon.classList.add("rotate-180", "animate-rotate-up");
            }
        });

        document.addEventListener("click", function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
                dropdownMenu.classList.remove("animate-slide-down");
                dropdownIcon.classList.remove("rotate-180", "animate-rotate-up", "animate-rotate-down");
            }
        });
    });
</script>
