<?php 
/*Template Name: Step 4 */
get_header();
global $wpdb;
// var_dump($_POST);
// var_dump($_SESSION);
// die;

 $user_id            = get_current_user_id();
 $unique_id          = rand( 1000, 10000 );
 $order_date         = date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) ); 
if(isset($_REQUEST['response_code'])){
	$response_code   =  $_REQUEST['response_code'];
}
else{
	$response_code = '';
}
if(isset($_REQUEST['response_code'])){
	$auth_code       =  $_REQUEST['response_code'];
}
if(isset( $_REQUEST['tranx_id'] ) && $_REQUEST['tranx_id'] != null ){
	$tranx_id        =  $_REQUEST['tranx_id'];
}else{
	$tranx_id        = 'XXXXXXXX';
}
if(isset($_REQUEST['code'])){
	$code            =  $_REQUEST['code'];
}
if(isset($_REQUEST['desc'])){
	$desc            =  $_REQUEST['desc'];
}else{
	$desc ='';
}
if(isset($_REQUEST['error'])){
	$error          = $_REQUEST['error'];
}else{
	$error = '';
}
$va_trip            = $_SESSION['trip'];
$va_pickup_address  = $_SESSION['pickup-address'];
$va_dropoff_address = $_SESSION['dropoff-address'];
$va_vehicle         = $_SESSION['vehicle'];
$va_pickup_date     = $_SESSION['pickup-date'];
$va_time            = $_SESSION['time'];
$va_min             = $_SESSION['min'];
$va_passenger       = $_SESSION['passenger'];
$va_bags            = $_SESSION['bags'];
$va_first_name      = $_SESSION['first-name'];
$va_last_name       = $_SESSION['last-name'];
$va_email_address   = $_SESSION['email-address'];
$va_phone_number    = $_SESSION['phone-number'];
$va_info            = $_SESSION['info'];
$va_price           = $_SESSION['price'];
$va_total_price     = $_SESSION['total_price'];
$va_tip             = $_SESSION['tip'];

    // --------------Billing Details-----------------

    $va_city        = (isset($_SESSION['city'])) ? $_SESSION['city'] : $_POST['city'];
    $va_state       = (isset($_SESSION['state'])) ? $_SESSION['state'] : $_POST['state'];
    $va_country     = (isset($_SESSION['country'])) ? $_SESSION['country'] : $_POST['country'];
    $va_zip         = (isset($_SESSION['zip'])) ? $_SESSION['zip'] : $_POST['zip'];
    $va_mode        = (isset($_SESSION['mode'])) ? $_SESSION['mode'] : $_POST['mode'];



// --------------------------query string data-------------------

// store the billing details too
// if($response_code!='' && $tranx_id != null){
              $wpdb->insert( 
              'my_order', 
	              array( 
	                'order_id' => $user_id.$unique_id, 
	                'user_id' => $user_id, 
	                'type' => $va_trip, 
	                'cab_name' => $va_vehicle, 
	                'price' => $va_total_price, 
	                'tip' => $va_tip, 
	                'trx_id' => $tranx_id, 
	                'email' => $va_email_address, 
	                'fname' => $va_first_name, 
	                'lname' => $va_last_name, 
	                'phone' => $va_phone_number, 
	                'passenger' => $va_passenger,
	                'bag' => $va_bags,
	                'booking_date' => $order_date,
	                'status' => 'pending',
	                'pic_loc' => $va_pickup_address,
	                'drop_loc' => $va_dropoff_address,
	                'reserved_date' => $va_pickup_date,
	                'min' => $va_min,
	                'time' => $va_time,
	                'description' => $va_info,
	                'response' => $desc,
	                'response_code' => $error,
	                'mode' => $va_mode,
	                'city' => $va_city,
	                'state' => $va_state,
	                'country' => $va_country,
	                'zip' => $va_zip,
	              ), 
	              array( 
	                '%d', 
	                '%d', 
	                '%s', 
	                '%s', 
	                '%d', 
	                '%d', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%d', 
	                '%d', 
	                '%d', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	                '%s', 
	              ) 
            );
       // }//end if
 

