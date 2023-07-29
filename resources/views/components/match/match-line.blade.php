
@props(['match','date'])
<div {{$attributes->merge(['class' => 'lg:grid lg:grid-cols-6 mb-5 space-x-2'])}}>

    <div class="sm:border-r-2 sm:border-gray-300 text-gray-400">
        @if(!$date)
            <a href="/leagues/{{$match->league->slug}}">
                <div class="flex justify-around  self-center mb-2">
                    <img src="{{asset($match->league->logo)}}" width="40" height="40"  alt="League Logo" title="{{$match->league->name}}">
                </div>
            </a>
        @else
            <div class="flex justify-center ">
                @if(date('Y/m/d', strtotime($match->date)) === date('Y/m/d'))
                    <p class="text-sm font-bold self-center">Today</p>
                @else
                    <time class="font-bold self-center">{{date('Y/m/d', strtotime($match->date))}}</time>
                @endif
            </div>
        @endif


        <div class="flex justify-around  self-center font-bold">
            <time class="border-gray-400 ">{{ date('H:i', strtotime($match->date)) }}</time>
        </div>
    </div>



    <x-team.team-icon :width="50" :height="50" :team="$match->homeTeam" class="justify-center col-span-2"/>

    <x-match.score-icon :score="$match->score" class="justify-center"/>

    <x-team.team-icon :width="50" :height="50" :team="$match->awayTeam" class="justify-center col-span-2"/>

</div>
