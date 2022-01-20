<?php

namespace App\Http\Controllers;

use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){

        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];

        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });

        $nowPlayingMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];

        //Dump($nowPlayingMovies);

        return view('movies.index', [
            'popularMovies' => $popularMovies,
            'genres' => $genres,
            'nowPlayingMovies' => $nowPlayingMovies
        ]);
    }

    public function show($id){

        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos')
            ->json();

        $genresArray = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });

        //dump($movie);

        return view ('movies.show', [
            'movie' => $movie,
            'genres' => $genres
        ]);
    }
}
