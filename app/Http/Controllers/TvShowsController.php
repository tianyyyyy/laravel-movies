<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvShowsController extends Controller
{
    public function index(){

        $Tvseries = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/airing_today')
            ->json()['results'];

        dump($Tvseries);

        return view('tv.index');
    }
}
