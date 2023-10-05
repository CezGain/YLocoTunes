<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    public function getTrackInfo($trackId)
    {
        $clientId = config('spotify.spotify.client_id');
        $clientSecret = config('spotify.spotify.client_secret');

        // Get an access token
        $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ]);

        $token = $response->json()['access_token'];

        // Use the access token to make an authenticated request to the Spotify API
        $response = Http::withHeaders([
            'Authorization' => "Bearer $token",
        ])->get("https://api.spotify.com/v1/tracks/$trackId");

        return $response->json();
    }

    public function getAllArtists($trackId)
    {
        $clientId = config('spotify.spotify.client_id');
        $clientSecret = config('spotify.spotify.client_secret');

        // Get an access token
        $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ]);

        $token = $response->json()['access_token'];

        // Use the access token to make an authenticated request to the Spotify API
        $response = Http::withHeaders([
            'Authorization' => "Bearer $token",
        ])->get("https://api.spotify.com/v1/tracks/$trackId");

        return $response->json();
    }
}
