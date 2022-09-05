<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAirportConRequest;
use App\Http\Requests\UpdateAirportConRequest;
use App\Models\AirportCon;

class AirportConController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAirportConRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAirportConRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AirportCon  $airportCon
     * @return \Illuminate\Http\Response
     */
    public function show(AirportCon $airportCon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AirportCon  $airportCon
     * @return \Illuminate\Http\Response
     */
    public function edit(AirportCon $airportCon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAirportConRequest  $request
     * @param  \App\Models\AirportCon  $airportCon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAirportConRequest $request, AirportCon $airportCon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AirportCon  $airportCon
     * @return \Illuminate\Http\Response
     */
    public function destroy(AirportCon $airportCon)
    {
        //
    }
}
