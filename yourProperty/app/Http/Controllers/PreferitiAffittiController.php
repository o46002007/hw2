<?php

use Illuminate\Routing\Controller as BaseController;

class PreferitiAffittiController extends BaseController{
	
	public function preferiti(){
		return view('preferiti');
	}

	public function affitti(){
		return view('affitti');
	}
	
    public function getAllPreferiti(){
        if(Session::get('id')){
            $elemento=Utente::find(Session::get('id'))->preferiti()->get(['nome', 'immagine']);
            echo $elemento;
        }else{
            echo json_encode("error");
        }
    }

    public function getAffitti(){
        if(Session::get('id')){
            $elemento=Utente::find(Session::get('id'))->affitti()->get(['nome', 'immagine', 'data_inizio', 'data_fine']);
            echo $elemento;
        }else{
            echo json_encode("error");
        }
    }

    public function removeAffitto($index, $data_inizio, $data_fine){
        if(Session::get('id')){
            $immobile=Immobile::where('nome', $index)->first();
            $id_immobile=$immobile->id;
            
            $elemento=Utente::find(Session::get('id'))->affitti()->wherePivot('immobile_id', $id_immobile)->wherePivot('data_inizio', $data_inizio)->wherePivot('data_fine', $data_fine)->get();
            $risultato=null;
            if($elemento){
                $ris=Utente::find(Session::get('id'))->affitti()->wherePivot('immobile_id', $id_immobile)->wherePivot('data_inizio', $data_inizio)->wherePivot('data_fine', $data_fine)->detach($id_immobile);
                if($ris){
                    $risultato="ok";
                }else{
                    $risultato="error";
                }
            }
            else{
                $risultato="error";
            }
            echo json_encode($risultato);
        }else{
            echo json_encode("error");
        }
    }
}

?>






