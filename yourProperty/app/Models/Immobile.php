<?php

use Illuminate\Database\Eloquent\Model;

class Immobile extends Model{
	protected $table="immobile";
	
	public function affitti(){
		return $this->belongsToMany('Utente','Affitto')->withPivot("data_inizio")->withPivot("data_fine");
	}
	
	public function preferiti(){
		return $this->belongsToMany('Utente','Preferito');
	}
	
}

?>