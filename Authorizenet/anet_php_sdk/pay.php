
<!-- <form method="POST" action="https://test.authorize.net/gateway/transact.dll" id="bookingCheckoutForm" name="bookingCheckoutForm">
    <input type="hidden" name="x_address" value="Street 30" >
    <input type="hidden" name="x_amount" value="5" >
    <input type="hidden" name="x_city" value="City" >
    <input type="hidden" name="x_country" value="AZ" >
    <input type="hidden" name="x_customer_ip" value="186.11.211.55" >
    <input type="hidden" name="x_description" value="Sale" >
    <input type="hidden" name="x_delim_data" value="TRUE" >
    <input type="hidden" name="x_email" value="x@x.com" >
    <input type="hidden" name="x_email_customer" value="true" >
    <input type="hidden" name="x_first_name" value="Kaladar" >
    <input type="hidden" name="x_fp_hash" value="c165d395e93a70c3aae340e583589b75" >
    <input type="hidden" name="x_fp_sequence" value="91320809589" >
    <input type="hidden" name="x_fp_timestamp" value="1320809589" >
    <input type="hidden" name="x_invoice_num" value="9" >
    <input type="hidden" name="x_last_name" value="Doe" >
    <input type="hidden" name="x_login" value="242CF9n95j9" >
    <input type="hidden" name="x_method" value="cc" >
    <input type="hidden" name="x_phone" value="558590" >
    <input type="hidden" name="x_po_num" value="9" >
    <input type="hidden" name="x_receipt_link_method" value="LINK" >
    <input type="hidden" name="x_receipt_link_url" value="https://www.google.com" >
    <input type="hidden" name="x_relay_response" value="TRUE" >
    <input type="hidden" name="x_relay_url" value="https://www.google.com" >
    <input type="hidden" name="x_show_form" value="payment_form" >
    <input type="hidden" name="x_version" value="3.1" >
    <input type="hidden" name="x_zip" value="101" >
    <input type="hidden" name="x_delim_char" value="," >
    <input type="submit" name="submit_b" value="Buy now" >
</form> -->

<?php 

/*Template Name: payment*/
if(!empty($_POST['buy'])){
require_once ('AuthorizeNet.php');
$api_login_id = '4x696GaEj';
$transaction_key = '76474B5tbHhb9TAL';
$amount = 12;
$fp_sequence  = 'ecarobar.com'.time();
$fp_timestamp  = time();
 // $fingerprint = AuthorizeNetSIM_Form::getFingerprint($api_login_id, $transaction_key, $amount, $fp_sequence, $fp_timestamp);

    $transaction = new AuthorizeNetAIM ($api_login_id, $transaction_key);
    $amount = '9.99';
    $card_num = '4007000000027';
    $exp_date = '10/16';
     
    $response = $transaction->authorizeAndCapture ($amount,$card_num,$exp_date);
     
    if ($response->approved)
    {
      echo "<h1>Success! The test credit card has been charged!</h1>";
      echo "Transaction ID: " . $response->transaction_id;
    } else {
      echo $response->error_message;
    }
    die();
}

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>

<!-- If you're using Stripe for payments -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<div class="container">
    <div class="row">
        <!-- You can make it whatever width you want. I'm making it full width
             on <= small devices and 4/12 page width on >= medium devices -->
        <div class="col-xs-12 col-md-6 col-md-offset-3">
        
        
            <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
                    <form role="form" id="payment-form" method="POST" action="">
                        <div class="row">
                            <input id="x_test_request" name="x_test_request" type="hidden" value="FALSE" />
<input id="x_show_form" name="x_show_form" type="hidden" value="PAYMENT_FORM" />
<input id="x_relay_url" name="x_relay_url" type="hidden" value="http://signmykidup.com/payments/payment_complete" />
<input id="x_type" name="x_type" type="hidden" value="AUTH_CAPTURE" />
<input id="x_version" name="x_version" type="hidden" value="3.1" />
<input id="x_delim_data" name="x_delim_data" type="hidden" value="FALSE" />
<input id="x_relay_response" name="x_relay_response" type="hidden" value="TRUE" />
<input id="x_login" name="x_login" type="hidden" value="4x696GaEj" />
<input id="x_fp_hash" name="x_fp_hash" type="hidden" value="<?php echo $fingerprint;?>" />
<input id="x_fp_sequence" name="x_fp_sequence" type="hidden" value="<?php echo $fp_sequence;?>" />
<input id="x_fp_timestamp" name="x_fp_timestamp" type="hidden" value="<?php echo $fp_timestamp;?>" />
<input id="x_amount" name="x_amount" type="hidden" value="<?php echo $amount;?>" />
<INPUT TYPE=HIDDEN NAME="x_email" VALUE="s@s.com">
<INPUT TYPE=HIDDEN NAME="x_first_name" VALUE="Test">
<INPUT TYPE=HIDDEN NAME="x_last_name" VALUE="test">
<INPUT TYPE=HIDDEN NAME="x_address" VALUE="asasasa">
<INPUT TYPE=HIDDEN NAME="x_city" VALUE="adas">
<INPUT TYPE=HIDDEN NAME="x_state" VALUE="Alabama">
<INPUT TYPE=HIDDEN NAME="x_zip" VALUE="343434">
<INPUT TYPE=HIDDEN NAME="x_country" VALUE="USA">
<INPUT TYPE=HIDDEN NAME="x_phone" VALUE="344-456-4322">
<INPUT TYPE=HIDDEN NAME="x_program_name" VALUE="Seaside Nursery School">
<INPUT TYPE=HIDDEN NAME="x_user" VALUE="62">
<INPUT TYPE=HIDDEN NAME="x_description" VALUE="Seaside Nursery School registration">
<input TYPE=HIDDEN NAME="x_kid_program_id[]" value="198">
<INPUT TYPE=HIDDEN NAME="x_relay_url" VALUE="http://signmykidup.com/payments/payment_complete">
<INPUT TYPE=HIDDEN NAME="x_relay_response" VALUE="TRUE">
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cardNumber"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control" 
                                        name="cardExpiry"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode">COUPON CODE</label>
                                    <input type="text" class="form-control" name="couponCode" />
                                </div>
                            </div>                        
                        </div>
                       
                        <div class="row">
                             <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Billing Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                        
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control" 
                                        name="cardExpiry"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CV CODE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cardCVC"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                    />
                                </div>
                            </div>
                       


                        </div>

                         <div class="row">
                            <div class="col-xs-12">
                                <input type="submit" name="buy" value="Pay Now" class="subscribe btn btn-success btn-lg btn-block">
                                
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
            <!-- CREDIT CARD FORM ENDS HERE -->
            
            
        </div>            
        
      
        
    </div>
</div>

