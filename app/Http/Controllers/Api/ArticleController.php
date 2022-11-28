<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // private $perPage = 10;
    public function index()
    {
        $data = Article::latest()->paginate(5);
        return response()->json([
            'data', $data,
            // 'message', 'List all Article'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'users_id' => 'required|exists:users,id',
            'categories_id' => 'required|exists:categories,id'
        ]);

        $data = new Article();
        $data->title = $request->title;
        $data->content = $request->content;
        $data->image = $request->image;
        $data->users_id = $request->users_id;
        $data->categories_id = $request->categories_id;

        $data->save();

        return response()->json([
            'data' => $data,
            'message' => 'Article Berhasil Ditambahkan!!'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Article::findOrFail($id);

        return response()->json([
            'data' => $data,
            'message' => 'Show Detail Article'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'users_id' => 'required|exists:users,id',
            'categories_id' => 'required|exists:categories,id'
        ]);
        $data = Article::find($request->id);
        $data->title = $request->title;
        $data->content = $request->content;
        $data->image = $request->image;
        $data->users_id = $request->users_id;
        $data->categories_id = $request->categories_id;

        $data->update();

        return response()->json([
            'data' => $data,
            'message' => 'Article Berhasil Diupdate!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Article::find($request->id);
        $data->delete();

        return response()->json([
            'message' => 'Article Berhasil Dihapus!!'
        ], 200);
    }
}