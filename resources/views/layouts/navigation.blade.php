<nav class="border-b shadow-gray-500 fixed w-full z-20 top-0 start-0">
            <!-- Sidebar -->
            <div class="absolute bg-indigo-500 text-white w-72 min-h-screen overflow-y-auto transition-transform transform -translate-x-full ease-in-out duration-300"
                 id="sidebar">
                <!-- Your Sidebar Content -->
                <div class="p-4">

                    <h1 class="text-4xl font-semibold mt-4"> {{ __("Menu") }} </h1>
                    <ul class="mt-8 text-xl">
                        @hasanyrole('Admin|Docente')
                        <li class="mb-2"><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Dashboard") }}</a></li>
                        @endhasanyrole

                        @role('Admin')
                        <li class="mb-2"><a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Users") }}</a></li>
                        <li class="mb-2"><a href="{{ route('courses.index') }}" class="{{ request()->routeIs('courses.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Courses") }}</a></li>
                        <li class="mb-2"><a href="{{ route('periods.index') }}" class="{{ request()->routeIs('periods.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Periods") }}</a></li>
                        <li class="mb-2"><a href="{{ route('students.index') }}" class="{{ request()->routeIs('students.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Students") }}</a></li>
                        <li class="mb-2"><a href="{{ route('grades.index') }}" class="{{ request()->routeIs('grades.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Grades") }}</a></li>
                        <li class="mb-2"><a href="{{ route('classes.index') }}" class="{{ request()->routeIs('classes.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Classes") }}</a></li>
                        <li class="mb-2"><a href="{{ route('class-students.index') }}" class="{{ request()->routeIs('class-students.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Class Students") }}</a></li>
                        <li class="mb-2"><a href="{{ route('assignments.index') }}" class="{{ request()->routeIs('assignments.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Assignments") }}</a></li>
                        @endrole
                        @hasanyrole('Admin|Docente')
                        <li class="mb-2"><a href="{{ route('attendance.index') }}" class="{{ request()->routeIs('attendance.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Attendance") }}</a></li>
                        <li class="mb-2"><a href="{{ route('homeworks.index') }}" class="{{ request()->routeIs('homeworks.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Homeworks") }}</a></li>
{{--                        <li class="mb-2"><a href="{{ route('scoreReports.index') }}" class="{{ request()->routeIs('scoreReports.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Score Reports") }}</a></li>--}}
{{--                        <li class="mb-2"><a href="{{ route('scoreReportsStudents.index') }}" class="{{ request()->routeIs('scoreReportsStudents.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Score Students") }}</a></li>--}}
{{--                        <li class="mb-2"><a href="{{ route('scoreReportsCourse.index') }}" class="{{ request()->routeIs('scoreReportsCourse.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">{{ __("Score Courses") }}</a></li>--}}
                        <li>
                            <details class="group">
                                <summary class="flex items-center gap-2 font-medium marker:content-none hover:cursor-pointer">
                                    Score Reports
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </summary>
                                <article class="px-4 pb-4">
                                    <ul class="flex flex-col mt-2 gap-1 pl-2">
                                        <li><a href="{{ route('scoreReports.index') }}" class="{{ request()->routeIs('scoreReports.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">&#8226; {{ __("General") }}</a></li>
                                        <li><a href="{{ route('scoreReportsStudents.index') }}" class="{{ request()->routeIs('scoreReportsStudents.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">&#8226; {{ __("Students") }}</a></li>
                                        <li><a href="{{ route('scoreReportsCourse.index') }}" class="{{ request()->routeIs('scoreReportsCourse.*') ? 'block text-indigo-200 border-b hover:border-indigo-200 ': 'block hover:text-indigo-200 hover:border-b hover:border-indigo-200'}}">&#8226; {{ __("Zone boxes") }}</a></li>
                                    </ul>
                                </article>
                            </details>
                        </li>
                        @endhasanyrole

                    </ul>
                </div>
            </div>

            <!-- Content -->
            <div class="flex-1 flex flex-col overflow-hidden">
                <!-- Navbar -->
                <div class="bg-gray-50 shadow">
                    <div class="container mx-auto">
                        <div class="flex justify-between items-center py-4 px-6">

                            <a href="{{ route('dashboard') }}" class="flex flex-row items-center">
                            <img class="h-12 w-12 ml-2" src=" {{ asset('images/icon-logo.png') }}" alt="student">
                                <span class="items-center px-2">Centro Educativo</span>
                            </a>

                            <div class="flex justify-between items-center">
                            <button class="text-gray-500 hover:text-gray-600" id="open-sidebar">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>

                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="mx-2 text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0  md:hover:text-blue-700 md:p-0 font-medium flex items-center justify-between w-full md:w-auto">
                                 <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar" class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44">
                                <ul class="py-1" aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="{{ route('profile.edit') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2"> {{ __("Profile") }} </a>
                                    </li>
                                    <li>
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        <a href=" {{ route('logout') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2" onclick="event.preventDefault();
                                                this.closest('form').submit();">{{ __("Logout") }}</a>
                                        </form>
                                    </li>
                                </ul>
                                <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Content Body -->

        <script>

            // -------------

            document.addEventListener('DOMContentLoaded', function () {
                const toggleMenus = document.querySelectorAll('.toggle-menu');

                toggleMenus.forEach(function (toggleMenu) {
                    toggleMenu.addEventListener('click', function (event) {
                        event.preventDefault();

                        const submenu = toggleMenu.nextElementSibling;
                        submenu.classList.toggle('hidden');
                    });
                });
            });

            const sidebar = document.getElementById('sidebar');
            const openSidebarButton = document.getElementById('open-sidebar');

            openSidebarButton.addEventListener('click', (e) => {
                e.stopPropagation();
                sidebar.classList.toggle('-translate-x-full');
            });

            // Close the sidebar when clicking outside of it
            document.addEventListener('click', (e) => {
                if (!sidebar.contains(e.target) && !openSidebarButton.contains(e.target)) {
                    sidebar.classList.add('-translate-x-full');
                }
            });
        </script>

    </div>
            </div>
</nav>
