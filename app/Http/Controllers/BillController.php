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
    	$bill_new = Bills::where('status',0)->paginate(5);
        $count_new = Bills::where('status',0)->count();
        $bill_accept = Bills::where('status',1)->paginate(5);
        $count_old = Bills::where('status',1)->count();
    	return view('admin.bill.list',compact('bill_new','bill_accept','count_new','count_old'));
    }

     public function UpdateOrder(Request $req, $id){

       $bill = $this->__order->find($id);
       $billDetail = $bill->billDetail;
       foreach ($billDetail as $key => $value) {
            $product = $this->__prd->find($value->pid);
            $product->update([  'sold' => ($product->sold + $value->qty),
                                'qty'  => ($product->sold - $value->qty)]);
       }
       $bill->update(['status' => $req->status]);

        return redirect()->back();
    }
      public function getDetail($id)
    {
        $total = 0;
        $order = $this->__order->find($id);
        $order->s_status = Helper::valOfArr(Helper::orderStatusArr(), $order->status);
        $cus = $this->__cus->find($order->cid);
        // $cus->s_gender = Helper::valOfArr(Helper::genderArr(), $cus->gender);
        // $cus->gender = $cus->gender;
        $detail = $order->billDetail;

        foreach ($detail as $item) {
            $total += $item->total;
//            $ava[] = explode(',', $item->product->images)[0];
        }


        return view('admin.bill.detail', compact('order', 'cus', 'detail', 'total'));
    }

 }
