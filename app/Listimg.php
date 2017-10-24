<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listimg extends Model
{
    protected $table = 'tb_listimage';
	protected $guarded = [];
	public $timestamps = false;

	public function products(){
		return $this->belongsTo('App\Products','product_id');
	}
}
