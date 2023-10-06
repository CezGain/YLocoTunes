<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    private $clientId;
    private $clientSecret;
    
    public function __construct()
    {
        $this->clientId = config('services.spotify.client_id');
        $this->clientSecret = config('services.spotify.client_secret');
    }

    public function getTrackInfo($trackId)
    {
        // Get an access token
        $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ]);

        $token = $response->json()['access_token'];

        // Use the access token to make an authenticated request to the Spotify API
        $response = Http::withHeaders([
            'Authorization' => "Bearer $token",
        ])->get("https://api.spotify.com/v1/tracks/$trackId");

        return $response->json();
    }

    public function getTrackByArtistName($artistName)
    {
        // Get an access token
        $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ]);
        $token = $response->json()['access_token'];


        // Use the access token to make an authenticated request to the Spotify API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token, // Correctly include the access token here
        ])->get('https://api.spotify.com/v1/search', [
            'q' => 'artist:' . $artistName,
            'type' => 'track',
        ]);

        return $response->json();

    }
}
