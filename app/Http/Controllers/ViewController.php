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
            'musicStyle' => ["Rock", "Electro", "Pop", "Jazz", "Hip-Hop", "Japan", "Electropop", "Techno", "Ambient", "Classique", "Punk", "Metal", "Pop Rock", "Folk", "Country", "House", "Hard-Rock", "Soul", "RnB", "Reggae", "Blues", "Disco", "Indie", "Soundtrack", "Heavy Metal", "Experimental", "Pop/Rock", "Alternative", "Rap", "Score", "Hardcore", "Lo-Fi", "Pop Punk", "Country Rock", "Punk Rock", "Drum and Bass", "Jazz Fusion", "Horror Punk", "Christmas", "Goth Rock", "Acoustic", "Electro-Acoustique" ],
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
}
