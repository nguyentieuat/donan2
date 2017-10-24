<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AddBrandRequest;
use Illuminate\Support\Facades\DB;
use App\Bills;
use App\Customer;
use App\Billdetail;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    public function getList(){
    	$customer = Customer::all();
    	return view('admin.customer.list',['customer'=>$customer]);
    }
    
 }
