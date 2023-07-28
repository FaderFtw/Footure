<div class="bg-white rounded-3xl " style="background-image: url('{{asset($team->logo)}}');  background-repeat: no-repeat;  background-size: 200%;  background-position: center;">

    <div class="sm:flex flex items-center justify-between px-14 py-6  rounded-3xl text-white" style="background: rgba(0, 0, 0, 0.3); backdrop-filter: blur(100px);">
        <div class="flex">
            <div class="flex-shrink-0">
                <img src="{{asset($team->logo)}}" width="180" height="180" alt="League Logo" class="bg-gray-100 p-4 rounded-xl">
            </div>

            <div class="flex-col sm:pl-8 self-center">

                <div class="flex p-2 justify-center">
                    <strong class="sm:text-3xl font-extrabold"> {{$team->name}}</strong>
                </div>

                <x-country-icon :country='$team->league->country' :width='40' :height='40' class="justify-center" />
            </div>
        </div>

        <div class="flex items-center space-x-16">
            @if($team->league)
                <a href="{{route('league', ['league' => $team->league])}} " class="hover:bg-gray-100 hover:text-gray-500 py-4 px-6  rounded-lg">
                    <div class="flex-col">
                        <div class=" flex justify-center mb-2 font-extrabold" style="font-family: sans-serif">League</div>

                        <div class="flex justify-center">
                            <img src="{{asset($team->league->logo)}}" width="70" alt="Founder Image" class="bg-center">
                        </div>
                    </div>
                </a>
            @endif


            <div class="flex-col space-y-2">
                <div class=" flex justify-center font-extrabold" style="font-family: sans-serif">Coach</div>

                <div class="flex justify-center">
                    <img src="/images/FounderImage.png" width="70" alt="Founder Image" class="rounded-full bg-center">
                </div>

                <div class="flex justify-center">
                    <h5 class="font-extrabold" >{{$team->coach}}</h5>
                </div>

            </div>

        </div>
    </div>
</div>
