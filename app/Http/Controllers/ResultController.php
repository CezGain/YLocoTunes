<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class ResultController extends Controller
{
    public function loadSearch(Request $request)
    {
        // Récupérer la valeur de l'option sélectionnée
        $styleData = $request->input('styleData');
        // Rediriger l'utilisateur vers /artists avec le paramètre styleData
        return Redirect::to('/'.$_GET['type'].'?styleData='.$styleData);
    }
    public function showGrid()
    {
        $dataClass = new WikidataController;
        $cityWd = explode("/", $dataClass->getCityWd($_COOKIE['inputValue'])["results"]["bindings"][0]["city"]["value"])[4];
        $genresWd = $dataClass->getGenresWd(json_decode(urldecode($_GET['styleData']), true));

        $data = $dataClass->show($genresWd, $cityWd);
        $filtersTemplates = $favoriteArtists = $likedArtists = [];
        $data = $this->addNumberOfLikes($data);
        usort($data, function ($a, $b) {
            return $b['nbLikes'] - $a['nbLikes'];
        });
        if(Auth::check()) {
            $filtersTemplates = (new FilterTemplateController)->getAllFiltersTemplatesFromUserId(Auth::user()->getAuthIdentifier(),"artists");
            $favoriteArtists = (new FavoriteArtistsController)->getFavArtistsByUserId(Auth::user()->getAuthIdentifier());
            $likedArtists = (new ArtistsLikeController)->getLikedArtistsByUserId(Auth::user()->getAuthIdentifier());
        }
        return view('results', ['data' => $data,'filtersTemplates'=>$filtersTemplates,'favoriteArtists'=>$favoriteArtists,'likedArtists'=>$likedArtists]);
    }

    public function addNumberOfLikes(&$data) : array
    {
        $newData = [];
        foreach($data as $artist) {
            $nbLikes = (new ArtistsLikeController)->getAllLikesFromArtistName($artist['artistLabel']['value']);
            $artist['nbLikes'] = $nbLikes;
            array_push($newData, $artist);
        }
        return $newData;
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
