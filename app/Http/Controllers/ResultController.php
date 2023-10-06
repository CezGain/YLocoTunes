<?php

namespace App\Http\Controllers;

class ResultController extends Controller
{

    public function showGrid()
    {
        $dataClass = new WikidataController;
        $cityWd = explode("/", $dataClass->getCityWd($_COOKIE['inputValue'])["results"]["bindings"][0]["city"]["value"])[4];
        $genresWd = $dataClass->getGenresWd(json_decode(urldecode($_GET['styleData']), true));

        $data = $dataClass->show($genresWd, $cityWd);

        return view('results', ['data' => $data]);
    }

    public function sortByReleasesTags($data, $releases, $filters)
    {
        $artists = [];
        foreach ($data as $index => $artist) {
            foreach ($releases[$index] as $release) {
                dump($release);
                foreach ($release['tags'] as $tag) {
                    if (in_array($tag['name'], $filters)) {
                        array_push($artists, $artist);
                        break;
                    }
                }
            }
        }
        return $artists;
    }
}
