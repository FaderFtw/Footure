<div class="mb-12 pt-6 bg-gray-100 rounded-xl" >
    <div class="mx-12 relative " title="Rating">
        <img src="/profile-images/{{$player->image}}"
             class="border-2 border-gray-300 mx-auto mb-4 rounded-full shadow-lg dark:shadow-black/20" alt="" style="max-width: 100px" />

        <span class="absolute bottom-0 right-0 bg-gray-500 rounded-full text-white w-8 h-8 inline-flex items-center justify-center p-1">{{$player->rating}}</span>
    </div>

    <p class="mb-2 font-bold">{{$player->name}}</p>

    <div class="flex justify-between bg-gray-200 rounded-bl-lg rounded-br-lg p-2 overflow-hidden">
        @if($player->position === 'Striker')
            <p class="font-bold text-red-600">F</p>
        @elseif($player->position === 'Midfielder')
            <p class="font-bold text-green-600">M</p>
        @else
            <p class="font-bold text-blue-600">D</p>
        @endif
        <x-country-icon :width="20" :height="20"  :country="$player->country"/>
    </div>
</div>
