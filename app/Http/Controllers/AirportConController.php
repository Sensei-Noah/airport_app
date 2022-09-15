<?php

namespace App\Http\Controllers;

use App\Models\AirportCon;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreAirportConRequest;
use App\Http\Requests\UpdateAirportConRequest;

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
        return view('pages.airport.add_airport');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAirportConRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAirportConRequest $request)
    {
        $validate = $request->validate([
            'airport_name' => 'required',
            'country_name' => 'required',
            'country_ISO' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',


        ]);

        AirportCon::create([
            'airport_name' =>request('airport_name'),
            'country_name' =>request('country_name'),
            'country_ISO' =>request('country_ISO'),
            'latitude' =>request('latitude'),
            'longitude' =>request('longitude'),

        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AirportCon  $airportCon
     * @return \Illuminate\Http\Response
     */
    public function show(AirportCon $airportCon)
    {
        $airportCon = AirportCon::paginate('6');

        return view('pages.airport.show_airport', compact('airportCon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AirportCon  $airportCon
     * @return \Illuminate\Http\Response
     */
    public function edit(AirportCon $airportCon)
    {
        // if(Gate::denies('edit_airport', $airportCon)){
        //     return view('pages.denies');
        // }
        return view('pages.airport.edit_airport', compact('airportCon'));
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
        AirportCon::where('id', $airportCon->id)->update($request->only(['airport_name', 'country_name', 'country_ISO', 'latitude', 'longitude']));
        return redirect('/show_airport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AirportCon  $airportCon
     * @return \Illuminate\Http\Response
     */
    public function destroy(AirportCon $airportCon)
    {
        // if(Gate::denies('delete_airport', $airportCon)){
        //     return view('pages.denies');
        // }
        $airportCon->delete();

        return redirect('/');
    }
}
