<div class="bg-white rounded-3xl " style="background-image: url('/teams-logos/{{$player->team->name}}.png');  background-repeat: no-repeat; background-size: 200%;  background-position: center;">

    <div class="flex justify-between px-14 py-6  rounded-3xl text-white" style="background: rgba(0, 0, 0, 0.3); backdrop-filter: blur(100px);">
        <div class="flex">
            <div class="mx-12 relative " title="Rating">
                <img src="{{ (!empty($player->image)) ? asset($player->image) : asset('avatars/avatar-'. $player->id .'.png')  }}"
                     class="border-2 border-gray-300 mx-auto rounded-full shadow-lg dark:shadow-black/20" alt="" style="max-width: 100px" />

                <span class="absolute bottom-0 right-0 bg-gray-500 rounded-full text-white w-8 h-8 inline-flex items-center justify-center p-1">{{$player->rating}}</span>
            </div>

            <div class="flex p-2 justify-center items-center">
                <strong class="text-3xl font-extrabold"> {{$player->name}}</strong>
            </div>
        </div>
    </div>
</div>
