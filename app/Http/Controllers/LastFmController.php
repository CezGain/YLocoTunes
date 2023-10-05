<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LastFmController extends Controller
{
    public function getArtistsByLocation($location)
    {
        $apiKey = config('lastfmapp.api_key');

        $response = Http::get("http://ws.audioscrobbler.com/2.0/", [
            'method' => 'geo.gettopartists',
            'country' => $location,
            'api_key' => $apiKey,
            'format' => 'json',
        ]);

        $artists = $response->json()['topartists']['artist'];

        return $artists;
    }
}
