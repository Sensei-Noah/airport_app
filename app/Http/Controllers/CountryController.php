<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $country = Country::query();
        // if(request(country)){
        //     $country->where('country_name', 'Like', '%'. request('country') . '%' );
        // }

        // return $country->orderBy('id', 'DESC')->paginate(10);
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
            'country_name' => 'required',
            'country_ISO' => 'required',
        ]);

        Country::create([
            'country_name' =>request('country_name'),
            'country_ISO' =>request('country_ISO'),
        ]);
        return redirect('/');
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

        return redirect('/');
    }
}
