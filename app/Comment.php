<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $primaryKey = 'comment_id';

    protected $table = 'comments';

    public $timestamps = false;

    protected $fillable = ['comment', 'name', 'email'];
}
