<?php
/**
 * Created by PhpStorm.
 * User: zain
 * Date: 2017/2/16
 * Time: 14:51
 */

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * articles
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $articles  = Article::all();
        return response()->json($articles);
    }

    /**
     * one artile
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getArticle($id){
        $article  = Article::find($id);
        return response()->json($article);
    }

    /**
     * create article
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createArticle(Request $request){
        $article = Article::create($request->all());
        return response()->json($article);
    }

    /**
     * @param $id article id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getComments($id) {
        $comments = Article::find($id)->comments()->get();
        return response()->json($comments);
    }

    /**
     * search articles
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request) {
        $keywords = $request->input('keywords');
        $keywords = $keywords ? '%'.$keywords.'%':'';
        $articles = Article::whereHas('comments',function($query) use ($keywords) {
            $query->where('content','like',$keywords)->orWhere('author','like',$keywords);
        })->orWhere('title','like',$keywords)->orWhere('content','like',$keywords)->orWhere('author','like',$keywords)->get();
        return response()->json($articles);
    }

}