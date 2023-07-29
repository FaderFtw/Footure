<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- Include the flag-icon-css from the CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl leading-tight">
            {{__('Edit Match')}}
        </h2>
    </x-slot>

    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-12">
        <x-panel class="max-w-4xl mx-auto">
            <div class="flex space-x-2">
                <h2 class="text-3xl font-bold self-center">Edit match in :</h2>
                @dd($match)
                <x-league.league-icon :width="50" :height="50" :league="$match->league"/>
            </div>



            <form method="post" action="{{ route('match.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('PATCH')

                <input type="hidden" id="league_id" name="league_id" value="{{$match->league->id}}">

                <div class="grid grid-cols-3 space-x-4">

                    <div class="flex-col self-center">
                        <x-form.input-label for="team_id_home" :value="__('Home Team')" class="ml-2"/>
                        <x-form.select-team id="team_id_home" name="team_id_home"  class="block"  :teams="$league->teamsOrderedByName" :team="$match->homeTeam" required autofocus autocomplete="team_id_home"/>
                        <x-form.input-error class="mt-2" :messages="$errors->get('team_id_home')" />
                    </div>

                    <div class="flex justify-center p-6">
                        <img id="showImage" width="200" src="{{asset('card-logos/matchLogo.png')}}" alt="VS Logo">
                    </div>

                    <div class="flex-col self-center">
                        <x-form.input-label for="team_id_away" :value="__('Away Team')" class="ml-2"/>
                    <x-form.select-team id="team_id_away" name="team_id_away"  class="block"  :teams="$league->teamsOrderedByName"  :team="$match->awayTeam" :team="old('team_id_away')" required autofocus autocomplete="team_id_away"/>
                        <x-form.input-error class="mt-2" :messages="$errors->get('team_id_away')" />
                    </div>
                </div>


            </form>


        </x-panel>
    </main>

</x-app-layout>

