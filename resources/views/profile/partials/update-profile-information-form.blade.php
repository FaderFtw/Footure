<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <div class="col-sm-10 flex justify-center p-6">
        <img id="showImage" style="border-radius: 50%" width="150" src="{{ (!empty($user->image)) ? asset($user->image) : asset('avatars/avatar-'. auth()->id() .'.png')  }}" alt="Profile Image">
    </div>


    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-form.input-label for="name" :value="__('Name')" />
            <x-form.text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-form.input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-form.input-label for="username" :value="__('Userame')" />
            <x-form.text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" required autofocus autocomplete="username" />
            <x-form.input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-form.input-label for="age" :value="__('Age')" />
            <x-form.text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age', $user->age)" required autofocus autocomplete="age" />
            <x-form.input-error class="mt-2" :messages="$errors->get('age')" />
        </div>

        <div>
            <x-form.input-label for="image" :value="__('Profile Image')" />
            <x-form.image-input id="image" name="image" type="file" required autofocus autocomplete="image"/>
            <x-form.input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        @if ($user->role === 2)
            <div>
                <x-form.input-label for="atkRate" :value="__('Attack Rate')" />
                <x-form.text-input id="atkRate" name="atkRate" type="text" class="mt-1 block w-full" :value="old('atkRate', $user->atkRate)" required autofocus autocomplete="atkRate" />
                <x-form.input-error class="mt-2" :messages="$errors->get('atkRate')" />
            </div>

            <div>
                <x-form.input-label for="midRate" :value="__('Midfield Rate')" />
                <x-form.text-input id="midRate" name="midRate" type="text" class="mt-1 block w-full" :value="old('midRate', $user->midRate)" required autofocus autocomplete="midRate" />
                <x-form.input-error class="mt-2" :messages="$errors->get('midRate')" />
            </div>

            <div>
                <x-form.input-label for="defRate" :value="__('Defense Rate')" />
                <x-form.text-input id="defRate" name="defRate" type="text" class="mt-1 block w-full" :value="old('defRate', $user->defRate)" required autofocus autocomplete="defRate" />
                <x-form.input-error class="mt-2" :messages="$errors->get('defRate')" />
            </div>
        @endif

        <div>
            <x-form.input-label for="email" :value="__('Email')" />
            <x-form.text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="age" />
            <x-form.input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

</section>


