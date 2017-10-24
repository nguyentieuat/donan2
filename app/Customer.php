<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tb_customer';
    protected $guarded =[];

    public function order()
    {
        return $this->hasOne('App\Bills', 'cid', 'id');
    }public function user()
    {
        return $this->hasOne('App\User', 'uid', 'id');
    }
}
