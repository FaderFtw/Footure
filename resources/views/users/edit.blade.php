
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-3xl leading-tight">
            {{__('Edit User')}}
        </h2>
    </x-slot>

    <main class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-12">
        <x-panel class="max-w-4xl mx-auto">
            <div class="flex space-x-2">
                <h2 class="text-3xl font-bold self-center">Edit
                    @if($user->role === \App\Models\User::ADMIN)
                        Admin
                    @elseif($user->role === \App\Models\User::PLAYER)
                        Player
                    @else
                        User
                    @endif
                    :</h2>
            </div>

            <div class="col-sm-10 flex justify-center p-6">
                <img id="showImage" style="border-radius: 50%" width="150" src="{{ (!empty($user->image)) ? asset('profile-images/'.$user->image) : asset('avatars/avatar-'. $user->id .'.png')  }}" alt="Profile Image">
            </div>

            <form method="post" action="{{ route('user.update',['user' => $user]) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="grid grid-cols-2 space-x-4">

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

                </div>

                <div>
                    <x-form.input-label for="email" :value="__('Email')" />
                    <x-form.text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="age" />
                    <x-form.input-error class="mt-2" :messages="$errors->get('email')" />

                </div>

                <div class="flex justify-around space-x-4 items-center">

                    <div>
                        <x-form.input-label for="age" :value="__('Age')" />
                        <x-form.text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age', $user->age)" required autofocus autocomplete="age" />
                        <x-form.input-error class="mt-2" :messages="$errors->get('age')" />
                    </div>

                    <div>
                        <x-form.input-label for="country" :value="__('Select Nationality')" />
                        <x-form.select-country id="country" name="country" class="mt-1 block w-full" :country="old('country', $user->country)" required autofocus autocomplete="country"/>
                        <x-form.input-error class="mt-2" :messages="$errors->get('country')" />
                    </div>

                </div>

                <div>
                    <x-form.input-label for="image" :value="__('Profile Image')" />
                    <x-form.image-input id="image" name="image" type="file" autofocus autocomplete="image"/>
                    <x-form.input-error class="mt-2" :messages="$errors->get('image')" />
                </div>


                @if ($user->role === 2)
                    <div class="flex-col self-center">
                        <x-form.input-label for="team_id" :value="__('Current Team')" />
                        <x-form.select-homeTeam id="team_id" name="team_id"  class="block"  :teams="\App\Models\Team::orderBy('name')->get()" :oldTeam="$user->team" required autofocus autocomplete="team_id"/>
                        <x-form.input-error class="mt-2" :messages="$errors->get('team_id')" />
                    </div>

                    <div>
                        <x-form.input-label for="position" :value="__('Position')" />
                        <x-form.select-input id="position" class="block mt-1 w-full" name="position" required>
                            <option value="">Select Position</option>
                            <option value="Striker" {{$user->position === 'Striker' ? 'selected' : ''}}>Striker</option>
                            <option value="Midfielder" {{$user->position === 'Midfielder' ? 'selected' : ''}}>Midfielder</option>
                            <option value="Defender" {{$user->position === 'Defender' ? 'selected' : ''}}>Defender</option>
                        </x-form.select-input>
                        <x-form.input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-3 space-x-4 mt-4">

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

                    </div>

                @endif

                <x-primary-button>{{ __('Save') }}</x-primary-button>

            </form>

        </x-panel>
    </main>

</x-app-layout>

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

