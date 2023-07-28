<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-extrabold text-3xl leading-tight">
            {{__('Dashboard')}}
        </h2>
    </x-slot>
    <main class="max-w-7xl mx-auto my-4 lg:mt-10 space-y-6">

        <div class="lg:gap-xl-12 grid gap-x-4 md:grid-cols-2 xl:grid-cols-4">

            <x-admin.manage-card :href="route('admin.leagues')" image="leagueLogo.svg">MANAGE LEAGUES</x-admin.manage-card>
            <x-admin.manage-card :href="route('admin.teams')" image="teamLogo.png">MANAGE TEAMS</x-admin.manage-card>
            <x-admin.manage-card :href="route('admin.matches')" image="matchesLogo.svg">MANAGE MATCHES</x-admin.manage-card>
            <x-admin.manage-card :href="route('admin.leagues')" image="playersLogo.svg">MANAGE USERS</x-admin.manage-card>
        </div>


    </main>

</x-app-layout>
