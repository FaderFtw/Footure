<style>
    /* CSS to style the link */
    .playerLink {
        cursor: pointer;
    }
</style>

<div class="bg-white rounded-3xl">
    <section class="bg-white rounded-3xl p-8 text-center">
        <h2 class="mb-12 text-2xl font-bold">
            Players
        </h2>

        @if($players->count())
            <div class="lg:gap-xl-12 grid gap-x-2 md:grid-cols-3 xl:grid-cols-5">
                @foreach($players as $player)
                    <div class="relative">
                        <a href="/player/{{$player->username}}" class="playerLink" title="Player Profile: {{$player->username}}">
                            <x-player.player-card :player="$player"/>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center font-bold">No Players yet. Please check back later.</p>
        @endif
    </section>
</div>
