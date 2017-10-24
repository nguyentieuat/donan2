<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AddBrandRequest;
use Illuminate\Support\Facades\DB;
use App\Bills;
use App\Customer;
use Illuminate\Support\Facades\Auth;
class BillsController extends Controller
{
    public function getList(){
    	$bill = Bills::all();
    	return view('admin.bill.list',['bill'=>$bill]);
    }
    
 }
