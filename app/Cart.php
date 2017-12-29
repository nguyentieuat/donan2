<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0 ;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addCart($item,$id){
        $price_unit_or_promotion = $item->u_price;
        if($item->p_price!=0)
        {
            $price_unit_or_promotion = $item->p_price;
        }
        $giohang = ['qty'=>0, 'price' => $price_unit_or_promotion, 'item' => $item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
            }
        }
        $giohang['qty']++;
        $giohang['price'] = $price_unit_or_promotion * $giohang['qty'];
        $this->items[$id] = $giohang;
        $this->totalQty++;
        $this->getTotal($this->items);
    }
    //xóa 1
    public function reduceByOne($id){
        // dd($this->items);
        $this->items[$id]['qty']--;
        // $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        if ($this->items[$id]['item']['p_price'] !=0) {
            $this->items[$id]['price'] -= $this->items[$id]['item']['p_price'];
        } else {
            $this->items[$id]['price'] -= $this->items[$id]['item']['u_price'];
        }
        if($this->items[$id]['qty']<=0){
            unset($this->items[$id]);
        }
        $this->getTotal($this->items);
    }
    public function addOne($id){
        $this->items[$id]['qty']++;
        // $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        if ($this->items[$id]['item']['p_price'] !=0) {
            $this->items[$id]['price'] += $this->items[$id]['item']['p_price'];
        } else {
            $this->items[$id]['price'] += $this->items[$id]['item']['u_price'];
        }
        if($this->items[$id]['qty']<=0){
            unset($this->items[$id]);
        }
        $this->getTotal($this->items);
    }
    //xóa nhiều
    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
    private function getTotal($items) {
        $total = 0;
        foreach ($items as $key => $value) {
            $total += $value['price'];
        }
        $this->totalPrice = $total;
    }

}
