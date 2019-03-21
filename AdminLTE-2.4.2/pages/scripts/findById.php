<?php
error_reporting(0);
function findById($id){
  if(file_get_contents('../../db.json')){
    $json = file_get_contents('../../db.json');
  }elseif ($json = file_get_contents('../db.json')) {
    $json = file_get_contents('../db.json');
  }
  //$data = json_decode($json, true);
  $data = json_decode($json, true);
  if ($data['usuarios']){
    
    foreach ($data['usuarios'][0] as $key => $obj) {
      //print_r($data['usuarios'][0][$key]['id']);
      
      if ($data['usuarios'][0][$key]['id'] == $id) {
        return $data['usuarios'][0][$key]['user'];
      
      }else{

      	return false;
      }


    }

  }else{
    
    echo "[]";
  }

}

?>
