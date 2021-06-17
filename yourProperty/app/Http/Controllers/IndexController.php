<?php

use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController{
	
	public function index(){
		$user=Utente::find(session('id'));
		if($user){
			//$collections=Collection::where('user_id', $user->id)->get()->toArray();
			return view('index')->with('nome', $user->nome);
		}
		return view('index');
	}
}

?>