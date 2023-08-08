<style>
    @media (max-width: 767px) {
        /* Styles for screens smaller than 768px (e.g., mobile phones) */
        .main {
            flex-direction: column;
            /* Add more responsive styles as needed */
        }

        .calendar, .matches{
            align-self: center;
        }


    }

    @media (min-width: 768px) and (max-width: 1023px) {
        /* Styles for screens between 768px and 1023px (e.g., tablets) */
        .main {
            justify-content: center;
        }

        .calendar, .matches{
            align-self: center;
        }
    }

</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold  text-3xl leading-tight">
            {{__('Matches')}}
        </h2>
    </x-slot>

    <main class="main max-w-6xl mx-auto my-10 lg:mt-20 space-y-6 flex justify-between">
        <x-calendar class="calendar"></x-calendar>
        <div class="matches bg-white ml-10 w-3/4 h-1/3 p-4 rounded-3xl shadow sm:p-8 flex-col">
            <div class="flex justify-end">
                <form method="GET" action="#" class="mb-6 w-3/4">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                    <div class="relative">
                        <div class="absolute flex inset-y-0 items-center pr-24 right-0">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                        </div>
                        <input type="text" name="search" value="{{request('search')}}" class="block w-full px-6 py-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search Matches">
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5  bg-gray-800 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Search</button>
                    </div>
                </form>
            </div>

            @if($matches->count())
                <div class="flex justify-center mb-6">
                    @if(strtotime($matches[0]->date) === strtotime(date('Y-m-d')))
                        <p class="text-3xl font-bold self-center">Today</p>
                    @else
                        <time class="text-3xl font-bold self-center">{{date('Y-m-d', strtotime($matches[0]->date))}}</time>
                    @endif

                </div>

                @foreach($matches as $matche)
                   <x-match.match-line :date='false' :match='$matche' class="{{$loop->iteration == 1 ? 'mt-0' : 'pt-5 border-t-2'}}"/>
                @endforeach

            @else
                <p class="text-center font-bold">No matches yet. Please check back later.</p>
            @endif
        </div>
    </main>
</x-app-layout>
