<x-app-layout>
    <main class=" flex-col max-w-6xl mx-auto my-10 lg:mt-20 space-y-6">
        <x-player.player-header :player='$player'/>

        <x-player.player-info :player="$player"/>
    </main>
</x-app-layout>
