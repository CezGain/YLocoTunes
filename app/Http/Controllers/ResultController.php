<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function showGrid()
    {
        $data = [
            ['id' => 1, 'name' => 'Artiste 1', 'description' => 'Musique 1'],
            ['id' => 2, 'name' => 'Artiste 2', 'description' => 'Musique 2'],
            ['id' => 3, 'name' => 'Artiste 3', 'description' => 'Musique 3'],
            
        ];

        return view('results', compact('data'));
    }
}
