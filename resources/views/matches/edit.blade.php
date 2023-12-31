
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl leading-tight">
            {{__('Edit Match')}}
        </h2>
    </x-slot>

    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-12">
        <x-panel class="max-w-4xl mx-auto">
            <div class="flex space-x-2">
                <h2 class="text-3xl font-bold self-center"><i class="fas fa-regular fa-clock mr-2"></i>Edit match in :</h2>
                <x-league.league-icon :width="50" :height="50" :league="$match->league"/>
            </div>



            <form method="post" action="{{ route('match.update',['matche'=> $match]) }}" class="mt-6 space-y-6">
                @csrf
                @method('PATCH')

                <input type="hidden" id="league_id" name="league_id" value="{{$match->league->id}}">
                @if($match->score)
                    <input type="hidden" id="score_id" name="score_id" value="{{$match->score->id}}">
                @endif

                <div class="grid grid-cols-3 space-x-4">

                    <div class="flex-col self-center">
                        <x-form.input-label for="team_id_home" :value="__('Home Team')" class="ml-2"/>
                        <x-form.select-homeTeam id="team_id_home" name="team_id_home"  class="block"  :teams="$match->league->teamsOrderedByName" :oldTeam="$match->homeTeam" required autofocus autocomplete="team_id_home" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('team_id_home')" />
                    </div>

                    <div class="flex justify-center p-6">
                        <img id="showImage" width="200" src="{{asset('card-logos/matchLogo.png')}}" alt="VS Logo">
                    </div>

                    <div class="flex-col self-center">
                        <x-form.input-label for="team_id_away" :value="__('Away Team')" class="ml-2"/>
                        <x-form.select-awayTeam id="team_id_away" name="team_id_away"  class="block"  :teams="$match->league->teamsOrderedByName"  :oldTeam="$match->awayTeam" :team="old('team_id_away')" required autofocus autocomplete="team_id_away"/>
                        <x-form.input-error class="mt-2" :messages="$errors->get('team_id_away')" />
                    </div>
                </div>


                @if(strtotime($match->date) >= strtotime(date('Y-m-d H:i')))

                    <div class="grid grid-cols-2 space-x-4">

                        <div>
                            <x-form.input-label for="dateOnly" :value="__('Select Match date')" />
                            <x-form.text-input id="dateOnly" name="dateOnly" type="date" class="mt-1 block w-full" :value="old('dateOnly',date('Y-m-d', strtotime($match->date)))" required autofocus autocomplete="dateOnly" onchange="updateHiddenInput()"/>
                            <x-form.input-error class="mt-2" :messages="$errors->get('date')" />
                        </div>

                        <div>
                            <x-form.input-label for="time" :value="__('Match Time')" />
                            <x-form.text-input id="time" name="time" type="time" class="mt-1 block w-full" :value="old('time',date('H:i', strtotime($match->date)))" required autofocus autocomplete="time" onchange="updateHiddenInput()"/>
                            <x-form.input-error class="mt-2" :messages="$errors->get('time')" />
                        </div>


                        <input type="hidden" id="date" name="date" value="{{old('date',date('Y-m-d H:i', strtotime($match->date)))}}">


                    </div>

                @else

                    <div class="grid grid-cols-2 space-x-4">

                        <div>
                            <x-form.input-label for="dateOnly" :value="__('Select Match date')" />
                            <x-form.text-input id="dateOnly" name="dateOnly" type="date" class="mt-1 block w-full" :value="old('dateOnly',date('Y-m-d', strtotime($match->date)))" required autofocus autocomplete="dateOnly" onchange="updateHiddenInput()" readonly/>
                            <x-form.input-error class="mt-2" :messages="$errors->get('date')" />
                        </div>

                        <div>
                            <x-form.input-label for="time" :value="__('Match Time')" />
                            <x-form.text-input id="time" name="time" type="time" class="mt-1 block w-full" :value="old('time',date('H:i', strtotime($match->date)))" required autofocus autocomplete="time" onchange="updateHiddenInput()" readonly/>
                            <x-form.input-error class="mt-2" :messages="$errors->get('time')" />
                        </div>


                        <input type="hidden" id="date" name="date" value="{{old('date',date('Y-m-d H:i', strtotime($match->date)))}}">


                    </div>
                @endif

                <div>
                    <x-form.input-label for="desc" :value="__('Description')" />
                    <x-form.text-area id="desc" name="desc" class="mt-1 block w-full" required autofocus autocomplete="desc">{{old('desc',$match->desc)}}</x-form.text-area>
                    <x-form.input-error class="mt-2" :messages="$errors->get('desc')" />
                </div>


                <div class="grid grid-cols-2 space-x-4">

                    <div>
                        <x-form.input-label for="stadium" :value="__('Stadium Name')" />
                        <x-form.text-input id="stadium" name="stadium" type="text" class="mt-1 block w-full" :value="old('stadium',$match->stadium)" autofocus autocomplete="stadium" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('stadium')" />
                    </div>

                    <div>
                        <x-form.input-label for="referee" :value="__('Referee')" />
                        <x-form.text-input id="referee" name="referee" type="text" class="mt-1 block w-full" :value="old('referee',$match->referee)" required autofocus autocomplete="referee" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('referee')" />
                    </div>

                </div>

                <div class="flex space-x-4">
                    <a href="{{route('admin.matches')}}"  class="self-center hover:underline">Back</a>
                    <x-primary-button class="p-6" >{{ __('Save') }}</x-primary-button>
                </div>


                <script>
                    function updateHiddenInput() {
                        const dateInput = document.getElementById('dateOnly');
                        const timeInput = document.getElementById('time');
                        const hiddenInput = document.getElementById('date');

                        const dateValue = dateInput.value;
                        const timeValue = timeInput.value;

                        // Set the value of the hidden input to the combined date and time
                        hiddenInput.value = `${dateValue} ${timeValue}`;
                    }
                </script>


            </form>


        </x-panel>
    </main>

</x-app-layout>
