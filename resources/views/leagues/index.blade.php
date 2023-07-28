<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl leading-tight">
            {{__('Leagues')}}
        </h2>
    </x-slot>

    <main class="min-h-screen max-w-6xl mx-auto my-10 lg:mt-20 space-y-6">
        <div class="bg-white p-4 rounded-3xl shadow sm:p-8">
            @if($leagues->count())
                <x-league.league-card :league='$leagues[0]'/>

                @foreach($leagues->skip(1) as $league)
                    <x-league.league-card :league='$league' class="mt-10"/>

                @endforeach

            @else
                <p class="text-center font-bold">No leagues yet. Please check back later.</p>
            @endif
        </div>
    </main>

</x-app-layout>
