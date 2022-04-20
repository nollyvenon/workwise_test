<?php

namespace App\Http\Controllers;
use App\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return Article::all();
    }
 
    public function show($id)
    {
        return Article::find($id);
    }

    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return  response()->json($validator->messages(), 400);
        } else {
            $article = Article::create($request->all());
            return response()->json($article, 201);
        }

    }

    public function update(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        } else {
            $article = Article::findOrFail($id);
            $article->update($request->all());
        }
        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}