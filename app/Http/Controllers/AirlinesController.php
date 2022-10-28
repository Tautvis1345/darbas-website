<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAirlineRequest;
use App\Http\Requests\UpdateAirlineRequest;
use App\Models\Airlines;
use App\Models\Countries;
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
        //$airlines = Airlines::paginate('6');
        $airlines = Airlines::all();
        
        return view('Airline.Airlines', compact('airlines'));
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function create()
     {
      
        return view("Airline.New_Airline");

     }
    
      /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAirlineRequest  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
        $validate = $request->validate([
            'airline_name' => 'required|max:100',
            'country_name' => 'required',
            'country_ISO' => 'required',
            'country_id' => 'required',
        ]);
        
            Airlines::create([
                'airline_name' =>request('airline_name'),
                'country_name' =>request('country_name'),
                'country_ISO' =>request('country_ISO'),
                'country_id' =>request('country_id'),


            ]);
        
        
        return redirect('/Airline.Airlines');
        }

  /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airlines  $airlines
     * @return \Illuminate\Http\Response
     */
    public function edit(Airlines $airlines)
    {

        $country = Countries::All();
        return view('Airline.Airlines_edit', compact('airlines', 'country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAirlineRequest  $request
     * @param  \App\Models\Airlines  $airlines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airlines $airlines)
    {
        Airline::where('id', $airlines->id)->update($request->only(['airline_name', 'country_name', 'country_ISO']));
        return redirect('/show_airlines');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airlines  $airlines
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airlines $airlines)
    {

        $airlines->delete();

        return redirect('/show_airlines');
    }

    }