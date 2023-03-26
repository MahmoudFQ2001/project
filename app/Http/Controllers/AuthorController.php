<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $authors = Author::with('user')->withCount('articles')->orderBy('id','desc')->paginate(5);
        return response()->view('cms.author.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.author.create',compact('countries'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('author',$image, 'author');

        $request->validate([
            'firstname'=>'required|string|min:3|max:20',
            'lastname'=>'required|string|min:3|max:20'
        ]);
        $authors = new Author();
        $authors->email = $request->get('email');
        $authors->password=Hash::make($request->get('password'));
        $isSaved = $authors->save();
        if($isSaved){
            $users = new User();
            $users->firstname = $request->get('firstname');
            $users->lastname = $request->get('lastname');
            $users->mobile = $request->get('mobile');
            $users->date_of_birth = $request->get('date_of_birth');
            $users->gender = $request->get('gender');
            $users->status = $request->get('status');
            $users->country_id=$request->get('country_id');
            $users->actor()->associate($authors); 
            $users->image = $path ;
            $isSaved = $users->save();

            return redirect()->route('authors.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $authors = Author::findOrFail($id);
        return response()->view('cms.author.edit',compact('countries','authors'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'firstname'=>'required|string|min:3|max:20',
            'lastname'=>'required|string|min:3|max:20'
        ]);
        $authors = Author::findOrFail($id);
        $authors->email = $request->get('email');
        $authors->password=Hash::make($request->get('password'));
        $isUpdate = $authors->save();
        if($isUpdate){
            $users = $authors->user;
            $users->firstname = $request->get('firstname');
            $users->lastname = $request->get('lastname');
            $users->mobile = $request->get('mobile');
            $users->date_of_birth = $request->get('date_of_birth');
            $users->gender = $request->get('gender');
            $users->status = $request->get('status');
            $users->country_id=$request->get('country_id');
            $users->actor()->associate($authors); 
            $isUpdate = $users->save();

            return redirect()->route('authors.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admins = Author::findOrFail($id);
        $isDelete =$admins->delete();

        // $countries =Country::destroy($id);
        return redirect()->route('authors.index');
    }
}
