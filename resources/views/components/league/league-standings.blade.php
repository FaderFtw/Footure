
<div class="flex justify-center mb-10"> <span class="text-2xl text-center font-bold">Standings</span></div>

<section class="content-info">
    <div class="container px-4 py-2">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                @if($teams->count())
                    <table class="table-auto w-full text-left border-collapse table-striped table-responsive table-hover result-point">
                        <x-standings-header/>
                        <tbody class="text-center divide-y divide-gray-300">
                        @foreach($teams as $team)
                            @if(in_array($loop->iteration,[1,2,3,4]))
                                <x-team.team-line :team='$team' :loop='$loop' status="bg-green-500 text-white rounded-full "/>
                            @elseif(in_array($loop->iteration,[$teams->count(),$teams->count()-1,$teams->count()-2]))
                                <x-team.team-line :team='$team' :loop='$loop' status="bg-red-500 text-white rounded-full "/>
                            @else
                                <x-team.team-line :team='$team' :loop='$loop' status=""/>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center font-bold">No teams yet. Please check back later.</p>
                @endif
            </div>
        </div>
    </div>
</section>

