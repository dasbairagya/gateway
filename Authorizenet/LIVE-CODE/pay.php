<?php

/*Template Name: Pay */
// http://info.webtoolhub.com/kb-a483-how-to-integrate-authorize-net-aim-using-php.aspx
require 'vendor/autoload.php';

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

define("AUTHORIZENET_LOG_FILE", "phplog");

if(!empty($_POST['cardNumber'])){

session_unset();

session_destroy(); 
    session_start();


    $mode                        = $_POST['mode'];
    $_SESSION['mode']            = $mode ;
    $va_trip                     = $_POST['trip'];
    $_SESSION['trip']            =  $va_trip;
    
    $va_pickup_address           = $_POST['pickup-address'];
    $_SESSION['pickup-address']  = $va_pickup_address;
    
    $va_dropoff_address          = $_POST['dropoff-address'];
    $_SESSION['dropoff-address'] = $va_dropoff_address;
    
    $va_vehicle                  = $_POST['vehicle'];
    $_SESSION['vehicle']         = $va_vehicle;
    
    $va_pickup_date              = $_POST['pickup-date'];
    $_SESSION['pickup-date']     = $va_pickup_date;
    
    $va_time                     = $_POST['time'];
    $_SESSION['time']            = $va_time;

    $va_min                      = $_POST['min'];
    $_SESSION['min']             = $va_min;
    
    $va_passenger                = $_POST['passenger'];
    $_SESSION['passenger']       = $va_passenger;
    
    $va_bags                     = $_POST['bags'];
    $_SESSION['bags']            = $va_bags;
    
    $va_first_name               = $_POST['first-name'];
    $_SESSION['first-name']      = $va_first_name;
    
    $va_last_name                = $_POST['last-name'];
    $_SESSION['last-name']       = $va_last_name;
    
    $va_email_address            = $_POST['email-address'];
    $_SESSION['email-address']   = $va_email_address;
    
    $va_phone_number             = $_POST['phone-number'];
    $_SESSION['phone-number']    = $va_phone_number;
    
    $va_info                     = $_POST['info'];
    $_SESSION['info']            = $va_info;
    
    $va_price                    = $_POST['price'];
    $_SESSION['price']           = $va_price;

    $va_tip                      = $_POST['tip'];
    $_SESSION['tip']             = $va_tip;

    $va_total_price              = $_POST['total_price'];
    $_SESSION['total_price']     = $va_total_price;

    // --------------Billing Details-----------------

    $va_city                     = $_POST['city'];
    $_SESSION['city']            = $va_city;
    $va_state                    = $_POST['state'];
    $_SESSION['state']           = $va_state;
    $va_country                  = $_POST['country'];
    $_SESSION['country']         = $va_country;
    $va_zip                      = $_POST['zip'];
    $_SESSION['zip']             = $va_zip;
              
}


