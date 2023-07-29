<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <td class="w-4 p-4">
        <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
    </td>

    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        @if($user->role === \App\Models\User::PLAYER)
            <a href="{{route('player', ['user' => $user])}}">
                <div class="flex justify-center">
                    <img id="showImage" class="rounded-full" width="30" src="{{ (!empty($user->image)) ? asset('profile-images/'.$user->image) : asset('avatars/avatar-'. auth()->id() .'.png')  }}" alt="Profile Image">
                </div>
            </a>
        @else
            <div class="flex justify-center">
                <img id="showImage" class="rounded-full" width="30" src="{{ (!empty($user->image)) ? asset('profile-images/'.$user->image) : asset('avatars/avatar-'. auth()->id() .'.png')  }}" alt="Profile Image">
            </div>
        @endif
    </th>

    <td class="px-6 py-4">
        <div class="flex items-center">
            @if($user->role === \App\Models\User::ADMIN)
                Admin
            @elseif($user->role === \App\Models\User::PLAYER)
                Player
            @else
                User
            @endif
        </div>
    </td>

    <td class="px-6 py-4">
        {{$user->name}}
    </td>

    <td class="px-6 py-4">
        {{$user->username}}
    </td>

    <td class="px-6 py-4">
        {{$user->email}}
    </td>

    <td class="px-6 py-4">
        <div class="flex justify-center">
            <x-country-icon :width="30" :height="30" :hidden="true" :country="$user->country"/>
        </div>
    </td>


    @if($user->role !== \App\Models\User::ADMIN)

        <td class="px-6 py-4">
            <a href="   " class=" text-blue-600 dark:text-blue-500 font-bold hover:bg-gray-300 hover:text-white rounded-lg p-2">Edit</a>
        </td>

        <td class="px-6 py-4">
            <button class="text-red-600 dark:text-blue-500 font-bold hover:bg-gray-300 hover:text-white rounded-lg p-2"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-league-deletion-{{ $key }}')">Delete</button>
        </td>

    @endif
</tr>


<x-modal :name="'confirm-league-deletion-' . $key" focusable >
    <form method="POST" action="{{ route('user-destroy', ['user' => $user]) }}">
        @csrf
        @method('DELETE')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to delete this user?') }}
        </h2>
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ __('Delete User') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
