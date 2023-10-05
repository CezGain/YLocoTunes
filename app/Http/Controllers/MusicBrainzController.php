<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MusicBrainzController extends Controller
{
    public function getAreaIdByRegionName($regionName)
    {
        $encodedRegionName = urlencode($regionName);
        $response = Http::get("https://musicbrainz.org/ws/2/area/", [
            'query' => $encodedRegionName,
            'fmt' => 'json',
        ]);
        if ($response->successful()) {
            $areas = $response->json()['areas'];
            if (!empty($areas)) {
                $areaId = $this->getGoodAreaId($regionName, $areas);
                return $areaId;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function getArtistsByRegion($region)
    {
        $areaId = $this->getAreaIdByRegionName($region);
        if ($areaId === null) {
            return response()->json(['error' => 'Region not found'], 404);
        }
        $response = Http::get("https://musicbrainz.org/ws/2/artist/", [
            'area' => $areaId,
            'fmt' => 'json',
        ]);
        if ($response->successful()) {
            $artists = $response->json()['artists'];
            return $artists;
        } else {
            return response()->json(['error' => 'MusicBrainz API Error'], $response->status());
        }
    }

    public function getReleasesByArtist($artistName)
    {
        $response = Http::get("https://musicbrainz.org/ws/2/release/", [
            'query' => $artistName,
            'fmt' => 'json',
        ]);
        if ($response->successful()) {
            $releases = $response->json()['releases'];
            return $releases;
        } else {
            return response()->json(['error' => 'MusicBrainz API Error'], $response->status());
        }
    }

    private function getGoodAreaId($regionName, mixed $areas)
    {
        foreach ($areas as $area) {
            if ($area['name'] === $regionName) {
                return $area['id'];
            }
        }
    }
}
