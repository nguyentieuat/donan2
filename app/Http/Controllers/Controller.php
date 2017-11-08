<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class Controller extends BaseController
{
	protected $currentUser;
	
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __construct(){
    	// $this->currentUser = Auth::User();
     //    View::share([ 'currentUser' => $this->currentUser ]);
    }


}
