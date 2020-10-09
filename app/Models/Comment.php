<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = ['comment','post_id','reply'];
    protected $primaryKey = 'id';


    public function user()
    {
        $this->belongsTo('App\Models\User');
    }


    public function post () {
        $this->belongsTo('App\Models\Post');
    }
}
