<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class WikidataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = <<<SPARQL
SELECT DISTINCT ?artist ?artistLabel ?spotifyID WHERE {
  ?artist wdt:P31 wd:Q5;
          wdt:P19 wd:Q90; # REMPLACER PAR LA VILLE
          wdt:P1902 ?spotifyID;
          wdt:P136 ?music_genre.

  {
    ?music_genre wdt:P31 wd:Q188451.
  } UNION {
    ?music_genre wdt:P279 wd:Q188451.
  }

  SERVICE wikibase:label { bd:serviceParam wikibase:language "[AUTO_LANGUAGE],en". }
}
ORDER BY ?artistLabel
LIMIT 100
SPARQL;

        $response = Http::withHeaders([
            'User-Agent' => 'LocalDev/1.0',
            'Accept' => 'application/sparql-results+json',
        ])->get('https://query.wikidata.org/sparql', [
            'query' => $query,
        ]);

        $data = $response->json();

        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show($genres, $city)
    {
        $genreQuery = "";
        $genreQuery2 = "";
        if (count($genres) > 0) {
            $genreQuery = $genreQuery . "VALUES ?genreValues { ";
            foreach ($genres as $genre) {
                $genreQuery = $genreQuery . "wd:" . $genre . " ";
            }
            $genreQuery = $genreQuery . "}";
            $genreQuery2 = "wdt:P136 ?genreValues";
        }


        $query = <<<SPARQL
        SELECT DISTINCT ?artist ?artistLabel ?spotifyID WHERE {
            $genreQuery

            ?artist wdt:P31 wd:Q5;
                    wdt:P19 wd:$city;
                    wdt:P1902 ?spotifyID;
                    $genreQuery2.

            SERVICE wikibase:label { bd:serviceParam wikibase:language "[AUTO_LANGUAGE],fr". }
          }
          ORDER BY ?artistLabel
          LIMIT 100
        SPARQL;

        $response = Http::withHeaders([
            'User-Agent' => 'LocalDev/1.0'
        ])->get('https://query.wikidata.org/sparql', [
            'format' => 'json',
            'query' => $query
        ]);
        if ($response->json() == null) {
            return [];
        }
        return $response->json()["results"]["bindings"];
    }

    public function getCityWd($city)
    {
        $query = <<<SPARQL
        SELECT ?city WHERE {
            ?city rdfs:label "$city"@fr.
          }
          LIMIT 1
        SPARQL;

        $response = Http::withHeaders([
            'User-Agent' => 'LocalDev/1.0'
        ])->get('https://query.wikidata.org/sparql', [
            'format' => 'json',
            'query' => $query
        ]);

        return $response->json();
    }

    public function getGenresWd($genres)
    {
        $genresWd = [];

        foreach ($genres as $genre) {
            if (strlen($genre) === 0) return $genresWd;
            $toLowerGenre = strtolower($genre);
            $query = <<<SPARQL
            SELECT ?genre WHERE {
                ?genre rdfs:label "$toLowerGenre"@fr.
                ?genre wdt:P31 wd:Q188451.
              }
            LIMIT 1
            SPARQL;

            $response = Http::withHeaders([
                'User-Agent' => 'LocalDev/1.0'
            ])->get('https://query.wikidata.org/sparql', [
                'format' => 'json',
                'query' => $query
            ]);
            if ($response->json()["results"]["bindings"] != null) {
                array_push($genresWd, explode("/", $response->json()["results"]["bindings"][0]["genre"]["value"])[4]);
            }
        }

        return $genresWd;
    }
}
