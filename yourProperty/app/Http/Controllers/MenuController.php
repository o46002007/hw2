<?php

use Illuminate\Routing\Controller as BaseController;

class MenuController extends BaseController{
	public function menu(){
        if(session('id')!=null){
			echo json_encode("ok");
            exit;
		}else{
			echo json_encode("nook");
		    exit;
        }
    }
}

?>