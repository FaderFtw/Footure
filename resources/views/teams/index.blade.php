<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold  text-3xl leading-tight">
            {{__('Teams')}}
        </h2>
    </x-slot>

    <main class="min-h-screen max-w-6xl mx-auto my-10 lg:mt-20 space-y-6">
        <div class="bg-white p-4 rounded-3xl shadow sm:p-8">
            @if($teams->count())
                <div class="lg:grid lg:grid-cols-6 space-x-2">
                    @foreach($teams as $team)
                        <x-team.team-card :team='$team' class="col-span-2 mb-4"/>
                    @endforeach
                </div>
            @else
                <p class="text-center font-bold">No teams yet. Please check back later.</p>
            @endif
        </div>
    </main>
</x-app-layout>
