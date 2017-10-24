<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    
    public function getDel($id,$pid){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/product/edit/'.$pid)->with('success','Xóa comment thành công');
    }
 }
