
<div class="bg-white rounded-3xl p-4">
    <div class="grid grid-cols-2">

        <div class="flex-col ">
            <div class=" border-b-2 p-4 border-gray-300">
                <x-team.team-icon :width="70" :height="70" class="text-xl" :team="$player->team"/>
            </div>

            <div class="flex items-center pt-20">
                <div class="lg:gap-xl-12 grid gap-x-2 md:grid-cols-2 xl:grid-cols-3 p-4 w-full">
                    <div class="flex-col items-center mb-4">

                        <div class="flex justify-center text-sm text-gray-400">NATIONALITY</div>
                        <div class="flex justify-center mt-1 font-bold">
                            <x-country-icon :width="20" :height="20" :country="$player->country"></x-country-icon>
                        </div>

                    </div>
                    <div class="flex-col items-center mb-4">

                        <div class="flex justify-center text-sm text-gray-400">{{date('Y') - $player->age}}</div>
                        <div class="flex justify-center mt-1 font-bold">{{$player->age}} yrs</div>

                    </div>
                    <div class="flex-col items-center mb-4">

                        <div class="flex justify-center text-sm text-gray-400">POSITION</div>
                        <div class="flex justify-center mt-1 font-bold">
                            @if($player->position === 'Striker')
                                <p title="Forward">F</p>
                            @elseif($player->position === 'Midfielder')
                                <p title="Midfielder">M</p>
                            @else
                                <p title="Defender">D</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex-col pt-8 border-l-2">

            <div class="flex justify-center mb-8">
                <div class="flex-col items-center">

                    <div class="flex justify-center text-xl text-gray-400">Overall</div>
                    <div class="flex justify-center mt-2 font-bold">
                        <span class="border border-gray-500 rounded-full  w-8 h-8 flex items-center justify-center p-8 text-2xl">{{$player->rating}}</span>
                    </div>

                </div>
            </div>

            <div class="lg:gap-xl-12 grid gap-x-2 md:grid-cols-2 xl:grid-cols-3 p-4">
                <div class="flex-col items-center mb-8">

                    <div class="flex justify-center text-xl text-gray-400">Attack Rate</div>
                    <div class="flex justify-center mt-2 font-bold">
                        <span class="border border-gray-500 rounded-full  w-8 h-8 flex items-center justify-center p-8 text-2xl text-red-600">{{$player->atkRate}}</span>
                    </div>

                </div>
                <div class="flex-col items-center mb-8">

                    <div class="flex justify-center text-xl text-gray-400">Middle Rate</div>
                    <div class="flex justify-center mt-2 font-bold">
                        <span class="border border-gray-500 rounded-full  w-8 h-8 flex items-center justify-center p-8 text-2xl text-green-600">{{$player->midRate}}</span>
                    </div>

                </div>
                <div class="flex-col items-center mb-8">

                    <div class="flex justify-center text-xl text-gray-400">Defend Rate</div>
                    <div class="flex justify-center mt-2 font-bold">
                        <span class="border border-gray-500 rounded-full  w-8 h-8 flex items-center justify-center p-8  text-2xl text-blue-600">{{$player->defRate}}</span>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
