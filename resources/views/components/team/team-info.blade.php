<div class="bg-white flex-col rounded-3xl p-8">
    <div class="flex justify-center mb-10"> <span class="text-2xl text-center font-bold">Team Info</span></div>
    <div class="grid grid-cols-2 ">
        <div class="flex justify-around p-8 border-t-2 border-r-2 border-gray-300">

            <div class="flex-col items-center self-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="75" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                <div class="flex justify-center my-2"><span class="text-md-center font-bold"><p>{{$team->players->count()}}</p></span></div>
                <div><span class="text-md-center text-gray-400"><p>Total players</p></span></div>
            </div>
            <div class="flex-col items-center self-center">
                <div class="flex justify-center"> <svg xmlns="http://www.w3.org/2000/svg" height="75" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M280 64h40c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64h40 9.6C121 27.5 153.3 0 192 0s71 27.5 78.4 64H280zM64 112c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320c8.8 0 16-7.2 16-16V128c0-8.8-7.2-16-16-16H304v24c0 13.3-10.7 24-24 24H192 104c-13.3 0-24-10.7-24-24V112H64zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg></div>
                <div class="flex justify-center my-2"><span class="text-md-center font-bold"><p>{{$team->averageAge()}}</p></span></div>
                <div><span class="text-md-center text-gray-400"><p>Average player age</p></span></div>
            </div>

        </div>
        <div class="border-t-2 border-gray-300">
            <div class="flex-col p-4"> <strong>Info</strong>
                <div class="flex justify-between"><p>Coach</p><p>{{$team->coach}}</p></div>
                <div class="mt-1 flex justify-between"><p>Foundation date</p><p><time>{{$team->founded_at}}</time></p></div>
                <div class="mt-1 flex justify-between"><p>Country</p><x-country-icon :width="30" :height="30" :country="$team->league->country"/></div>
            </div>
            <div class="flex-col p-4"> <strong>Venue</strong>
                <div class="flex justify-between"><p>Stadium</p><p>{{$team->stadium}}</p></div>
                <div class="flex justify-between"><p>Capacity</p><p>{{$team->capacity}}</p></div>
                <div class="flex justify-between"><p>City</p><p></p>{{$team->city}}</div>
            </div>
        </div>
    </div>
</div>
