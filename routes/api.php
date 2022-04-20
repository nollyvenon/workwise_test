<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('articles', function() {
    //return Article::all();
    $post = Article::where('expired_at', '>=',  Carbon::now())->get(['title', 'author', 'published_at', 'updated_at', 'created_at']);
    
    return $post;
});
 
Route::get('articles/{id}', function($id) {
    return Article::find($id);
});

Route::post('articles', function(Request $request) {
    $validated = $request->validate([
        'title' => 'required|unique:articles|max:255',
        'body' => 'required|max:4000',
      //  'expired_at' => 'required',
      //  'published_at' => 'required',
    ]);
    if ($validated){
        Article::create($request->all());
        return response()->json([
            "message" => "Article added"
            ], 200);
    }else{
        return response()->json([
            "message" => "Validation not successful"
            ], 404);

    }

});

Route::put('articles/{id}', function(Request $request, $id) {
    if (Article::where('id', $id)->exists()) {
        $request->validate([
            'title' => 'required|unique:articles|max:255',
            'body' => 'required|max:4000',
        ]);
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    } else {
        return response()->json([
        "message" => "Article not found"
        ], 404);
    }
});

Route::delete('articles/{id}', function($id) {
    Article::find($id)->delete();

    return 204;
});

Route::get('candidates', 'ApiController@getAllCandidates');
Route::get('candidates/{id}', 'ApiController@getCandidate');
Route::post('candidates', 'ApiController@createCandidate');
Route::put('candidates/{id}', 'ApiController@updateCandidate');
Route::delete('candidates/{id}','ApiController@deleteCandidate');