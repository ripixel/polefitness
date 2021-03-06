<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;
use App\Blog_Item;
use App\User;
use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $blog_items = Blog_Item::orderBy('created_at','desc')->get();

		return view('news.index', compact('blog_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(NewsRequest $request)
    {
        $news_item = new Blog_Item($request->all());
		$user = Auth::user();
		$user->blog_items()->save($news_item);

		return Redirect::to('admin/news')->with("good", "Successfully created news item.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $news_item = Blog_Item::findOrFail($id);

		return view('news.edit', compact('news_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(NewsRequest $request, $id)
    {
        $news_item = Blog_Item::findOrFail($id);
		$news_item->fill($request->all());
		$news_item->save();

		return Redirect::back()->with("good", "Successfully updated news item.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $news_item = Blog_Item::findOrFail($id);
		$news_item->delete();

		return Redirect::to('admin/news')->with("good", "Successfully deleted news item.");
    }
}
