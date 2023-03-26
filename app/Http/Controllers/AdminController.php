<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::with('user')->orderBy('id','desc')->paginate(5);
        return response()->view('cms.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.Admin.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'=>'required|string|min:3|max:20',
            'lastname'=>'required|string|min:3|max:20'
        ]);
        $admins = new Admin();
        $admins->email = $request->get('email');
        $admins->password=Hash::make($request->get('password'));
        $isSaved = $admins->save();
        if($isSaved){
            $users = new User();
            $users->firstname = $request->get('firstname');
            $users->lastname = $request->get('lastname');
            $users->mobile = $request->get('mobile');
            $users->date_of_birth = $request->get('date_of_birth');
            $users->gender = $request->get('gender');
            $users->status = $request->get('status');
            $users->country_id=$request->get('country_id');
            $users->actor()->associate($admins); 
            $isSaved = $users->save();

            return redirect()->route('admins.index');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $admins =Admin::findOrFail($id);
        return response()->view('cms.admin.edit',compact('admins','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname'=>'required|string|min:3|max:20',
            'lastname'=>'required|string|min:3|max:20'
        ]);
        $admins = Admin::findOrFail($id);
        $admins->email = $request->get('email');
        $admins->password=Hash::make($request->get('password'));
        $isUpdate = $admins->save();
        if($isUpdate){
            $users = $admins->user;
            $users->firstname = $request->get('firstname');
            $users->lastname = $request->get('lastname');
            $users->mobile = $request->get('mobile');
            $users->date_of_birth = $request->get('date_of_birth');
            $users->gender = $request->get('gender');
            $users->status = $request->get('status');
            $users->country_id=$request->get('country_id');
            $users->actor()->associate($admins); 
            $isUpdate = $users->save();

            return redirect()->route('admins.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $admins = Admin::findOrFail($id);
        $isDelete =$admins->delete();

        // $countries =Country::destroy($id);
        return redirect()->route('admins.index');
    }
}
