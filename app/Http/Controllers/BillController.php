<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AddBrandRequest;
use Illuminate\Support\Facades\DB;
use App\BillDetail;
use App\Bills;
use App\Customer;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Helper\Helper;
class BillController extends Controller
{
	private $__order;
    private $__orderDetail;
    private $__cus;
    private $__prd;

    public function __construct()
    {
        $this->__order = new Bills();
        $this->__orderDetail = new BillDetail();
        $this->__cus = new Customer();
        $this->__prd = new Product();
    }

    public function getList(){
    	$bill = Bills::all();
    	return view('admin.bill.list',['bill'=>$bill]);
    }
    public function getDetail($id){
    	$total = 0;
        $order = $this->__order->find($id);
        $order->s_status = Helper::valOfArr(Helper::orderStatusArr(), $order->status);
        $cus = $this->__cus->find($order->id);
        $cus->s_gender = Helper::valOfArr(Helper::genderArr(), $cus->gender);
        $detail = $this->__orderDetail->where('oid',$order->id)->get();
        foreach ($detail as $item) {

            echo $item;
            echo "</br>";
            $total += $item->total;
//            $ava[] = explode(',', $item->product->images)[0];
        }
    }
    
 }
