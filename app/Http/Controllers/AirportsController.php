<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\Airports;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreAirportsRequest;
use App\Http\Requests\UpdateAirportsRequest;

class AirportsController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth', ['except'=>['index', 'search', 'show', 'showSingle']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Airports.Airports');
    }
    public function redirect(){
        return redirect('/Airports');
    }
    public function search(Countries $request) {

        $Airports = Airports::paginate(15);

        $country = Countries::where('id', 'Like', '%'. request('country') . '%' )->get();

        return view('Airports.search_airport', compact('country', 'Airports'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Countries::All();
        return view('Airports.New_Airports', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAirportsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        if( Countries::where('id', '=', request('country_id') )->exists() ){
            Airports::create([
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
            return view('denies');
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airports  $Airports
     * @return \Illuminate\Http\Response
     */
    public function show(Airports $Airports)
    {
        $country = Countries::paginate(6);
        $Airports = Airports::paginate(6);

        return view('Airports.show_airport', compact('Airports', 'country'));
    }

    public function showSingle(Airports $Airports)
    {
        return view('Airports.show_single_airport', compact('Airports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airports  $Airports
     * @return \Illuminate\Http\Response
     */
    public function edit(Airports $Airports)
    {
        $country = Countries::All();
        
        return view('Airports.Edit', compact('Airports', 'country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAirportsRequest  $request
     * @param  \App\Models\Airports  $Airports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airports $Airports)
    {
        if($Airports->image){
            File::delete(storage_path('app/public/'.$Airports->image));
        }

        if(request()->hasFile('image')){
            $path = $request->file('image')->store('public/images');
            $fileName = str_replace('public/', '', $path);
            Airports::where('id', $Airports->id)->update(['image'=>$fileName]);
        }

        Airports::where('id', $Airports->id)->update($request->only(['airport_name', 'country_name', 'country_ISO', 'latitude', 'longitude', 'country_id']));
        return redirect('/Airports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airports  $Airports
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airports $Airports)
    {
        
        $Airports->delete();

        return redirect('/Airports');
    }
}