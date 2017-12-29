<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'tb_comment';

    protected $fillable = [
        'id',
        'uid',
        'pid',
        'status',
        'content',
        'rate',

    ];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'uid', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'pid', 'id');
    }
}
