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
            <h2 class="text-3xl mb-4 flex"><svg height="1.5em" class="mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 57.439 57.439" xml:space="preserve" fill="#a1a1a1" stroke="#a1a1a1" stroke-width="0.00057439" transform="matrix(1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path style="fill:#757575;" d="M16.674,12.702c3.807-2.249,7.797-3.388,11.885-3.39c5.597,0,10.098,2.148,12.207,3.373v12.889 h3.285V10.895c0,0-6.408-4.868-15.494-4.868c-4.542,0.002-9.754,1.218-15.168,4.868v14.679h3.285L16.674,12.702L16.674,12.702z"></path> <polygon style="fill:#757575;" points="28.72,46.597 21.115,38.449 16.621,38.449 28.72,51.413 40.818,38.449 36.325,38.449 "></polygon> <path style="fill:#757575;" d="M57.439,38.893l-2.847-4.052l2.841-4.078H46.107V26.82H11.511v3.943H0.006l2.841,4.078L0,38.893 h12.89v-1.388h31.66v1.388H57.439z M11.644,37.648H2.398l1.97-2.801l-1.976-2.836h9.119v5.494h0.133L11.644,37.648L11.644,37.648 z M45.795,37.506h0.313v-5.494h8.938l-1.974,2.838l1.968,2.8h-9.246L45.795,37.506L45.795,37.506z"></path> </g> </g> </g> </g></svg>
                Edit Team : <span class="font-bold">{{$team->name}}</span></h2>

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
                        <x-form.select-league id="league_id" name="league_id"  class="block"  :leagues="\App\Models\League::orderBy('name')->get()" :oldLeague="$team->league" autofocus autocomplete="league_id"/>
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


                <div class="flex space-x-4">
                    <a href="{{route('admin.teams')}}"  class="self-center hover:underline">Back</a>
                    <x-primary-button class="p-6" >{{ __('Save') }}</x-primary-button>
                </div>
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

