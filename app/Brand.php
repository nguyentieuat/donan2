<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'tb_brand';
    protected $guarded = [];

    protected $fillable = [
     	'id',
     	'cid',
     	'total',
     	'note',
     	'payment',
     	'status',
     ];


    public function product()
    {
        return $this->hasMany('App\Product', 'bid', 'id');
    }
}
