<article
    {{$attributes->merge(['class' => 'transition-colors duration-300 border border-gray-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])}}>
    <div class="py-6 px-5">
        <div>
            <img src="{{asset($team->logo)}}" alt="Team Logo" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                    <div class="mt-4">
                        <a href="/teams/{{$team->slug}}">
                            <h1 class="text-3xl font-bold">
                                {{$team->name}}
                            </h1>
                        </a>
                        @if($team->league)
                            <div class="flex">
                                <x-league.league-icon :width="40" :height="40" :league='$team->league'/>
                            </div>
                        @else
                            <div class="my-4 sm:flex items-center">No league</div>
                        @endif

                        <span class="mt-2 block text-gray-400 text-xs">
                                        Founded at  <time>{{$team->founded_at}}</time>
                                    </span>
                    </div>
            </header>

            <div class="text-sm mt-4 space-y-2">
                <p class="font-Comic Sans MS">
                    <strong style="font-family: 'Comic Sans MS',serif">City: </strong>
                    {{$team->city}}
                </p>

                <p style="font-family: 'Comic Sans MS',serif">
                    <strong style="font-family: 'Comic Sans MS',serif">Stadium: </strong>
                    {{$team->stadium}}
                </p>

            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex-col">
                    <div class="mb-1 font-bold text-sm" style="font-family: 'Comic Sans MS',serif">Coach : </div>
                    <div class="flex items-center text-sm">
                        <img src="/images/FounderImage.png" width="50" alt="Coach Image">
                        <div class="ml-3">
                            <h5 class="font-bold" >{{$team->coach}}</h5>
                        </div>
                    </div>
                </div>

                <div>
                    <a href="/teams/{{$team->slug}}"
                       class="transition-colors duration-300 text-white text-xs font-semibold bg-blue-500 hover:bg-gray-300 rounded-full py-2 px-8">
                        See More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
