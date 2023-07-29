<x-guest-layout >
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-form.input-label for="name" :value="__('Name')" />
            <x-form.text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-form.input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Username -->
        <div>
            <x-form.input-label for="username" :value="__('Username')" class="mt-2"/>
            <x-form.text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-form.input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Age -->
        <div class="mt-4">
            <x-form.input-label for="age" :value="__('Age')" />
            <x-form.text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required />
            <x-form.input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-form.input-label for="email" :value="__('Email')" />
            <x-form.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-form.input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-form.input-label for="password" :value="__('Password')" />

            <x-form.text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />

            <x-form.input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-form.input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-form.text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-form.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Player Status -->
        <div class="mt-4">
            <x-form.input-label for="role" :value="__('Player Status')"/>
            <x-form.select-input id="role" class="block mt-1 w-full" name="role" required onchange="togglePlayerFields(this)">
                <option value="1">Not a Player</option>
                <option value="2">Player</option>
            </x-form.select-input>
            <x-form.input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Player Fields -->
        <div id="player_fields" class="mt-4" style="display: none;">
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

            <!-- Attack Rate -->
            <div class="mt-4">
                <x-form.input-label for="atkRate" :value="__('Attack Rate')" />
                <x-form.text-input id="atkRate" class="block mt-1 w-full" type="number" name="atkRate" :value="old('atkRate')" />
                <x-form.input-error :messages="$errors->get('atkRate')" class="mt-2" />
            </div>

            <!-- Midfield Rate -->
            <div class="mt-4">
                <x-form.input-label for="midRate" :value="__('Midfield Rate')" />
                <x-form.text-input id="midRate" class="block mt-1 w-full" type="number" name="midRate" :value="old('midRate')" />
                <x-form.input-error :messages="$errors->get('midRate')" class="mt-2" />
            </div>

            <!-- Defense Rate -->
            <div class="mt-4">
                <x-form.input-label for="defRate" :value="__('Defense Rate')" />
                <x-form.text-input id="defRate" class="block mt-1 w-full" type="number" name="defRate" :value="old('defRate')" />
                <x-form.input-error :messages="$errors->get('defRate')" class="mt-2" />
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

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        @if($errors->any())
            <ul class="mt-3">
                @foreach($errors->all() as $error)
                    <li class="text-red-600 text-xs"> {{$error}}</li>
                @endforeach
            </ul>
        @endif
    </form>
</x-guest-layout>
