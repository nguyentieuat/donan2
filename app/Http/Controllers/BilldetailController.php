<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AddBrandRequest;
use Illuminate\Support\Facades\DB;
use App\Bills;
use App\Customer;
use App\BillDetail;
use Illuminate\Support\Facades\Auth;
class BillsController extends Controller
{
    public function getList(){
    	$billdetail = BillDetail::all();
    	return view('admin.billdetail.list',['billdetail'=>$billdetail]);
    }
    
 }
