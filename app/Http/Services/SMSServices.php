<?php

namespace App\Http\Services;

use App\Models\UserMobileVerification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SMSServices 
{
	public function setVerificationCode($data)
	{
		$code = mt_rand(100000,999999);
		$data['code'] = $code;
		
		//delete if there is old code in the table for the same user_error
		UserMobileVerification::whereNotNull('user_id')->where(['user_id' => $data['user_id']])->delete();
		
		return UserMobileVerification::create($data);
	}
	
	public function setMessage($code)
	{
		return 'Your code of verification is ' . $code;
	}
	
	public function check_mobile_code($code)
	{
		if (Auth::guard()->check()) {
			
			$logged_user_id = Auth::id();
			
			$verification_data = UserMobileVerification::where('user_id',$logged_user_id)->first();
			if($verification_data->code == $code){
				User::whereId(Auth::id())->update(['email_verified_at' => now()]);
				return true;
			} else {
				return false;
			}
		}
	}
	
	
	public function deleteOTPCode($code){
		UserMobileVerification::where('code',$code)->delete();
	}
}