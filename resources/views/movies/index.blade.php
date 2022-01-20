@extends('layouts.main')

@section('content')

<div class="container mx-auto px-4 pt-16">
    <div class="popular-movies">
        <h2 class="uppercase tracking-wider text-orange-500 mx-auto text-lg font-semibold">Popular Movies</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 items-center">
            @foreach ($popularMovies as $movie)
                <x-movie-card :movie="$movie" :genres="$genres"/>
            @endforeach
        </div>
    </div>
    <div class="container mx-auto px-4 pt-16">
        <div class="now-playing-movies">
            <h2 class="uppercase tracking-wider text-orange-500 mx-auto text-lg font-semibold">Now Playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 items-center">
                @foreach ($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres"/>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
