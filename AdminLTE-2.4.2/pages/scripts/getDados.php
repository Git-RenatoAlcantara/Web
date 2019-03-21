<?php
function getDados($id){
  $json = file_get_contents('../db.json');
  //$data = json_decode($json, true);
  $data = json_decode($json, true);
if ($data['usuarios']){
    
    foreach ($data['usuarios'][0] as $key => $obj) {
      //print_r($data['usuarios'][0][$key]);
      
      if ($data['usuarios'][0][$key]['id'] == $id) {
       //echo $data['usuarios'][0][$key]['user'];
        $usuario = $data['usuarios'][0][$key]['user'];
        $creditos = $data['usuarios'][0][$key]['credito'];
        return $usuario.'|'.$creditos.'';
      }

    }

  }else{
    
    echo "[]";
  }
}
?>