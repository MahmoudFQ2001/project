<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexArticle($id)
    {
        $articles = Article::where('author_id',$id)->orderBy('id','desc')->Paginate(5);
        return response()->view('cms.article.index',compact('articles','id'));
    }
    public function createArticle($id)
    {
        $categories = Category::all();
        $authors =Author::all();
        return response()->view('cms.article.create',compact('categories','id','authors'));
    }
    public function index()
    {
        $articles = Article::orderBy('id','desc')->Paginate(5);
        return response()->view('cms.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $categories = Category::all();
        $authors =Author::all();
        return response()->view('cms.article.create',compact('categories','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|min:3|max:20',
        ]);
        $articles = new Article();
        $articles->title = $request->get('title');
        $articles->short_description=$request->get('short_description');
        $articles->full_description=$request->get('full_description');
        $articles->author_id=$request->get('author_id');
        $articles->category_id=$request->get('category_id');

        $isSave = $articles->save();
        return redirect()->route('articles.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $authors =Author::all();
        $articles =Article::findOrFail($id);
        return response()->view('cms.article.edit',compact('categories','articles','authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|string|min:3|max:20',
        ]);
        
        $articles = Article::findOrFail($id);
        $articles->title = $request->get('title');
        $articles->short_description=$request->get('short_description');
        $articles->full_description=$request->get('full_description');
        $articles->author_id=$request->get('author_id');
        $articles->category_id=$request->get('category_id');

        $isUpdate = $articles->save();
        return redirect()->route('articles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Article::findOrFail($id);
        $isDelete =$articles->delete();

        // $countries =Country::destroy($id);
        return redirect()->route('articles.index');
    }
}
