<?php
extract($_GET);
$valor = $_GET['quant'];
$editado = explode(",", $valor);
$novoValor = $editado[0];

$total = 0;

	$total = $total + $novoValor * 2;


function buyCreditos($name, $total){
	$json = file_get_contents('../db.json');
	$data = json_decode($json, true);
	foreach ($data['usuarios'] as $key => $obj) {
		if ($obj[$key]['user'] == $name ) {
			//$obj[$key]['credito'] = "10";
			//echo json_encode($obj);
			//file_put_contents('db.json', json_encode($obj));
			$data['usuarios'][0][$key]['credito'] = $total;
			echo json_encode($data);
			file_put_contents('db.json', json_encode($data));
		
		}else{

			echo "Usário não encontrado!";
		}
	}
}
buyCreditos("toxity", $total);

?>