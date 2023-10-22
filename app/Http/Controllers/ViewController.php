<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ViewController extends Controller
{
    private $genres = [
        'artists' => ["opéra", "comédie musicale", "punk rock", "chanson hebraique", "conjunto norteño", "rap", "jazz", "musique baroque", "musique classique", "symphonie", "concerto", "blues", "flamenco", "musique électronique", "reggae", "punk hardcore", "emo", "Screamo", "grunge", "rock alternatif", "rock", "hip-hop", "samba", "bagad", "ancient music", "batucada", "metal alternatif", "dubstep", "house", "brostep", "moombahton", "huju", "Musique uruguayenne", "rock allemand", "tango argentin", "Chant grégorien", "Protopunk", "opéra taiwanais", "pop", "jazz-funk", "heavy metal", "bachata", "cavatine", "post-metal", "musique indépendante", "folk", "	rhythm and blues", "pop baroque"],
        'events'=>["Alternative", "Ballads/Romantic", "Blues", "Chanson Francaise", "Children's Music", "Classical", "Country", "Dance/Electronic", "Folk", "Hip-Hop/Rap", "Holiday", "Jazz", "Latin", "Medieval/Renaissance", "Metal", "New Age", "Other", "Pop", "R&B", "Reggae", "Religious", "Rock", "Undefined", "World"],
    ];
    private $redirectLink = [
        'artists' => "/artists",
        'events' => "/events"
    ];

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
            'musicStyle' => $this->genres[$_GET['type']],
            "colors" => ["rgba(238, 130, 130, 1)", "rgba(130, 186, 238, 1)", "rgba(130, 238, 141, 1)", "rgba(210, 238, 130, 1)", "rgba(238, 130, 163, 1)", "rgba(130, 238, 225, 1)", "rgba(130, 135, 238, 1)", "rgba(238, 208, 130, 1)", "rgba(238, 189, 130, 1)"],
            "link" => $this->redirectLink[$_GET['type']],
            "type"=>$_GET['type']
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
        $eventsData = (new DiscoveryAppController)->index($_COOKIE['inputValue'],selectedGenres: json_decode(urldecode($_GET['styleData']), true));
        return view('events', $eventsData);
    }
}
