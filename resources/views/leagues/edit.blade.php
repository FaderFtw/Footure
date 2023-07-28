<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl leading-tight">
            {{__('Edit League')}}
        </h2>
    </x-slot>

    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-12">
        <x-panel class="max-w-4xl mx-auto">
            <h2 class="text-3xl mb-4"><i class="fas fa-solid fa-trophy mr-2"></i> Edit league : <span class="font-bold">{{$league->name}}</span></h2>

            <div class="flex justify-center p-6">
                <img id="showImage" width="150" src="{{asset($league->logo)}}" alt="League Logo">
            </div>


            <form method="post" action="{{route('league.update', ['league' => $league])}}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div>
                    <x-form.input-label for="name" :value="__('League Name')" />
                    <x-form.text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $league->name)" required autofocus autocomplete="name" />
                    <x-form.input-error class="mt-2" :messages="$errors->get('name')" />
                </div>


                <div>
                    <x-form.input-label for="desc" :value="__('Description')" />
                    <x-form.text-area id="desc" name="desc" class="mt-1 block w-full" required autofocus autocomplete="desc">
                        {{old('desc',$league->desc)}}
                    </x-form.text-area>
                    <x-form.input-error class="mt-2" :messages="$errors->get('desc')" />
                </div>

                <div>
                    <x-form.input-label for="country" :value="__('Select Country')" />
                    <x-form.select-country id="country" name="country" class="mt-1 block w-full" :country="$league->country" required autofocus autocomplete="country"/>
                    <x-form.input-error class="mt-2" :messages="$errors->get('country')" />
                </div>

                <div class="grid grid-cols-2 space-x-4">

                    <div>
                        <x-form.input-label for="founder" :value="__('Founder Name')" />
                        <x-form.text-input id="founder" name="founder" type="text" class="mt-1 block w-full" :value="old('founder',$league->founder)" required autofocus autocomplete="founder" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('founder')" />
                    </div>

                    <div>
                        <x-form.input-label for="founded_at" :value="__('Select Foundation date')" />
                        <x-form.date-input id="founded_at" name="founded_at" type="text" class="mt-1 block w-full" :value="old('founded_at',$league->founded_at)" required autofocus autocomplete="founded_at" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('founded_at')" />
                    </div>

                </div>

                <div>
                    <x-form.input-label for="logo" :value="__('League Logo')" />
                    <x-form.image-input id="image" name="logo" type="file" class="mt-1 block" autofocus autocomplete="logo"/>
                    <x-form.input-error class="mt-2" :messages="$errors->get('logo')" />
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

