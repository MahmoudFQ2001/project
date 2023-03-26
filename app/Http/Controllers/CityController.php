<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use Illuminate\Http\Request;
use App\Models\Country;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cities = City::orderBy('id','desc')->paginate(5);
       return response()->view('cms.city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.city.create',compact('countries')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_name'=>'required|string|min:3|max:20',
            'street'=>'required|string|min:3|max:20'
        ]);
        $cities = new City();
        $cities->city_name =$request->get('city_name');
        $cities->street = $request->get('street');
        $cities->country_id = $request->get('country_id');
        $isSaved = $cities->save();
        session()->flash('message',$isSaved ? "Created is Successfuly" : "Create is Failed");


        return redirect()->route('cities.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $cities =City::findOrFail($id);
        return response()->view('cms.city.edit',compact('cities','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCityRequest  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'city_name'=>'required|string|min:3|max:20',
            'street'=>'required|string|min:3|max:20'
        ]);
        $cities = City::findOrFail($id);
        $cities->city_name =$request->get('city_name');
        $cities->street = $request->get('street');
        $cities->country_id = $request->get('country_id');
        $isSaved = $cities->save();
        session()->flash('message',$isSaved ? "Created is Successfuly" : "Create is Failed");


        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities = City::findOrFail($id);
        $isDelete =$cities->delete();

        // $countries =Country::destroy($id);
        return redirect()->route('cities.index');
    }
}
