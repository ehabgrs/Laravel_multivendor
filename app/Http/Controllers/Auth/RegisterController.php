<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\SMSServices;
use DB;

class RegisterController extends Controller
{
	public $sms_services;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SMSServices $sms_services)
    {
        $this->middleware('guest');
		$this->sms_services = $sms_services;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
			'mobile'  => ['required','string','min:8','unique:users']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {	
		try{
			
			DB::beginTransaction();
			
			$user = User::create([
				'name' => $data['name'],
				'email' => $data['email'],
				'mobile'=> $data['mobile'],
				'password' => Hash::make($data['password']),
			]);
			
			////////////////////////////////send mobile code////////////////////////////
			$data['user_id'] = $user->id;
			//set the random code
			$verification_data = $this->sms_services->setVerificationCode($data);
			//set the message
			$message = $this->sms_services->setMessage($verification_data->code);
			//send thr code by victory gateway
			//app(VictoryLinkSms::class) -> sendSms($user->mobile, $message);
			//////////////////////////////////////////////////////////////////////////
			
			DB::commit();
			
			return $user;
			
		}catch(\Exception $ex) {
			
			DB::rollback();
			
		}
		
    }
	
	
	
}
