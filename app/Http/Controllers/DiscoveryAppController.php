<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DiscoveryAppController extends Controller
{
    private $api_key;

    public function __construct()
    {
        $this->api_key = config('services.discoveryapp.key');
    }
    /**
     * Display a listing of the resource.
     */
    public function index($city, $page = 0, $genre = "")
    {
        $url = 'https://app.ticketmaster.com/discovery/v2/events.json?city=' . $city . '&locale=*' . '&page=' . $page . '&radius=50&genreName=' . $genre . '&unit=km&segmentName=Music&apikey=' . $this->api_key;

        try {
            $response = Http::asForm()->get($url);
            $data = $response->json();
            if (isset($data['page']['totalElements']) && $data['page']['totalElements'] > 0) {
                $eventsData = $data['_embedded']['events'];
                usort($eventsData, function($a,$b){
                    return strtotime($a['dates']['start']['dateTime']) - strtotime($b['dates']['start']['dateTime']);
                });
                return ['eventsData' => $eventsData];
            } else {
                return ['eventsData' => []];
            }
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
