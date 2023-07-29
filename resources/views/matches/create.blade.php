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
            <h2 class="text-3xl font-bold mb-4">Create new match</h2>

            <form method="get" action="{{ route('match.createNext') }}" class="mt-6 space-y-6">
                @csrf

                <div>
                    <div class="flex space-x-2 ml-2">
                        <i class="fas fa-solid fa-trophy"></i> <x-form.input-label for="league_id" :value="__('League')" />
                    </div>
                    <x-form.select-league id="league_id" name="league_id"  class="block"  :leagues="\App\Models\League::orderBy('name')->get()" :team="old('league_id')" required autofocus autocomplete="league_id"/>
                    <x-form.input-error class="mt-2" :messages="$errors->get('league_id')" />
                </div>

                <x-primary-button class="p-6">{{ __('Next') }}</x-primary-button>

            </form>

        </x-panel>
    </main>

</x-app-layout>