function chargeCreditCard($amount) {

    $cardWoner                   = $_POST['cardWoner'];
    $cardNumber                  = $_POST['cardNumber'];
    $cardNumber                  = str_replace(' ', '', $cardNumber);
    $cardExpiryMonth             = $_POST['cardExpiryMonth'];
    $cardExpiryYear              = $_POST['cardExpiryYear'];
    $cardExpiry                  = $cardExpiryMonth.$cardExpiryYear;
    $cardCVC                     = $_POST['cardCVC'];
   // var_dump($_POST);
   // echo 'card=>'.$cardNumber;
   // echo 'expiry=>'.$cardExpiry;
   // die;
    // Common setup for API credentials
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(\SampleCode\Constants::MERCHANT_LOGIN_ID);
    $merchantAuthentication->setTransactionKey(\SampleCode\Constants::MERCHANT_TRANSACTION_KEY);
    $refId = 'ref' . time();

    // Create the payment data for a credit card
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($cardNumber);//"4111111111111111"
    $creditCard->setExpirationDate($cardExpiry);//"1226"
    $creditCard->setCardCode($cardCVC);//"123" 
    // $creditCard->setCardNumber("4111111111111111");
    // $creditCard->setExpirationDate("1226");
    // $creditCard->setCardCode("123");


    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);

    $order = new AnetAPI\OrderType();
    $order->setDescription("New Item");


    //create a transaction
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authCaptureTransaction");
    $transactionRequestType->setAmount($amount);
    $transactionRequestType->setOrder($order);
    $transactionRequestType->setPayment($paymentOne);

    //Preparing customer information object
    $cust = new AnetAPI\CustomerAddressType();
    $cust->setFirstName($_POST['fname']);
    $cust->setLastName($_POST['lname']);
    //$cust->setAddress($_POST['address']);
    $cust->setCity($_POST['city']);
    $cust->setState($_POST['state']);
    $cust->setCountry($_POST['country']);
    $cust->setZip($_POST['zip']);
    $cust->setPhoneNumber($_POST['phone']);
    $cust->setEmail($_POST['email-address']);

    $transactionRequestType->setBillTo($cust);


    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId($refId);
    $request->setTransactionRequest($transactionRequestType);
    $controller = new AnetController\CreateTransactionController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);


    if ($response != null) {
        if ($response->getMessages()->getResultCode() == \SampleCode\Constants::RESPONSE_OK) {
            $tresponse = $response->getTransactionResponse();

            if ($tresponse != null && $tresponse->getMessages() != null) {
                // echo " Transaction Response code : " . $tresponse->getResponseCode() . "\n";
                // echo "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n";
                // echo "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
                // echo " Code : " . $tresponse->getMessages()[0]->getCode() . "\n";
                // echo " Description : " . $tresponse->getMessages()[0]->getDescription() . "\n";
                
                $query = array(
                'response_code' => $tresponse->getResponseCode(), 
                'auth_code' => $tresponse->getAuthCode(),
                'tranx_id' =>  $tresponse->getTransId(), 
                'code' =>  $tresponse->getMessages()[0]->getCode() , 
                'desc' =>  $tresponse->getMessages()[0]->getDescription(),
                'error' => false
                );

                
            } else {
                //echo "Transaction Failed \n";
                if ($tresponse->getErrors() != null) {

                    // echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                    // echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                    $error_code = $tresponse->getErrors()[0]->getErrorCode();
                    $error_message = $tresponse->getErrors()[0]->getErrorText();

                }
                $query = array(
                'response_code' => $error_code, 
                'desc' =>  $error_message,
                'error' => true
                );


            }
        } else {
            //echo "Transaction Failed \n";
            $tresponse = $response->getTransactionResponse();
            if ($tresponse != null && $tresponse->getErrors() != null) {
                // echo " Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n";
                // echo " Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";

                $error_code = $tresponse->getErrors()[0]->getErrorCode(); 
                $error_message = $tresponse->getErrors()[0]->getErrorText();


            } else {
                // echo " Error code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n";
                // echo " Error message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
                $error_code = $response->getMessages()->getMessage()[0]->getCode();
                $error_message = $response->getMessages()->getMessage()[0]->getText();
            }
            $query = array(
                'response_code' => $error_code, 
                'desc' =>  $error_message,
                'error' => true
                );

        }
    } else {
            $query = array(
                'response_code' => null, 
                'desc' =>  'No response returned',
                'error' => true
                );
        //echo "No response returned \n";
    }
$query = http_build_query($query);
// header("Location: https://veteransairporter.com/step4/?$query");
header("Location: http://localhost/veteransairporter/step4/?$query");
    //return $response;
}

$amount = \SampleCode\Constants::SAMPLE_AMOUNT;
if (!empty($_POST['cardNumber']))
    $amount = $_POST['total_price'];
$amount = 10;

if (!defined('DONT_RUN_SAMPLES'))
 chargeCreditCard($amount);

?>
