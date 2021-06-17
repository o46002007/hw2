<?php

use Illuminate\Database\Eloquent\Model;

class Utente extends Model{
	protected $hidden=['password'];
	protected $table="utente";
	
	public function affitti(){
		return $this->belongsToMany('Immobile','Affitto')->withPivot("data_inizio")->withPivot("data_fine");
	}
	
	public function preferiti(){
		return $this->belongsToMany('Immobile','Preferito');
	}
	
}

?>