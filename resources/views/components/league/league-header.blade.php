<div class="bg-white rounded-3xl " style="background-image: url('{{asset($league->logo)}}');  background-repeat: no-repeat; background-size: 200%;  background-position: center;">

    <div class="sm:flex sm:justify-between px-14 py-6  rounded-3xl text-white" style="background: rgba(0, 0, 0, 0.3); backdrop-filter: blur(100px);">
        <div class="flex">
            <div class="flex-shrink-0">
                <img src="{{asset($league->logo)}}" width="180" height="180" alt="League Logo" class="bg-gray-100 p-4 rounded-xl">
            </div>

            <div class="flex-col sm:pl-8 self-center">

                <div class="flex p-2 justify-center">
                    <strong class="sm:text-3xl font-extrabold"> {{$league->name}}</strong>
                </div>

                <x-country-icon :country='$league->country' :width='40' :height='40' class="justify-center" />
            </div>
        </div>

        <div class="flex items-center">
            <div class="flex-col ">
                <div class=" flex justify-center mb-2 font-extrabold" style="font-family: sans-serif">Founder </div>
                <div class="flex-col  items-center text-sm">
                    <div class="flex justify-center">
                        <img src="/images/FounderImage.png" width="70" alt="Founder Image" class="rounded-full bg-center">
                    </div>
                    <div class="flex justify-center mt-4">
                        <h5 class="font-extrabold" >{{$league->founder}}</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
