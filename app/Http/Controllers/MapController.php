<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MapController extends Controller
{
    private $api_key;
    public function __construct() {
        $this->api_key = config('services.discoveryapp.key');
    }
    public function getAllEvents()
    {
        $api_key = $this->api_key;
        $page = 0;
        $allEvents = [];

        do {
            $url = "https://app.ticketmaster.com/discovery/v2/events.json?locale=*&segmentName=Music&apikey={$api_key}&page={$page}";

            $response = Http::get($url);
            $data = $response->json();
            // Parcourir les événements sur la page actuelle
            foreach ($data['_embedded']['events'] as $event) {
                $venue = $event['_embedded']['venues'][0];
                $longitude = $venue['location']['longitude'];
                $latitude = $venue['location']['latitude'];
                $position = ['lon' => $longitude, 'lat' => $latitude];

                // Si la position existe dans le tableau $allEvents, augmentez le compteur
                $found = false;
                foreach ($allEvents as &$eventData) {
                    if ($eventData['lon'] == $longitude && $eventData['lat'] == $latitude) {
                        $eventData['count']++;
                        $found = true;
                        break;
                    }
                }

                // Sinon, ajoutez la nouvelle position au tableau
                if (!$found) {
                    $allEvents[] = $position + ['count' => 1];
                }
            }

            $page++;
        } while ($data['_links']['next'] && $page < 50); // Changez le nombre de pages souhaité ici

        return $allEvents;
    }

    public function show()
    {
        $test = $this->getAllEvents();
        dump($test);
        return view('map',['data'=>$test]);
    }
}