if(isset($error) && $error==false ){
if(isset($_SESSION['price']) && $_SESSION['price']!=''){
              
$form_email   = $va_email_address;
$admin_email = 'info@veteransairporter.com';
$headers="From:".$va_first_name."< ".$form_email. " >\r\n";
$headers .= "Reply-To:".$admin_email."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$to = $admin_email.','.$form_email;
$subject = $va_trip;
$message = '<html>
            <head></head> 
              <body>
              <h3 style="color: #004496;">Booking Enquiry Details :</h3>

                <p><b>Service:</b> '.$va_trip.' </p>
                <p><b>From: </b>'.$va_first_name.' </p>
                <p><b>Pick Up Address:</b> '.$va_pickup_address.' </p>
                <p><b>Drop Off Address:</b> '.$va_dropoff_address.' </p>
                <p><b>Day:</b> '.$va_pickup_date.' </p>
                <p><b>Pick Up Time:</b> '.$va_time.' </p>
                <p><b>Vehicle:</b> '.$va_vehicle.' </p>
                <p><b>No of Passengers:</b> '.$va_passenger.' </p>
                <p><b>Bags:</b> '.$va_bags.' </p>
                <p><b>Name:</b> '.$va_first_name.' </p>
                <p><b>Email:</b> '.$va_email_address.' </p>
                <p><b>Phone:</b> '.$va_phone_number.' </p>
                <p><b>Additional Information:</b> '.$va_info.' </p>';
                

$message .='<br /> <center style="color:blue;"> © 2018 veteransairporter.com | All rights reserved.</center>
</body></html>';
mail($to,$subject,$message,$headers);
          //    if(){
          //   echo 'Your message has been sent successfully!';
          // }
          // else{
          //   echo 'Server error';
          // }
        }
        else{
         echo 'Opps! Something went wrong.';
        }
?>


	
		<div id="page-header">
			<h1>Booking Step 4</h1>
			<div class="title-block3"></div>
			<p><a href="#">Home</a><i class="fa fa-angle-right"></i>Booking Step 4</p>
		</div>
		
		<!-- BEGIN .content-wrapper-outer -->
		<div class="content-wrapper-outer clearfix">
			
			<!-- BEGIN .main-content -->
			<div class="main-content main-content-full">
				
				<!-- BEGIN .booking-step-wrapper -->
				<div class="booking-step-wrapper clearfix">

					<div class="step-wrapper clearfix">
						<div class="step-icon-wrapper">
							<div class="step-icon">1.</div>
						</div>
						<div class="step-title">Trip Details</div>
					</div>

					<div class="step-wrapper clearfix">
						<div class="step-icon-wrapper">
							<div class="step-icon">2.</div>
						</div>
						<div class="step-title">Select Vehicle</div>
					</div>

					<div class="step-wrapper clearfix">
						<div class="step-icon-wrapper">
							<div class="step-icon">3.</div>
						</div>
						<div class="step-title">Enter Payment Details</div>
					</div>

					<div class="step-wrapper qns-last clearfix">
						<div class="step-icon-wrapper">
							<div class="step-icon step-icon-current">4.</div>
						</div>
						<div class="step-title">Confirmation</div>
					</div>

					<div class="step-line"></div>

				<!-- END .booking-step-wrapper -->
				</div>
				
				<!-- BEGIN .full-booking-wrapper -->
				<div class="full-booking-wrapper full-booking-wrapper-3 clearfix">
					
					<h4>Booking Successful</h4>
					<div class="title-block7"></div>
					
					<p>Your booking has been placed successfully, details of your booking will be emailed to you shortly, if you have any questions please do not hesitate to get in touch through the contact page or by phone.</p>
					
					<hr class="space7" />
					
					<h4>Trip Details</h4>
					<div class="title-block7"></div>
					
					<!-- BEGIN .clearfix -->
					<div class="clearfix">
						
						<!-- BEGIN .qns-one-half -->
						<div class="qns-one-half">
						
							<p class="clearfix"><strong>Service:</strong> <span><?php echo $va_trip;?></span></p>
							<p class="clearfix"><strong>From:</strong> <span><?php echo $va_pickup_address;?></span></p>
							<p class="clearfix"><strong>To:</strong> <span><?php echo $va_dropoff_address;?></span></p>
							<p class="clearfix"><strong>Vehicle:</strong> <span><?php echo $va_vehicle; ?></span></p>
						
						<!-- END .qns-one-half -->
						</div>
						
						<!-- BEGIN .qns-one-half -->
						<div class="qns-one-half last-col">
						
							<p class="clearfix"><strong>Date:</strong> <span><?php echo $va_pickup_date;?></span></p>
							<p class="clearfix"><strong>Day:</strong> <span>Calculation required</span></p>
							<p class="clearfix"><strong>Pick Up Time:</strong> <span><?php echo $va_time;?> &nbsp; <?php echo $va_min;?></span></p>
							<p class="clearfix"><strong>Route Estimate:</strong> <span><a href="#" data-gal="prettyPhoto[gallery]" class="view-map-button">View Map</a></span></p>
						
						<!-- END .qns-one-half -->
						</div>
						
					<!-- END .clearfix -->
					</div>
					
					<hr class="space2" />
					
					<h4>Passengers Details</h4>
					<div class="title-block7"></div>
					
					<!-- BEGIN .clearfix -->
					<div class="clearfix">
						
						<!-- BEGIN .passenger-details-wrapper -->
						<div class="passenger-details-wrapper">
						
							<!-- BEGIN .clearfix -->
							<div class="clearfix">

								<!-- BEGIN .passenger-details-half -->
								<div class="passenger-details-half">

									<p class="clearfix"><strong>Passengers:</strong> <span><?php echo $va_passenger;?></span></p>
									<p class="clearfix"><strong>Bags:</strong> <span><?php echo $va_bags;?></span></p>

								<!-- END .passenger-details-half -->
								</div>

								<!-- BEGIN .passenger-details-half -->
								<div class="passenger-details-half last-col">

									<p class="clearfix"><strong>Name:</strong> <span><?php echo $va_first_name.''.$va_last_name;?></span></p>
									<p class="clearfix"><strong>Email:</strong> <span><?php echo $va_email_address;?></span></p>
									<p class="clearfix"><strong>Phone:</strong> <span><?php echo $va_phone_number;?></span></p>
									
								<!-- END .passenger-details-half -->
								</div>

							<!-- END .clearfix -->
							</div>
							
						<!-- END .passenger-details-wrapper -->
						</div>
						
						<!-- BEGIN .passenger-details-wrapper -->
						<div class="passenger-details-wrapper additional-information-wrapper last-col">
						
							<p class="clearfix"><strong>Additional Information:</strong> <span><?php echo $va_info;?>  </span></p>
						
						<!-- END .passenger-details-wrapper -->
						</div>
						
					<!-- END .clearfix -->
					</div>			


					<hr class="space2" />
					
					<h4>Billing Details</h4>
					<div class="title-block7"></div>
					
					<!-- BEGIN .clearfix -->
					<div class="clearfix">
						
						<!-- BEGIN .passenger-details-wrapper -->
						<div class="passenger-details-wrapper">
						
							<!-- BEGIN .clearfix -->
							<div class="clearfix">

								<!-- BEGIN .passenger-details-half -->
								<div class="passenger-details-half">

									<p class="clearfix"><strong>Country:</strong> <span><?php echo $va_country;?></span></p>
									<p class="clearfix"><strong>State:</strong> <span><?php echo $va_state;?></span></p>

								<!-- END .passenger-details-half -->
								</div>

								<!-- BEGIN .passenger-details-half -->
								<div class="passenger-details-half last-col">

									<p class="clearfix"><strong>City:</strong> <span><?php echo $va_city;?></span></p>
									<p class="clearfix"><strong>Zip:</strong> <span><?php echo $va_zip;?></span></p>
									
									
								<!-- END .passenger-details-half -->
								</div>

							<!-- END .clearfix -->
							</div>
							
						<!-- END .passenger-details-wrapper -->
						</div>
						
						
						
					<!-- END .clearfix -->
					</div>
					
				<!-- END .full-booking-wrapper -->
				</div>
				
			<!-- END .main-content -->
			</div>
		
		<!-- END .content-wrapper-outer -->
		</div>


<?php } else{ ?>

<div id="page-header">
			<h1>Booking Step 4</h1>
			<div class="title-block3"></div>
			<p><a href="#">Home</a><i class="fa fa-angle-right"></i>Booking Step 4</p>
		</div>
		
		<!-- BEGIN .content-wrapper-outer -->
		<div class="content-wrapper-outer clearfix">
			
			<!-- BEGIN .main-content -->
			<div class="main-content main-content-full">
				
				<!-- BEGIN .booking-step-wrapper -->
				<div class="booking-step-wrapper clearfix">

					<div class="step-wrapper clearfix">
						<div class="step-icon-wrapper">
							<div class="step-icon">1.</div>
						</div>
						<div class="step-title">Trip Details</div>
					</div>

					<div class="step-wrapper clearfix">
						<div class="step-icon-wrapper">
							<div class="step-icon">2.</div>
						</div>
						<div class="step-title">Select Vehicle</div>
					</div>

					<div class="step-wrapper clearfix">
						<div class="step-icon-wrapper">
							<div class="step-icon">3.</div>
						</div>
						<div class="step-title">Enter Payment Details</div>
					</div>

					<div class="step-wrapper qns-last clearfix">
						<div class="step-icon-wrapper">
							<div class="step-icon step-icon-current">4.</div>
						</div>
						<div class="step-title">Confirmation</div>
					</div>

					<div class="step-line"></div>

				<!-- END .booking-step-wrapper -->
				</div>
				<div class="full-booking-wrapper full-booking-wrapper-3 clearfix">
					
					<h4>Transaction Failed !</h4>
					<div class="title-block7"></div>
					
					<p><?php if(isset($desc)) echo $desc;?></p>
					
					<hr class="space7" />
				</div>
				</div>
				</div>

<?php 
    }
?>	
	
		
		
<?php 
session_unset();
session_destroy(); 
get_footer();?>