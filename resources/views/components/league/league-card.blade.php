<article {{$attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-gray-300 hover:border-opacity-5 rounded-xl'])}}>
    <div class="py-6 px-5 lg:flex">
        <div class="flex flex-1 justify-center">
            <img src="{{asset($league->logo)}}" width="300" height="300" alt="League Logo" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between" >
            <header class="mt-8 lg:mt-0 ">
                <x-country-icon :country="$league->country" :width='50' :height='50' />


                <div class="mt-4">
                    <a href="/leagues/{{$league->slug}}" >
                        <h1 class="text-3xl font-bold">
                            {{$league->name}}
                        </h1>
                    </a>

                    <span class="mt-2 block text-gray-400 text-xs">
                                        Founded at  <time>{{$league->founded_at}}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {{$league->desc}}
                </p>
            </div>


            <footer class="flex justify-between items-center mt-4">
                <div class="flex-col">
                    <div class="mb-2 font-extrabold" style="font-family: sans-serif">Founder </div>
                    <div class="flex items-center text-sm">
                        <img src="/images/FounderImage.png" width="50" alt="Founder Image">
                        <div class="ml-3">
                            <h5 class="font-bold" >{{$league->founder}}</h5>
                        </div>
                    </div>
                </div>


                <div class="lg:block">
                    <a href="/leagues/{{$league->slug}}"
                       class="transition-colors duration-300 text-white text-xs font-semibold bg-blue-500 hover:bg-gray-300 rounded-full py-2 px-8">
                        See More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>



