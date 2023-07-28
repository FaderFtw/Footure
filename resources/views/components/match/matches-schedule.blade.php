
<div class="bg-white flex-col rounded-3xl p-8">
    <div class="flex justify-center mb-10"> <span class="text-2xl text-center font-bold">Matches</span></div>
    <div class="bg-white p-4 rounded-3xl  sm:p-8 flex-col">
        @if($matches->count())

            @foreach($matches as $match)

                <x-match.match-line  :date='true' :match='$match' class="{{$loop->iteration == 1 ? 'mt-0' : 'pt-5 border-t-2'}}" />
            @endforeach

        @else
            <p class="text-center font-bold">No matches yet. Please check back later.</p>
        @endif
    </div>
</div>
