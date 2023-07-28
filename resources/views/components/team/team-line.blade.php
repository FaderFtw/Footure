<tr>
    <td class="p-2 text-center "><span class="{{$status}} w-8 h-8 inline-block p-1" >{{$loop->iteration}}</span>
    </td>
    <td class="p-2 text-left">
        <x-team.team-icon :width="50" :height="50" :team="$team"/>
    </td>
    <td class="p-2 text-center">{{$team->nbW+$team->nbD+$team->nbL}}</td>
    <td class="p-2 text-center">{{$team->nbW}}</td>
    <td class="p-2 text-center">{{$team->nbD}}</td>
    <td class="p-2 text-center">{{$team->nbL}}</td>
    <td class="p-2 text-center">{{$team->goals_scored}}</td>
    <td class="p-2 text-center">{{$team->goals_conceded}}</td>
    <td class="p-2 text-center">
        @if($team->goals_scored - $team->goals_conceded >= 0)
                +{{$team->goals_scored - $team->goals_conceded}}
        @else
                -{{$team->goals_scored - $team->goals_conceded}}
        @endif
    </td>
    <td class="p-2 text-center">{{$team->league_points}}</td>
</tr>
