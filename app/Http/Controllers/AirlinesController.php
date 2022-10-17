<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAirlineRequest;
use App\Http\Requests\UpdateAirlineRequest;
use App\Models\Airline;
use App\Models\Country;
use Iluminate\Support\Facades\Gate;


class AirlinesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //$airline = Airline::paginate('6');
        $airlines = Airlines::all();
        
        return view('Airlines', compact('airlines'));
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function create()
     {
      
        return view("New_Airline");

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
        
            Airline::create([
                'airline_name' =>request('airline_name'),
                'country_name' =>request('country_name'),
                'country_ISO' =>request('country_ISO'),
                'country_id' =>request('country_id'),


            ]);
        
        
        return redirect('/Airlines');
        }



    }