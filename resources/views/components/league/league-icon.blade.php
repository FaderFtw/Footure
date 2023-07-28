<div {{$attributes->merge(['class' => 'flex items-center'])}}>

<a href="/leagues/{{$league->slug}}" class="sm:flex sm:items-center p-2 rounded-lg hover:bg-gray-200">
    <img width="{{$width}}" height="{{$height}}" src="{{asset($league->logo)}}" class="mb-1" alt="League image">
    <div class="sm:pl-3">
        <div class="text-base font-semibold">{{$league->name}}</div>
    </div>
</a>

</div>

