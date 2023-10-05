<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MusicBrainzController;
use Illuminate\Http\Request;
class ResultController extends Controller
{
    public function showGrid()
    {
        $data = (new MusicBrainzController)->getArtistsByRegion($_COOKIE['inputValue']);
        $musics = [];
        foreach ($data as $artist) {
            if ($artist != null) {
                $name = $artist['name'];
                $releasesByArtist = (new MusicBrainzController)->getReleasesByArtist($name);
                if (is_array($releasesByArtist)) {
                    $firstThreeReleases = array_slice($releasesByArtist, 0, 3);
                    $musics[] = $firstThreeReleases;
                }
            }
        }

        dump($musics);
        return view('results', compact('data', 'musics'));
    }
}
