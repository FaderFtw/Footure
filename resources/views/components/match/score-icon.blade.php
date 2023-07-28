<div class="flex justify-center self-center">
    @if($score)
        <p class="font-bold">{{$score->homeTeamScore}} </p>
        <strong class="mx-2">-</strong>
        <p class="font-bold">{{$score->awayTeamScore}}</p>
    @else
        <strong class="sm:mx-2">-</strong>
    @endif
</div>
