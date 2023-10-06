<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ViewController extends Controller
{
    public function welcome(): View
    {
        return view('welcome');
    }
    public function dashboard(): View
    {
        return view('dashboard');
    }

    public function filters(): View
    {

        return view('filters', [
            'musicStyle' => [
                "acoustic",
                "afrobeat",
                "alt-rock",
                "alternative",
                "ambient",
                "anime",
                "black-metal",
                "bluegrass",
                "blues",
                "bossanova",
                "brazil",
                "breakbeat",
                "british",
                "cantopop",
                "chicago-house",
                "children",
                "chill",
                "classical",
                "club",
                "comedy",
                "country",
                "dance",
                "dancehall",
                "death-metal",
                "deep-house",
                "detroit-techno",
                "disco",
                "disney",
                "drum-and-bass",
                "dub",
                "dubstep",
                "edm",
                "electro",
                "electronic",
                "emo",
                "folk",
                "forro",
                "french",
                "funk",
                "garage",
                "german",
                "gospel",
                "goth",
                "grindcore",
                "groove",
                "grunge",
                "guitar",
                "happy",
                "hard-rock",
                "hardcore",
                "hardstyle",
                "heavy-metal",
                "hip-hop",
                "holidays",
                "honky-tonk",
                "house",
                "idm",
                "indian",
                "indie",
                "indie-pop",
                "industrial",
                "iranian",
                "j-dance",
                "j-idol",
                "j-pop",
                "j-rock",
                "jazz",
                "k-pop",
                "kids",
                "latin",
                "latino",
                "malay",
                "mandopop",
                "metal",
                "metal-misc",
                "metalcore",
                "minimal-techno",
                "movies",
                "mpb",
                "new-age",
                "new-release",
                "opera",
                "pagode",
                "party",
                "philippines-opm",
                "piano",
                "pop",
                "pop-film",
                "post-dubstep",
                "power-pop",
                "progressive-house",
                "psych-rock",
                "punk",
                "punk-rock",
                "r-n-b",
                "rainy-day",
                "reggae",
                "reggaeton",
                "road-trip",
                "rock",
                "rock-n-roll",
                "rockabilly",
                "romance",
                "sad",
                "salsa",
                "samba",
                "sertanejo",
                "show-tunes",
                "singer-songwriter",
                "ska",
                "sleep",
                "songwriter",
                "soul",
                "soundtracks",
                "spanish",
                "study",
                "summer",
                "swedish",
                "synth-pop",
                "tango",
                "techno",
                "trance",
                "trip-hop",
                "turkish",
                "work-out",
                "world-music"
              ],
            "colors" => ["rgba(238, 130, 130, 1)", "rgba(130, 186, 238, 1)", "rgba(130, 238, 141, 1)", "rgba(210, 238, 130, 1)", "rgba(238, 130, 163, 1)", "rgba(130, 238, 225, 1)", "rgba(130, 135, 238, 1)", "rgba(238, 208, 130, 1)", "rgba(238, 189, 130, 1)"],
        ]);
    }

    public function register(): View
    {
        return view('register');
    }

    public function login(): View
    {
        return view('login');
    }

    public function events(): View
    {
        $eventsData = (new DiscoveryAppController)->index($_COOKIE['inputValue']);
        return view('events', $eventsData);
    }
}
