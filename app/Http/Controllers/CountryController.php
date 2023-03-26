<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate(5);
        return response()->view('cms.country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_name'=>'required|string|min:3|max:20',
            'code'=>'required|min:3|max:20'
        ],[
            'country_name.required'=>'لا يقبل قيمة فارغة',
            'country_name.string'=>'لا يقبل قيمة فير نصية',
            'country_name.min'=>'لا يقبل قيمة اقل من 3',
            'country_name.max'=>'لا يقبل قيمة اكبر من 20',
            'code.required'=>'لا يقبل قيمة فارغة',
            'code.min'=>'لا يقبل قيمة اقل من 3',
            'code.max'=>'لا يقبل قيمة اكبر من 20'
        ]);

        $countries = new Country();
        $countries->country_name = $request->get('country_name');
        $countries->code = $request->get('code');
        $isSaved =  $countries->save();
        session()->flash('message',$isSaved ? "Created is Successfuly" : "Create is Failed");
        // return redirect()->back();        
        return redirect()->route('countries.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::findOrFail($id);
        return response()->view('cms.country.edit',compact('countries'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'country_name'=>'required|string|min:3|max:20',
            'code'=>'required|min:3|max:20'
        ],[
            'country_name.required'=>'لا يقبل قيمة فارغة',
            'country_name.string'=>'لا يقبل قيمة فير نصية',
            'country_name.min'=>'لا يقبل قيمة اقل من 3',
            'country_name.max'=>'لا يقبل قيمة اكبر من 20',
            'code.required'=>'لا يقبل قيمة فارغة',
            'code.min'=>'لا يقبل قيمة اقل من 3',
            'code.max'=>'لا يقبل قيمة اكبر من 20'
        ]);

        $countries = Country::findOrFail($id);
        $countries->country_name = $request->get('country_name');
        $countries->code = $request->get('code');
        $isSaved =  $countries->save();
        session()->flash('message',$isSaved ? "Created is Successfuly" : "Create is Failed");
        // return redirect()->back();        
        return redirect()->route('countries.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countries = Country::findOrFail($id);
        $isDelete =$countries->delete();

        // $countries =Country::destroy($id);
        return redirect()->route('countries.index');
    }
}
