<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- Include the flag-icon-css from the CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl leading-tight">
            {{__('Create Match')}}
        </h2>
    </x-slot>

    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-12">
        <x-panel class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold mb-4">Create new match</h2>



            <form method="post" action="{{ route('team.store') }}" class="mt-6 space-y-6">
                @csrf

                <div>
                    <div class="flex space-x-2 ml-2">
                        <i class="fas fa-solid fa-trophy"></i> <x-form.input-label for="league_id" :value="__('League')" />
                    </div>
                    <x-form.select-league id="league_id" name="league_id"  class="block"  :leagues="\App\Models\League::orderBy('name')->get()" :league="old('league_id')" required autofocus autocomplete="league_id"/>
                    <x-form.input-error class="mt-2" :messages="$errors->get('league_id')" />
                </div>

                <div class="grid grid-cols-3 space-x-4">

                    <div class="flex-col self-center">
                        <x-form.input-label for="team_id_home" :value="__('Home Team')" class="ml-2"/>
                        <x-form.select-team id="team_id_home" name="team_id_home"  class="block"  :teams="\App\Models\Team::orderBy('name')->get()" :team="old('team_id_home')" required autofocus autocomplete="team_id_home"/>
                        <x-form.input-error class="mt-2" :messages="$errors->get('team_id_home')" />
                    </div>

                    <div class="flex justify-center p-6">
                        <img id="showImage" width="200" src="{{asset('card-logos/matchLogo.png')}}" alt="VS Logo">
                    </div>

                    <div class="flex-col self-center">
                        <x-form.input-label for="team_id_away" :value="__('Away Team')" class="ml-2"/>
                        <x-form.select-team id="team_id_away" name="team_id_away"  class="block"  :teams="\App\Models\Team::orderBy('name')->get()" :team="old('team_id_away')" required autofocus autocomplete="team_id_away"/>
                        <x-form.input-error class="mt-2" :messages="$errors->get('team_id_away')" />
                    </div>
                </div>

                <div class="grid grid-cols-2 space-x-4">

                    <div>
                        <x-form.input-label for="date" :value="__('Select Match date')" />
                        <x-form.date-input id="date" name="date" type="text" class="mt-1 block w-full" :value="old('date')" required autofocus autocomplete="date" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('date')" />
                    </div>

                    <div>
                        <x-form.input-label for="time" :value="__('Match Time')" />
                        <x-form.text-input id="time" name="time" type="time" class="mt-1 block w-full" :value="old('time')" required autofocus autocomplete="time" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('time')" />
                    </div>

                </div>


                <div class="grid grid-cols-2 space-x-4">

                    <div>
                        <x-form.input-label for="stadium" :value="__('Stadium Name')" />
                        <x-form.text-input id="stadium" name="stadium" type="text" class="mt-1 block w-full" :value="old('stadium')" autofocus autocomplete="stadium" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('stadium')" />
                    </div>

                    <div>
                        <x-form.input-label for="referee" :value="__('Referee')" />
                        <x-form.text-input id="referee" name="referee" type="number" class="mt-1 block w-full" :value="old('referee')" required autofocus autocomplete="referee" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('referee')" />
                    </div>

                </div>

                <x-primary-button class="p-6">{{ __('Create') }}</x-primary-button>

            </form>

        </x-panel>
    </main>


</x-app-layout>

