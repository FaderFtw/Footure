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
            <div class="flex space-x-2">
                <h2 class="text-3xl font-bold self-center">Create new match in :</h2>
                <x-league.league-icon :width="50" :height="50" :league="$league"/>
            </div>



            <form method="post" action="{{ route('match.store') }}" class="mt-6 space-y-6">
                @csrf
                <input type="hidden" id="league_id" name="league_id" value="{{$league->id}}">

                <div class="grid grid-cols-3 space-x-4">

                    <div class="flex-col self-center">
                        <x-form.input-label for="team_id_home" :value="__('Home Team')" class="ml-2"/>
                        <x-form.select-team id="team_id_home" name="team_id_home"  class="block"  :teams="$league->teamsOrderedByName" :team="old('team_id_home')" required autofocus autocomplete="team_id_home"/>
                        <x-form.input-error class="mt-2" :messages="$errors->get('team_id_home')" />
                    </div>

                    <div class="flex justify-center p-6">
                        <img id="showImage" width="200" src="{{asset('card-logos/matchLogo.png')}}" alt="VS Logo">
                    </div>

                    <div class="flex-col self-center">
                        <x-form.input-label for="team_id_away" :value="__('Away Team')" class="ml-2"/>
                        <x-form.select-team id="team_id_away" name="team_id_away"  class="block"  :teams="$league->teamsOrderedByName" :team="old('team_id_away')" required autofocus autocomplete="team_id_away"/>
                        <x-form.input-error class="mt-2" :messages="$errors->get('team_id_away')" />
                    </div>
                </div>

                <div class="grid grid-cols-2 space-x-4">

                    <div>
                        <x-form.input-label for="dateOnly" :value="__('Select Match date')" />
                        <x-form.date-input id="dateOnly" name="dateOnly" type="text" class="mt-1 block w-full" :value="old('dateOnly')" required autofocus autocomplete="dateOnly" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('dateOnly')" />
                    </div>

                    <div>
                        <x-form.input-label for="time" :value="__('Match Time')" />
                        <x-form.text-input id="time" name="time" type="time" class="mt-1 block w-full" :value="old('time')" required autofocus autocomplete="time" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('time')" />
                    </div>

                </div>

                <div>
                    <x-form.input-label for="desc" :value="__('Description')" />
                    <x-form.text-area id="desc" name="desc" class="mt-1 block w-full" required autofocus autocomplete="desc"/>
                    <x-form.input-error class="mt-2" :messages="$errors->get('desc')" />
                </div>


                <div class="grid grid-cols-2 space-x-4">

                    <div>
                        <x-form.input-label for="stadium" :value="__('Stadium Name')" />
                        <x-form.text-input id="stadium" name="stadium" type="text" class="mt-1 block w-full" :value="old('stadium')" autofocus autocomplete="stadium" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('stadium')" />
                    </div>

                    <div>
                        <x-form.input-label for="referee" :value="__('Referee')" />
                        <x-form.text-input id="referee" name="referee" type="text" class="mt-1 block w-full" :value="old('referee')" required autofocus autocomplete="referee" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('referee')" />
                    </div>

                </div>


                <div class="flex space-x-4 ">
                    <a href="{{route('match.create')}}" class="self-center hover:underline">Back</a>
                    <x-primary-button class="p-6" >{{ __('Create') }}</x-primary-button>
                </div>


            </form>

        </x-panel>
    </main>

</x-app-layout>

