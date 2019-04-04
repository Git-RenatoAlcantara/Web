<?php 
  require __DIR__  . '/vendor/autoload.php';


   MercadoPago\SDK::setAccessToken("TEST-6900356404028598-040315-43c136599be444843bd7e72a093449e5-422837681"); // On Sandbox


    //...
    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = 198;
    $payment->token = $_POST['token'];
    $payment->description = "Ergonomic Plastic Car";
    $payment->installments = 1;
    $payment->payment_method_id = $_POST['paymentMethodId'];
    $payment->payer = array(
    "email" => "brennon@yahoo.com"
    );
   
    $payment->save();
    //...
    // Print the payment status
    echo $payment->status;
    //...
 
?>