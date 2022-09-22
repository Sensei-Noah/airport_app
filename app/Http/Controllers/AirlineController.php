<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAirlineRequest;
use App\Http\Requests\UpdateAirlineRequest;
use App\Models\Airline;
use Illuminate\Support\Facades\Gate;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.airline.add_airline');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAirlineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAirlineRequest $request)
    {
        $validate = $request->validate([
            'airline_name' => 'required',
            'country_name' => 'required',
            'country_ISO' => 'required',
        ]);

        Airline::create([
            'airline_name' =>request('airline_name'),
            'country_name' =>request('country_name'),
            'country_ISO' =>request('country_ISO'),
        ]);
        return redirect('/show_airline');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function show(Airline $airline)
    {
        $airline = Airline::paginate('6');

        return view('pages.airline.show_airline', compact('airline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function edit(Airline $airline)
    {
        // if(Gate::denies('edit_airline', $airline)){
        //     return view('pages.denies');
        // }
        return view('pages.airline.edit_airline', compact('airline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAirlineRequest  $request
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAirlineRequest $request, Airline $airline)
    {
        Airline::where('id', $airline->id)->update($request->only(['airline_name', 'country_name', 'country_ISO']));
        return redirect('/show_airline');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airline $airline)
    {
        // if(Gate::denies('delete_airline', $airline)){
        //     return view('pages.denies');
        // }
        $airline->delete();

        return redirect('/show_airline');
    }
}
