<?php
/**
 * Created by PhpStorm.
 * User: zain
 * Date: 2017/2/16
 * Time: 14:54
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {
    protected $fillable = [
        'title',
        'content',
        'author'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}