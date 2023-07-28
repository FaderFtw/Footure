<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold  text-3xl leading-tight">
            {{__('Profile')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-panel>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </x-panel>


            <x-panel>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </x-panel>


            <x-panel>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </x-panel>
        </div>
    </div>
</x-app-layout>
