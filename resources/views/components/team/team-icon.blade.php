<div {{$attributes->merge(['class' => 'flex items-center'])}}>
    <a href="/teams/{{$team->slug}}" class="sm:flex  items-center rounded-lg hover:bg-gray-200 p-2 mr-2">
        <div class="self-center flex justify-center">
            <img src="{{asset($team->logo)}}" width="{{$width}}" height="{{$height}}" class="mb-1"  alt="League Logo">
        </div>

        <p class="sm:text-md-center flex justify-center text-xs font-bold">
            {{$team->name}}
        </p>
    </a>
</div>
