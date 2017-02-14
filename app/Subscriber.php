<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable=[
    	'first_name',
    	'last_name',
    	'company_name',
    	'email',
    	'phone',
    	'confirmation_code'
    ];
}
