
<x-app-layout>
    <main class=" flex-col max-w-6xl mx-auto my-10 lg:mt-20 space-y-6">
        <x-team.team-header :team='$team'/>

        <x-team.team-info :team="$team"/>

        <x-match.matches-schedule :matches="$team->homeMatches->merge($team->awayMatches)"/>

        <x-team.team-players :players="$team->players"/>

    </main>
</x-app-layout>

