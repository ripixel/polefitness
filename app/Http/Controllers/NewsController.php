<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Blog_Item;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // NOT USED IN THIS CLASS
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
    public function update(Request $request, $id)
    {
        $news_item = Blog_Item::findOrFail($id);
		$news_item->fill(Input::all());
		$news_item->save();
		
		return Redirect::to('admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
