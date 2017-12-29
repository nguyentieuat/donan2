<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AddBrandRequest;
use App\Http\Requests\admin\UpdateCustomerRequest;
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
    public function getEdit($id){
    	$customer = Customer::find($id);
    	return view('admin.customer.edit',['customer'=>$customer]);
    }
    public function postEdit(UpdateCustomerRequest $req, $id){
	    $customer = Customer::find($id);
	    $customer->update(
	    	['name'    =>$req->name,
			'email'   =>$req->email,
			'phone'   =>$req->phone,
			'address' =>$req->address,
			'gender'  =>$req->gender,
	    ]);
	    return redirect('admin/customer/list')->with('success', 'Sửa customer thành công');
	}
	public function getDel($id){
    	$customer = Customer::find($id);
    	$customer->delete();  
    	return redirect('admin/customer/list')->with('success', 'Xóa customer thành công');
    }
}