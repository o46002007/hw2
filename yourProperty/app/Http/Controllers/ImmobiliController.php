<?php

use Illuminate\Routing\Controller as BaseController;

class ImmobiliController extends BaseController{
	
	public function casa(){
		return view('casa');
	}

	public function appartamento(){
		return view('appartamento');
	}

	public function cottage(){
		return view('cottage');
	}

	public function carica($pagina){
        $request=Immobile::where('tipo', $pagina)->get(['nome', 'immagine']);
        echo $request;
	}

    public function getPreferiti($pagina){
        if(Session::get('id')){
            $request=Utente::find(Session::get('id'))->preferiti()->where('tipo', $pagina)->get(['nome', 'immagine']);
            echo $request;
        }else{
            echo json_encode("error");
        }
    }

    public function viewMore($index){
        $object=array();
        $object[0]=Immobile::where('nome', $index)->first(['nome', 'descrizione', 'mq', 'prezzo', 'città']);
        $id_utente=Session::get('id');
        if($id_utente){
            $object[1]=$id_utente;
        }
        echo json_encode($object);
    }

    public function search($text, $pagina){
        if($text=='!'){
            $text='';
        }
        $results=Immobile::where('tipo', $pagina)->where('nome','like','%'.$text.'%')->get(['nome', 'immagine']);
        echo $results;
    }

    public function addPreferiti($index){
        if(Session::get('id')){
            $immobile=Immobile::where('nome', $index)->first();
            $id_immobile=$immobile->id;
            
            $ris=Utente::find(Session::get('id'))->preferiti()->wherePivot('immobile_id', $id_immobile)->get();
            $risultato=null;
            if(count($ris)!=0){
                $risultato="error";
            }
            else{
                Utente::find(Session::get('id'))->preferiti()->attach($id_immobile);
                $risultato="ok";
            }
            echo json_encode($risultato);
        }else{
            echo json_encode("error");
        }
    }

    public function removePreferiti($index){
        if(Session::get('id')){
            $immobile=Immobile::where('nome', $index)->first();
            $id_immobile=$immobile->id;
            
            $elemento=Utente::find(Session::get('id'))->preferiti()->wherePivot('immobile_id', $id_immobile)->first();
            $risultato=null;
            if($elemento){
                Utente::find(Session::get('id'))->preferiti()->detach($id_immobile);
                $risultato="ok";
            }
            else{
                $risultato="error";
            }
            echo json_encode($risultato);
        }else{
            echo json_encode("error");
        }
    }

    public function checkCitta($pagina){
        if(Session::get('id')){
            $ris=Utente::find(Session::get('id'))->preferiti()->where('tipo',$pagina)->get(['città']);
            echo $ris;
        }else{
            echo json_encode("error");
        }
    }

    public function affitta($index, $data_inizio, $data_fine){
        if(Session::get('id')){
            $immobile=Immobile::where('nome', $index)->first();
            $id_immobile=$immobile->id;
            
            try { 
                Utente::find(Session::get('id'))->affitti()->attach($id_immobile, ['data_inizio'=>$data_inizio, 'data_fine'=>$data_fine]);
            } catch(\Illuminate\Database\QueryException $ex){ 
                echo json_encode("error");
                exit;
            }
            echo json_encode("ok");
        }else{
            echo json_encode("error");
        }
    }

    public function token(){
        if(Session::get('id')){
            //$client_id=env("client_id_amadeus2");
            //$client_secret=env("client_secret_amadeus2");
            $client_id="WcoA3EPYVPOxXptWsXj79Q3Mkaku1oNq";
            $client_secret="BffGHSlaqQS5OkQI";
            $endpoint="https://test.api.amadeus.com";
            $real_endpoint=$endpoint."/v1/security/oauth2/token";
            
            $curl=curl_init();
            curl_setopt($curl, CURLOPT_URL, $real_endpoint);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials&client_id=".$client_id."&client_secret=".$client_secret);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            $header=array("Content-Type:application/x-www-form-urlencoded");
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result=curl_exec($curl);
            echo $result;
            curl_close($curl);
        }else{
            echo json_encode("error");
        }
    }

    public function Amadeus($city, $token){
        if(Session::get('id')){
            $object=array();
	
            $endpoint="https://test.api.amadeus.com";
            $curl=curl_init();
            $dati=array("cityCode"=>$city);
            $dati=http_build_query($dati);
            $real_endpoint=$endpoint."/v2/shopping/hotel-offers?".$dati;
            curl_setopt($curl, CURLOPT_URL, $real_endpoint);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            $header=array('Authorization:Bearer '.$token);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            //curl_setopt($curl, CURLOPT_CERTINFO, true);
            //curl_setopt($curl, CURLOPT_VERBOSE, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $object[0]=$city;
            $object[1]=json_decode(curl_exec($curl));
            echo json_encode($object);
            curl_close($curl);
        }else{
            echo json_encode("error");
        }
    }

    public function pexels($testo){
        $key_img=env("Api_key_Pexels");
	    $img_endpoint="https://api.pexels.com/v1";

        $curl=curl_init();
        $dati=array("query"=>$testo);
        $dati=http_build_query($dati);
        $img_request=$img_endpoint."/search?query=".$dati;
        
        curl_setopt($curl, CURLOPT_URL, $img_request);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $header=array('Authorization: '.$key_img);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result=curl_exec($curl);
        echo $result;
        curl_close($curl);
    }
	
}

?>