<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <td class="w-4 p-4">
        <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
    </td>

    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        <x-team.team-icon :width="60" :height="60" :team="$team"/>
    </th>

    <td class="px-6 py-4">
        @if($team->league)
            <x-league.league-icon :width="40" :height="40" :league="$team->league"/>
        @else
            <div class="flex items-center">
                No league
            </div>
        @endif

    </td>

    <td class="px-6 py-4">
        <div class="flex items-center">
            {{$team->city}}
        </div>
    </td>

    <td class="px-6 py-4">
        <div class="flex items-center">
            {{$team->founded_at}}
        </div>
    </td>

    <td class="px-6 py-4">
        <div class="flex items-center justify-center">
            {{$team->players->count()}}
        </div>
    </td>

    <td class="px-6 py-4">
        <a href="{{route('team.edit', ['team' => $team])}}" class=" text-blue-600 dark:text-blue-500 font-bold hover:bg-gray-300 hover:text-white rounded-lg p-2">Edit</a>
    </td>

    <td class="px-6 py-4">
        <button class="text-red-600 dark:text-blue-500 font-bold hover:bg-gray-300 hover:text-white rounded-lg p-2"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-team-deletion-{{ $key }}')">Delete</button>
    </td>
</tr>

<x-modal :name="'confirm-team-deletion-' . $key" focusable >
    <form method="POST" action="{{route('team-destroy', ['team' => $team])}}">
        @csrf
        @method('DELETE')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Are you sure you want to delete this team?') }}
        </h2>
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ __('Delete Team') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
