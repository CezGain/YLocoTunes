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
            'musicStyle' => ["Pop", "Hard-rock"],
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
