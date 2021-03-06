<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\EditUserRequest;
use App\Http\Requests\admin\AddUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Brand;
use App\Listimg;
use App\Customer;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Requests\admin\LoginRequest;

class UserController extends Controller
{
    public function getList(){
    	$user = User::orderBy('id','DESC')->get();
    	return view('admin.user.list',['user'=>$user]);
    }
    public function getEdit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    
    }

    public function postEdit(EditUserRequest $req,$id){
        
        $user = User::find($id);
      
        if (isset($req->pass)) {
            $user->update([
            'password'=>bcrypt($req->pass),
        ]);
        }
        $user->update([
            'email'=>$req->email,
            'status'=>$req->status,
            'level'=>$req->level
        ]);
        
        return redirect('admin/user/list')->with('success', 'Sửa user thành công');
    }

    public function getAdd(){
        
        return view('admin.user.add');
        
    }
    public function postAdd(AddUserRequest $req){
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->password = bcrypt($req->pass);
        $user->status = $req->status;
        $user->level = $req->level;        
        $user->save();
        return redirect('admin/user/add')->with('success','Thêm thành công');
        

    }


    public function getDel($id)
        {
            $user=User::find($id);
            if(Customer::where('uid',$user->id)){
                return redirect('admin/user/list')->with('err','Không thể xóa khách hàng');
            } else {
                $image = File::delete('upload/user/' . $user->avatar);        
           
                $user->delete();    
                return redirect('admin/user/list')->with('success','Xóa thành công');
            }
            
        }

    public function getLoginAdmin()
    {
        return view('admin.login');
    }
    public function postLoginAdmin(LoginRequest $req)
    {
        $user=User::where('email',$req->email)->get();
        foreach ($user as $user) {
            if($user->level==0 && $user->status==1){
                 $credentials = array('email' => $req->email, 'password'=>$req->password );
                if (Auth::attempt($credentials)) {
                    return redirect('admin/bill/list')->with('success','Đăng nhập thành công');
                } else{
                    return redirect('admin/login')->with('err','Đăng nhập thất bại');
                }
            } else{
                return redirect('admin/login')->with('err','Đăng nhập thất bại');
            }
        }
    }

    public function getLogoutAdmin(){
        Auth::logout();
        return redirect('admin/login');
    }
}
