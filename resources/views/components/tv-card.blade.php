<div class="mt-8">
    <a href="#">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$series['poster_path'] }}" alt="poster" width="300px" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $series['name'] }}</a>
        <div class="flex items-center text-gray-400">
            <svg class="w-5 fill-current text-orange-500" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"><path d="M18.8 8.022h-6.413L10 1.3 7.611
            8.022H1.199l5.232 3.947-1.871 6.929L10 14.744l5.438 4.154-1.869-6.929L18.8
            8.022zM10 12.783l-3.014 2.5 1.243-3.562-2.851-2.3 3.522.101 1.1-4.04 1.099 4.04
            3.521-.101-2.851 2.3 1.243 3.562-3.012-2.5z"/></svg>
            <span class="ml-1">{{ $series['vote_average'] * 10 ."%" }}</span>
            <span class="ml-2 mr-2">|</span>
            <span>{{ \Carbon\Carbon::parse($series['first_air_date'])->format('M d, Y') }}</span>
        </div>
        <div class="text-gray-400 text-sm mt-1">
            @foreach ($series['genre_ids'] as $genre)
                {{ $genres->get($genre) }}@if (!$loop->last)
                    ,
                @endif
                @if (!$series['genre_ids'])
                    no genre
                @endif
            @endforeach
        </div>
    </div>
</div>

