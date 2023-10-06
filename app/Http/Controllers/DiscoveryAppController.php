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
        $response = Http::asForm()->get('https://app.ticketmaster.com/discovery/v2/events.json?city=' . $city . '&page=' . $page . 'radius=50&genreName=' . $genre . '&unit=km&segmentName=Music&apikey=' . $this->api_key, []);

        return ['events' => $response["_embedded"]->events];
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
