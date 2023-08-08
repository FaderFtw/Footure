<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl leading-tight">
            {{__('Leagues')}}
        </h2>
    </x-slot>

    <main class="min-h-screen max-w-6xl mx-auto my-10 lg:mt-20 ">

        <div class="bg-white p-4 rounded-3xl shadow sm:p-8 space-y-6">
            <div class="flex justify-end">
                <form method="GET" action="#" class=" w-1/2">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                    <div class="relative">
                        <div class="absolute flex inset-y-0 items-center pr-24 right-0">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                        </div>
                        <input type="text" name="search" value="{{request('search')}}" class="block w-full px-6 py-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search Leagues">
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5  bg-gray-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Search</button>
                    </div>
                </form>
            </div>

            @if($leagues->count())
                @foreach($leagues as $league)
                    <x-league.league-card :league='$league'/>

                @endforeach

                {{$leagues->links()}}

            @else
                <p class="text-center font-bold">No leagues yet. Please check back later.</p>
            @endif
        </div>
    </main>

</x-app-layout>
