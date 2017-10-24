<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = 'tb_order';
    protected $guarded =[];

    public function customer()
    {
        return $this->hasOne('App\Customer', 'id', 'cid');
    }

    public function billDetail()
    {
        return $this->hasMany('App\BillDetail', 'oid', 'id');
    }
}
