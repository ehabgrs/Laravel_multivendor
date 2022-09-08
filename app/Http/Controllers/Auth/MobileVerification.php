<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\SMSServices;

class MobileVerification extends Controller
{
	public $sms_services;
	
	public function __construct(SMSServices $sms_services)
	{
		$this->sms_services = $sms_services; 
	}
	
    public function verify(Request $request)
	{
		if($this->sms_services->check_mobile_code($request->code)){
			//if okay and got verified delete the code
			$this->sms_services->deleteOTPCode($request->code);
			//then return home
			return redirect()->route('home');
		} else {
			//if code not match return with error
			return redirect()->route('mobile.verify.form')->withErrors(['code' => 'The code is not valid']);
		}
	}
}
