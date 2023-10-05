<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function showGrid()
    {
        $data = [
            ['id' => 1, 'name' => 'Artiste 1', 'musique' => 'Musique 1'],
            ['id' => 2, 'name' => 'Artiste 2', 'musique' => 'Musique 2'],
            ['id' => 3, 'name' => 'Artiste 3', 'musique' => 'Musique 3'],
            ['id' => 1, 'name' => 'Artiste 1', 'musique' => 'Musique 1'],
            ['id' => 2, 'name' => 'Artiste 2', 'musique' => 'Musique 2'],
            ['id' => 3, 'name' => 'Artiste 3', 'musique' => 'Musique 3'],
            ['id' => 1, 'name' => 'Artiste 1', 'musique' => 'Musique 1'],
            ['id' => 2, 'name' => 'Artiste 2', 'musique' => 'Musique 2'],
            ['id' => 3, 'name' => 'Artiste 3', 'musique' => 'Musique 3'],
            ['id' => 1, 'name' => 'Artiste 1', 'musique' => 'Musique 1'],
            ['id' => 2, 'name' => 'Artiste 2', 'musique' => 'Musique 2'],
            ['id' => 3, 'name' => 'Artiste 3', 'musique' => 'Musique 3'],
        ];
        return view('results', compact('data'));
    }
}
