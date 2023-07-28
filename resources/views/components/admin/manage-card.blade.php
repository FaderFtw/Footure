<style>

    @keyframes slide-in-elliptic-top-fwd{0%{transform:translateY(-600px) rotateX(-30deg) scale(0);transform-origin:50% 100%;opacity:0}100%{transform:translateY(0) rotateX(0) scale(1);transform-origin:50% 1400px;opacity:1}}
    .slide-in-elliptic-top-fwd{animation:slide-in-elliptic-top-fwd .9s cubic-bezier(.25,.46,.45,.94) both}

    .glassBox:hover .glassBox__imgBox img {
        transform: translate(-10px, -40px) rotate(-15deg) scale(1.7);
    }

    .glassBox__title{
        text-shadow:
            -2px -2px 0 black,
            2px -2px 0 black,
            -2px 2px 0 black,
            2px 2px 0 black;
    }

    .glassBox:hover .glassBox__title {
        padding-top: 20px;
    }


</style>

<a href="{{$href}}" class="relative inline-block group .slide-in-elliptic-top-fwd">
    <div class="bg-white rounded-3xl max-w-sm mb-4 mx-auto" style="background-image: url('/card-logos/{{$image}}'); background-repeat: no-repeat; background-size: 100%; background-position: center;">
        <div class="glassBox bg-white rounded-3xl flex-col justify-center items-center px-5 py-28" style="background: rgba(0, 0, 0, 0.3); backdrop-filter: blur(15px);">

            <div class="glassBox__imgBox flex justify-center mb-6">
                <img src="/card-logos/{{$image}}" width="150" height="150" alt="" title="">
            </div>

            <div class="glassBox__title flex justify-center text-white font-bold text-2xl">
                {{$slot}}
            </div>

        </div>
    </div>

</a>

