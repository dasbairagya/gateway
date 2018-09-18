<?php
/*Template Name: Request*/
get_header();
include 'connection.php';

?>
<div class="contaciner">
	<div class="row">
<?php	
$type = $_GET['type'];
$item_number = $_GET['item_number']; 
$txn_id = $_GET['Trasaction_ID'];
$payment_gross = $_GET['AMT'];
$currency_code = $_GET['CURRENCY_CODE'];
$payment_status = $_GET['PAYMENT_STATUS'];
if($type == 'success') {
    
		// if(!empty($txn_id)){
		if(1==1){
			//Check if payment data exists with the same TXN ID.
		    $prevPaymentResult = $db->query("SELECT payment_id FROM payments WHERE txn_id = '".$txn_id."'");

		    if($prevPaymentResult->num_rows > 0){
		        $paymentRow = $prevPaymentResult->fetch_assoc();
		        $last_insert_id = $paymentRow['payment_id'];
		    }else{
		        //Insert tansaction data into the database
		        $insert = $db->query("INSERT INTO payments(item_number,txn_id,payment_gross,currency_code,payment_status) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')");
		        $last_insert_id = $db->insert_id;
		    }
			?>
			<div class="col-md-8 col-md-offset-2">
				<div class="panel-group">
				    <div class="panel panel-success">
				      <div class="panel-heading">Success!</div>
				      <div class="panel-body"><h1>Your payment has been successful.</h1><h1>Your Payment ID - <?php echo $last_insert_id; ?>.</h1>
				      </div>
			        </div>
				</div>
			</div>
					
		<?php
		}
		else{
			echo'<div class="col-md-8 col-md-offset-2">
					<div class="panel-group">
					  <div class="panel panel-primary">
					      <div class="panel-heading">Invalid!</div>
					      <div class="panel-body"><h1>Your payment has failed due to invalid transaction Id.</h1></div>
					   </div>
					</div>
				</div>';		   
		    }
} 
 
elseif($type == 'cancel') {
	echo'<div class="col-md-8 col-md-offset-2">
			<div class="panel-group">
			  <div class="panel panel-danger">
			      <div class="panel-heading">Cancle</div>
			      <div class="panel-body"><h1>Payment Canceled</h1></div>
	    	  </div>
			</div>
		</div>';

}
else { ?>
	<div class="col-md-8 col-md-offset-2">
		<div class="panel-group">
		  <div class="panel panel-primary">
		      <div class="panel-heading">Oops!</div>
		      <div class="panel-body">Some thing went wrong. Please try again.</div>
		  </div>
		</div>
	</div>
<?php } ?>
	</div>
</div>
<?php
get_footer();
?>