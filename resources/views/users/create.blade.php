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
                <h2 class="text-3xl font-bold self-center">Create new user</h2>
            </div>

            <form method="POST" class="mt-6 space-y-6" action="{{ route('user.create') }}">
                @csrf

                <div class="grid grid-cols-2 space-x-4">

                    <!-- Name -->
                    <div>
                        <x-form.input-label for="name" :value="__('Name')" />
                        <x-form.text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-form.input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Username -->
                    <div>
                        <x-form.input-label for="username" :value="__('Username')"/>
                        <x-form.text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                        <x-form.input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                </div>


                <!-- Email Address -->
                <div >
                    <x-form.input-label for="email" :value="__('Email')" />
                    <x-form.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-form.input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex justify-around space-x-4 items-center">

                    <!-- Age -->
                    <div>
                        <x-form.input-label for="age" :value="__('Age')" />
                        <x-form.text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required />
                        <x-form.input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>

                    <div>
                        <x-form.input-label for="country" :value="__('Select Nationality')" />
                        <x-form.select-country id="country" name="country" class="mt-1 block w-full" :country="old('country')" required autofocus autocomplete="country"/>
                        <x-form.input-error class="mt-2" :messages="$errors->get('country')" />
                    </div>


                </div>

                <!-- Password -->
                <div>
                    <x-form.input-label for="password" :value="__('Password')" />

                    <x-form.text-input id="password" class="block mt-1 w-full"
                                       type="password"
                                       name="password"
                                       required autocomplete="new-password" />

                    <x-form.input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-form.input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-form.text-input id="password_confirmation" class="block mt-1 w-full"
                                       type="password"
                                       name="password_confirmation" required autocomplete="new-password" />

                    <x-form.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Player Status -->
                <div>
                    <x-form.input-label for="role" :value="__('Player Status')"/>
                    <x-form.select-input id="role" class="block mt-1 w-full" name="role" required onchange="togglePlayerFields(this)">
                        <option value="{{\App\Models\User::ADMIN}}">Admin</option>
                        <option value="{{\App\Models\User::USER}}">User</option>
                        <option value="{{\App\Models\User::PLAYER}}">Player</option>
                    </x-form.select-input>
                    <x-form.input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- Player Fields -->
                <div id="player_fields" style="display: none;">
                    <!-- Position -->
                    <div>
                        <x-form.input-label for="position" :value="__('Position')" />
                        <x-form.select-input id="position" class="block mt-1 w-full" name="position">
                            <option value="Striker">Striker</option>
                            <option value="Midfielder">Midfielder</option>
                            <option value="Defender">Defender</option>
                        </x-form.select-input>
                        <x-form.input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-3 space-x-4 mt-4">
                        <!-- Attack Rate -->
                        <div>
                            <x-form.input-label for="atkRate" :value="__('Attack Rate')" />
                            <x-form.text-input id="atkRate" class="block mt-1 w-full" type="number" name="atkRate" :value="old('atkRate')" />
                            <x-form.input-error :messages="$errors->get('atkRate')" class="mt-2" />
                        </div>

                        <!-- Midfield Rate -->
                        <div>
                            <x-form.input-label for="midRate" :value="__('Midfield Rate')" />
                            <x-form.text-input id="midRate" class="block mt-1 w-full" type="number" name="midRate" :value="old('midRate')" />
                            <x-form.input-error :messages="$errors->get('midRate')" class="mt-2" />
                        </div>

                        <!-- Defense Rate -->
                        <div>
                            <x-form.input-label for="defRate" :value="__('Defense Rate')" />
                            <x-form.text-input id="defRate" class="block mt-1 w-full" type="number" name="defRate" :value="old('defRate')" />
                            <x-form.input-error :messages="$errors->get('defRate')" class="mt-2" />
                        </div>
                    </div>

                </div>

                <script>
                    function togglePlayerFields(select) {
                        var playerFields = document.getElementById('player_fields');
                        playerFields.style.display = select.value === '2' ? 'block' : 'none';

                        // Set required attribute based on player status
                        var atkRateField = document.getElementById('atkRate');
                        var midRateField = document.getElementById('midRate');
                        var defRateField = document.getElementById('defRate');
                        var positionField = document.getElementById('position');

                        if (select.value === '2') {
                            atkRateField.required = true;
                            midRateField.required = true;
                            defRateField.required = true;
                            positionField.required = true;
                        } else {
                            atkRateField.required = false;
                            midRateField.required = false;
                            defRateField.required = false;
                            positionField.required = false;
                        }
                    }
                </script>


                <x-primary-button class="ml-4">
                    {{ __('Create') }}
                </x-primary-button>

            </form>
        </x-panel>
    </main>

</x-app-layout>

