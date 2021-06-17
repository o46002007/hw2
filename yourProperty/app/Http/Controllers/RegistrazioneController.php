<?php

use Illuminate\Routing\Controller as BaseController;

class RegistrazioneController extends BaseController{
	
	public function create(){
		$nome=request('nome');
		$cognome=request('cognome');
		$username=request('username');
		$password=request('password');
		$confermaPassword=request('confermapassword');
		
		$semaforo=true;

		if(strlen($nome)==0 || strlen($cognome)==0 || strlen($username)==0 || strlen($password)==0 || strlen($confermaPassword)==0){
			$semaforo=false;
		}else{
			$sim=0;
			$num=0;
			$mai=0;
			$min=0;
			
			if(strlen($password)<8){
				$semaforo=false;
			}
			
			if($password!==$confermaPassword){
				$semaforo=false;
			}
			
			for($i=0; $i<strlen($password); $i++){
				$ascii=ord(substr($password, -$i, 1));
				if(($ascii>=33 && $ascii<=47)||($ascii>=58 && $ascii<=64)||($ascii>=91 && $ascii<=96)){
					$sim++;
				}else if($ascii>=48 && $ascii<=57){
					$num++;
				}else if($ascii>=65 && $ascii<=90){
					$mai++;
				}else if($ascii>=97 && $ascii<=122){
					$min++;
				}
			}
			
			if($sim==0 || $num==0 || $mai==0 || $min==0){
				$semaforo=false;
			}
		}
		
		$exist=Utente::where('username',$username)->exists();
		if($exist){
			$semaforo=false;
		}

		if($semaforo){
			$utente=new Utente;
			$utente->nome=request('nome');
			$utente->cognome=request('cognome');
			$utente->username=request('username');
			$utente->password=password_hash(request('password'), PASSWORD_BCRYPT);
			$utente->save();
			return redirect('login');
		}else{
			return redirect('registrazione')->withInput();
		}
	}
	
	public function checkUsername($query){
		$exist=Utente::where('username',$query)->exists();
		if($exist){
			echo json_encode("nook");
		}else{
			echo json_encode("ok");
		}
	}
	
	public function index(){
		$old_nome=Request::old('nome');
		$old_cognome=Request::old('cognome');
		
		return view('registrazione')
		->with('csrf_token', csrf_token())
		->with('old_nome', $old_nome)
		->with('old_cognome', $old_cognome);
	}
}

?>