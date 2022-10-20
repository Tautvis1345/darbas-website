<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\AirportCon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreAirportConRequest;
use App\Http\Requests\UpdateAirportConRequest;

class AirportConController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['index', 'search', 'show', 'showSingle']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('Airports');
    }

    public function search(Country $request) {

        $airportCon = AirportCon::paginate(15);

        $country = Country::where('id', 'Like', '%'. request('country') . '%' )->get();

        return view('pages.airport.search_airport', compact('country', 'airportCon'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::All();
        return view('pages.airport.add_airport', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAirportConRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAirportConRequest $request)
    {
        $fileName = NULL;

        $validate = $request->validate([
            'airport_name' => 'required|min:4|max:55',
            'country_name' => 'required',
            'country_ISO' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'country_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png',


        ]);

        if(request()->hasFile('image')){
            $path = $request->file('image')->store('public/images');
            $fileName = str_replace('public/', '', $path);
        }

        if( Country::where('id', '=', request('country_id') )->exists() ){
            AirportCon::create([
                'airport_name' =>request('airport_name'),
                'country_name' =>request('country_name'),
                'country_ISO' =>request('country_ISO'),
                'latitude' =>request('latitude'),
                'longitude' =>request('longitude'),
                'country_id' =>request('country_id'),
                'user_id' =>Auth::id(),
                'image' =>$fileName,

            ]);
        }else{
            return view('pages.denies');
        }

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
        $country = Country::paginate(6);
        $airportCon = AirportCon::paginate(6);

        return view('pages.airport.show_airport', compact('airportCon', 'country'));
    }

    public function showSingle(AirportCon $airportCon)
    {
        return view('pages.airport.show_single_airport', compact('airportCon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AirportCon  $airportCon
     * @return \Illuminate\Http\Response
     */
    public function edit(AirportCon $airportCon)
    {
        $country = Country::All();
        // if(Gate::denies('edit_airport', $airportCon)){
        //     return view('pages.denies');
        // }
        return view('pages.airport.edit_airport', compact('airportCon', 'country'));
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
        if($airportCon->image){
            File::delete(storage_path('app/public/'.$airportCon->image));
        }

        if(request()->hasFile('image')){
            $path = $request->file('image')->store('public/images');
            $fileName = str_replace('public/', '', $path);
            AirportCon::where('id', $airportCon->id)->update(['image'=>$fileName]);
        }

        AirportCon::where('id', $airportCon->id)->update($request->only(['airport_name', 'country_name', 'country_ISO', 'latitude', 'longitude', 'country_id']));
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