<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function showGrid()
    {
        $data = [
            ['id' => 1, 'name' => 'Item 1', 'description' => 'Description 1'],
            ['id' => 2, 'name' => 'Item 2', 'description' => 'Description 2'],
            ['id' => 3, 'name' => 'Item 3', 'description' => 'Description 3'],
        ];

        return view('results', compact('data'));
    }
}
