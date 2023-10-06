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
        $filters = $_GET['styleData'] ?? '';

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
        $artists = $this->sortByReleasesTags($data,$musics,$filters);
        dump($musics);
        return view('results', compact('artists', 'musics'));
    }

    public function sortByReleasesTags($data,$releases,$filters) {
        $artists = [];
        foreach($data as $index => $artist) {
            foreach ($releases[$index] as $release) {
                dump($release);
                foreach ($release['tags'] as $tag) {
                    if (in_array($tag['name'],$filters)) {
                        array_push($artists,$artist);
                        break;
                    }
                }
            }
        }
        return $artists;
    }
}
