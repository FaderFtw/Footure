<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- Include the flag-icon-css from the CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl leading-tight">
            {{__('Edit Team')}}
        </h2>
    </x-slot>

    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-12">
        <x-panel class="max-w-4xl mx-auto">
            <h2 class="text-3xl mb-4"><i class="fas fa-solid fa-trophy mr-2"></i> Edit Team : <span class="font-bold">{{$team->name}}</span></h2>

            <div class="flex justify-center p-6">
                <img id="showImage" width="150" src="{{asset($team->logo)}}" alt="Team Logo">
            </div>


            <form method="post" action="{{ route('team.update',['team' => $team]) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div>
                    <x-form.input-label for="name" :value="__('Team Name')" />
                    <x-form.text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name',$team->name)" required autofocus autocomplete="name" />
                    <x-form.input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-form.input-label for="city" :value="__('City')" />
                    <x-form.text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city',$team->city)" required autofocus autocomplete="city" />
                    <x-form.input-error class="mt-2" :messages="$errors->get('city')" />
                </div>


                <div class="grid grid-cols-2 space-x-4">

                    <div>
                        <x-form.input-label for="stadium" :value="__('Stadium Name')" />
                        <x-form.text-input id="stadium" name="stadium" type="text" class="mt-1 block w-full" :value="old('stadium',$team->stadium)" required autofocus autocomplete="stadium" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('stadium')" />
                    </div>

                    <div>
                        <x-form.input-label for="capacity" :value="__('Capacity')" />
                        <x-form.text-input id="capacity" name="capacity" type="number" class="mt-1 block w-full" :value="old('capacity',$team->capacity)" required autofocus autocomplete="capacity" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('capacity')" />
                    </div>

                </div>

                <div class="grid grid-cols-2 space-x-4">

                    <div>
                        <x-form.input-label for="coach" :value="__('Coach Name')" />
                        <x-form.text-input id="coach" name="coach" type="text" class="mt-1 block w-full" :value="old('coach',$team->coach)" required autofocus autocomplete="coach" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('coach')" />
                    </div>

                    <div>
                        <div class="flex space-x-2">
                            <i class="fas fa-solid fa-trophy"></i> <x-form.input-label for="league_id" :value="__('League')" />
                        </div>
                        <x-form.select-league id="league_id" name="league_id"  class="block"  :leagues="\App\Models\League::orderBy('name')->get()" autofocus autocomplete="league_id"/>
                        <x-form.input-error class="mt-2" :messages="$errors->get('league_id')" />
                    </div>


                </div>

                <div class="grid grid-cols-2 space-x-4">
                    <div>
                        <x-form.input-label for="founded_at" :value="__('Select Foundation date')" />
                        <x-form.date-input id="founded_at" name="founded_at" type="text" class="mt-1 block w-full" :value="old('founded_at',$team->founded_at)" required autofocus autocomplete="founded_at" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('founded_at')" />
                    </div>

                    <div>
                        <x-form.input-label for="logo" :value="__('Team Logo')" />
                        <x-form.image-input id="image" name="logo" type="file" class="mt-1 block"  autofocus autocomplete="logo"/>
                        <x-form.input-error class="mt-2" :messages="$errors->get('logo')" />
                    </div>
                </div>


                <x-primary-button class="p-6">{{ __('Save') }}</x-primary-button>

            </form>

        </x-panel>
    </main>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

</x-app-layout>

