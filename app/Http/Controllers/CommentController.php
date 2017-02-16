<?php
/**
 * Created by PhpStorm.
 * User: zain
 * Date: 2017/2/16
 * Time: 14:51
 */

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * post comment
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createComment(Request $request){
        $comment = Comment::create($request->all());
        return response()->json($comment);
    }

    /*public function getArticle($id) {
        $comment = Comment::find($id)->article()->get();
        return response()->json($comment);
    }*/

}