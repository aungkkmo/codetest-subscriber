<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscriber;

class AdminController extends Controller
{
    public function __construct(){
    	 $this->middleware('auth');

    }

    public function index(){

    	$subscribers=Subscriber::all();
    	return view('admin.index',['subscribers'=>$subscribers]);
    }
}
