@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-700">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" alt="image" class="w-64 md:w-96" style="width:24rem">
            <div class="ml-2 md:ml-24 lg:ml-24">
                <h2 class="text-4xl font-semibold">
                    {{ $movie['original_title'] }}
                </h2>
                <div class="flex items-center text-gray-400">
                    <svg class="w-5 fill-current text-orange-500" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"><path d="M18.8 8.022h-6.413L10 1.3 7.611
                    8.022H1.199l5.232 3.947-1.871 6.929L10 14.744l5.438 4.154-1.869-6.929L18.8
                    8.022zM10 12.783l-3.014 2.5 1.243-3.562-2.851-2.3 3.522.101 1.1-4.04 1.099 4.04
                    3.521-.101-2.851 2.3 1.243 3.562-3.012-2.5z"/></svg>
                    <span class="ml-1">{{ $movie['vote_average'] * 10 ."%" }}</span>
                    <span class="ml-2 mr-2">|</span>
                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                    <span class="ml-2 mr-2">|</span>
                    <span>
                            @foreach ($movie['genres'] as $genre)
                                {{ $genre['name'] }}@if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>
                <div class="mt-12">
                    <h4 class="font-semibold">
                        Featured Casts
                    </h4>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                            @if ($loop->index < 4)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                </div>
                            @endif

                        @endforeach


                    </div>
                </div>
                <div x-data="{isOpen: false}">
                    @if (count($movie['videos']['results']) >0)
                        <div class="mt-12">
                            <button
                                @click="isOpen = true"
                                class="flex inline-flex  items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#000"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-play-circle"><circle cx="12" cy="12" r="10"/><path d="m10 8 6 4-6 4V8z"/></svg>
                                Play Trailer
                            </button>
                        </div>
                    @endif
                    <div
                        style="background-color: rgba(0,0,0,0.3)"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        x-show="isOpen" x-transition
                        >

                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-800 rounded">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button
                                        @click="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                        class="text-3xl leading-none hover:text-gray-300">
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div  class="responsive-container overflow-hidden relative">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                            <iframe src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                            style="border:0" allow="autoplay; encrypted-media" allowfullscreen
                                            ></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- end of movie info  --}}

    <div class="movie-cast border-b border-gray-700 ">
        <div class="container mx-auto px-4 py-">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="container mx-auto px-4 py-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 items-center">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if ($loop->index < 8)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$cast['profile_path'] }}" alt="cast" width="300px" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                                <div class="flex items-center text-gray-400">
                                    <span>{{ $cast['character'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>



@endsection
