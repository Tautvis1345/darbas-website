<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Countries;

class CountriesController extends Controller
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
        return view('Countries.Countries', );

    }

    public function Countries_without_airlines(){

        $country = Countries::paginate('6');

        return view('Countries.Countries_without_airlines', compact('country'));
    }

    public function Countries_without_airlines_and_airports(){

        $country = Countries::paginate('6');

        return view('Countries.Countries_without_airlines_and_airports', compact('country'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Countries.New_Country');
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
            'country_name' => 'required|unique:countries|min:4|max:55',
            'country_ISO' => 'required|unique:countries|min:3|max:3',
        ]);

        Countries::create([
            'country_name' =>request('country_name'),
            'country_ISO' =>request('country_ISO'),
        ]);
        return redirect('/show_country');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Countries  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Countries $country)
    {
        $country = Countries::paginate('6');

        return view('Countries.country.show_country', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Countries  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Countries $country)
    {
       
        return view('Countries.Countries_Edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryRequest  $request
     * @param  \App\Models\Countries  $country
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryRequest $request, Countries $country)
    {
        Countries::where('id', $country->id)->update($request->only(['country_name', 'country_ISO']));
        return redirect('/show_country');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Countries  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Countries $country)
    {
        
        $country->delete();

        return redirect('/show_country');
    }
}