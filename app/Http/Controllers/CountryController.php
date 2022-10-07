<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Country;

class CountryController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except'=>['index', 'show', 'countryNoAirportNoAirport', 'countryNoAirport']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function countryNoAirport(){

        $country = Country::paginate('6');

        return view('pages.country.show_countryNoAirline', compact('country'));
    }

    public function countryNoAirportNoAirport(){

        $country = Country::paginate('6');

        return view('pages.country.show_countryNoAirlineNoAirport', compact('country'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.country.add_country');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryRequest $request)
    {
        $validate = $request->validate([
            'country_name' => 'required|unique:countries|max:100',
            'country_ISO' => 'required|unique:countries|min:3|max:3',
        ]);

        Country::create([
            'country_name' =>request('country_name'),
            'country_ISO' =>request('country_ISO'),
        ]);
        return redirect('/show_country');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        $country = Country::paginate('6');

        return view('pages.country.show_country', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        // if(Gate::denies('edit_country', $country)){
        //     return view('pages.denies');
        // }
        return view('pages.country.edit_country', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        Country::where('id', $country->id)->update($request->only(['country_name', 'country_ISO']));
        return redirect('/show_country');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        // if(Gate::denies('delete_country', $country)){
        //     return view('pages.denies');
        // }
        $country->delete();

        return redirect('/show_country');
    }
}
