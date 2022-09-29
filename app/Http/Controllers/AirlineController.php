<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAirlineRequest;
use App\Http\Requests\UpdateAirlineRequest;
use App\Models\Airline;
use App\Models\Country;
use Illuminate\Support\Facades\Gate;

class AirlineController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airline = Airline::paginate('6');

        return view('pages.airline.show_airline', compact('airline'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::All();
        return view('pages.airline.add_airline' , compact('country'));
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
            'airline_name' => 'required|max:100',
            'country_name' => 'required',
            'country_ISO' => 'required',
            'country_id' => 'required',
        ]);


        if( Country::where('id', '=', request('country_id') )->exists() )
        {
            Airline::create([
                'airline_name' =>request('airline_name'),
                'country_name' =>request('country_name'),
                'country_ISO' =>request('country_ISO'),
                'country_id' =>request('country_id'),
            ]);

        } else{
            return view('pages.denies');
        }

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
        return view('pages.airline.show_single_airline', compact('airline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function edit(Airline $airline)
    {

        $country = Country::All();
        return view('pages.airline.edit_airline', compact('airline', 'country'));
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

        $airline->delete();

        return redirect('/show_airline');
    }
}
