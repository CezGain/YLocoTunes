<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MusicBrainzController extends Controller
{
    public function getAreaIdByRegionName($regionName)
    {
        // Encode the region name to be URL-friendly
        $encodedRegionName = urlencode($regionName);
        // Modify the query parameters to search for the area by name
        $response = Http::get("https://musicbrainz.org/ws/2/area/", [
            'query' => $encodedRegionName,
            'fmt' => 'json',
        ]);
        // Check if the response is successful
        if ($response->successful()) {
            $areas = $response->json()['areas'];
            // Check if there are any results
            if (!empty($areas)) {
                // Extract the areaId from the first result (you can modify this if there are multiple results)
                $areaId = $this->getGoodAreaId($regionName, $areas);
                return $areaId;
            } else {
                // Handle the case where no matching area was found for the region name
                return null;
            }
        } else {
            // Handle error response here
            return null;
        }
    }

    public function getArtistsByRegion($region)
    {
        $apiKey = config('musicbrainz.oauth_key');

        $areaId = $this->getAreaIdByRegionName($region);

        if ($areaId === null) {
            // Handle the case where no matching area was found for the region name
            return response()->json(['error' => 'Region not found'], 404);
        }
        // Modify the query parameters to match the correct format
        $response = Http::get("https://musicbrainz.org/ws/2/artist/", [
            'area' => "$areaId",
            'fmt' => 'json',
        ]);

        // Check if the response is successful
        if ($response->successful()) {
            $artists = $response->json()['artists'];
            return $artists;
            // Process and return the artists
        } else {
            // Handle error response here
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
