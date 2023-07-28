
<x-app-layout>
    <main class="min-h-screen max-w-6xl mx-auto my-10 lg:mt-20 space-y-6">
        <x-league.league-header :league='$league'/>

        <div class="bg-white flex-col rounded-3xl p-8">
            <div class="flex justify-center mb-10"> <span class="text-2xl text-center font-bold">League Info</span></div>
            <div class="grid grid-cols-2 ">
                <div class="flex justify-center border-t-2 "> <span class="mt-2 block text-gray-400 text-md-center self-center">Founded at  <time>{{$league->founded_at}}</time></span></div>

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
