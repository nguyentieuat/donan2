<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class AjaxController extends Controller
{
   public function getCategory($parentId){
        $category = category::where('parentId',$parentId)->get();
        foreach ($category as $cate) {
           echo "<option value='".$cate->id."'>".$cate->name."</option>";
        }
   }
}
