<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold  text-3xl leading-tight">
            {{__('User Management')}}
        </h2>
    </x-slot>

    <main class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <x-panel>
            <div class="flex flex-shrink-0 justify-end mb-4">
                <h4 class="flex items-center mr-6 font-bold">ADD USER</h4>
                <a href="{{route('user.create')}}">
                    <i class="fas fa-solid fa-plus rounded-lg border-2 border-gray-300 p-3"  title="add user"></i>
                </a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                {{--<div class="flex items-center justify-between pb-4 bg-white ">
                   --}}{{-- <div>
                        <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Action button</span>
                            Action
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
                            </div>
                        </div>
                    </div>
                    --}}{{--
                </div>--}}

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">

                        </th>
                        <th scope="col" class="px-6 py-3">
                            Avatar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nationality
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit user
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Delete user
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\User::orderBy('role', 'asc')->get() as $key => $user)
                        <x-admin.table-user-line :user="$user" :key="$key"/>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </x-panel>
    </main>
</x-app-layout>
