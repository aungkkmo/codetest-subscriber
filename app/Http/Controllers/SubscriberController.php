<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Subscriber;
use Flash;

class SubscriberController extends Controller
{
    public function store(Request $request){
    	$rules=[
    		'first_name'=>'required',
    		'last_name'	=>'required',
    		'email'		=>'required|email|unique:users',		
    		
    	];

    	// var_dump($request->all());die();


    	$this->validate($request,$rules);

    	$confirmation_code = str_random(30);


    	Subscriber::create([
    	    'first_name' => $request->first_name,
    	    'last_name' => $request->last_name,
    	    'email' => $request->email,
    	    'company_name'=>$request->company_name,
    	    'phone'=>$request->phone,
    	    'confirmation_code' => $confirmation_code
    	]);

    	Mail::send('subscribe.verify', ['confirmation_code'=>$confirmation_code], function($message) use ($request){
    	    $message->to($request->email,$request->first_name)
    	        ->subject(' Verify your email address');
    	});

    	// flash('Thanks for signing up! Please check your email.');
        flash()->overlay('Please check your email.','Your request has been delivered !');

    	return redirect('/');

    }	

    public function confirm($confirmation_code){

       
    	if(!$confirmation_code){
            flash('Sorry! Please try again.', 'danger');
    		return redirect('/');
    	}

    	$subscriber=Subscriber::where('confirmation_code',$confirmation_code)->first();

        if($subscriber==null){
            flash('Sorry! Please try again.', 'danger');
            return redirect('/');
        }

    	$subscriber->confirmed=1;
    	$subscriber->confirmation_code = null;
    	$subscriber->save();

    	
         flash()->overlay('Success !', 'You have successfully verified your account.');

        return redirect('/');

    }
}
