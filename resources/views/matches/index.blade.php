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
    </x-slot>$

    <main class="main max-w-6xl mx-auto my-10 lg:mt-20 space-y-6 flex justify-between">
        <x-calendar class="calendar"></x-calendar>
        <div class="matches bg-white ml-10 w-3/4 h-1/3 p-4 rounded-3xl shadow sm:p-8 flex-col">
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
