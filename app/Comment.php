<?php
/**
 * Created by PhpStorm.
 * User: zain
 * Date: 2017/2/16
 * Time: 14:57
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = [
        'article_id',
        'content',
        'author'
    ];

    public function article()
    {
        return $this->belongsTo('App\Article','article_id','id');
    }

}