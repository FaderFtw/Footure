
<x-app-layout>
    <main class="min-h-screen max-w-6xl mx-auto my-10 lg:mt-20 space-y-6">
        <x-league.league-header :league='$league'/>

        <div class="bg-white flex-col rounded-3xl p-8">
            <div class="flex justify-center mb-10"> <span class="text-2xl text-center font-bold">League Info</span></div>
            <div class="grid grid-cols-2 ">
                <div class="flex-col space-y-8 border-t-2 py-4">
                    <div class="flex justify-center">
                        <span class="mt-2 block font-bold text-xl">
                            Founded at
                            <time>{{$league->founded_at}}</time>
                        </span>
                    </div>

                    <div class="flex-col items-center self-center">
                        <div class="flex justify-center"><img src="/card-logos/teamLogo.png" width="100" height="100" alt="" title=""></div>
                        <div class="flex justify-center my-2"><span class="text-md-center font-bold"><p>{{$league->teams->count()}}</p></span></div>
                        <div><span class="text-center text-gray-400"><p>Number of teams</p></span></div>
                    </div>

                </div>

                <div class="p-8 border-l-2 border-t-2 border-gray-300">
                    <div class="mb-2 self-center">
                        <strong > DESCRIPTION :</strong>
                    </div>
                    <div class="text-sm">
                        <p>
                            {{$league->desc}}
                        </p>
                    </div>
                </div>

            </div>
        </div>


        <div class="bg-white flex-col rounded-3xl p-8">
          <x-league.league-standings :teams='$league->teams'/>
        </div>

        <x-match.matches-schedule :matches='$league->matches'/>

    </main>
</x-app-layout>
