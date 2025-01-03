<?php

namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use Validator,Redirect,Response,File;
 use Socialite;
 use App\User;

 class SocialController extends Controller
 {
	 public function redirect($provider)
	 {	 	
	    return Socialite::driver($provider)->redirect();
	 }

	 public function callback($provider)
	 {		

	   $getInfo = Socialite::driver($provider)->stateless()->user();
	   $user = $this->createUser($getInfo,$provider); 
	   auth()->login($user);
	   return redirect()->to('/');
	 }

	 function createUser($getInfo,$provider){	 	
		$user = User::where('provider_id', $getInfo->id)->first();
		if (!$user) {
			// if($provider == 'github') $getInfo->name = $getInfo->nickname;
		     $user = User::create([
		        'ten'     => $getInfo->name,
		        'email'    => $getInfo->email,
		        'provider' => $provider,
		        'provider_id' => $getInfo->id,
		        'provider_token' => $getInfo->token,
		        'loaitk' => 0,
		        'verified' => 1,
		    ]);
		  }
	    return $user;
	}
}
