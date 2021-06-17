<?php

use Illuminate\Routing\Controller as BaseController;

class LoginController extends BaseController{
	
	public function login(){
		if(session('id')!=null){
			return redirect('index');
		}else{
			$old_username=Request::old('username');
			return view('login')->with('csrf_token', csrf_token())->with('old_username', $old_username);
		}
	}
	
	public function checkLogin(){
		$user=Utente::where('username', request('username'))->first();
		if($user){
			if(password_verify(request('password'), $user['password'])){
				Session::put('id', $user->id);
				return redirect('index');
			}else{
				return redirect('login')->withInput();
			}
		}else{
			return redirect('login')->withInput();
		}
	}
	
	public function logout(){
		Session::flush();
		return redirect('login');
	}
}

?>