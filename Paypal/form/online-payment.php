<?php 
/*Template Name: Payment*/
get_header();
//Set useful variables for paypal form
$paypal_link = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_username = 'lijoekt-facilitator@gmail.com'; //Business Email
?>
				<!-- Page -->
					<div id="page" class="container">
						<div class="content-area">
							<h1 class="page-title">Online Payment</h1>
							<div class="query-form">
							    <form action="<?php echo $paypal_link; ?>" method="post">

							     <input type="hidden" name="business" value="<?php echo $paypal_username; ?>">
								    <input type="hidden" name="cmd" value="_xclick">
								    <input type="hidden" name="credits" value="510">
								    <input type="hidden" name="userid" value="1">
								    <input type="hidden" name="cpp_header_image" value="">
								    <input type="hidden" name="no_shipping" value="1">
								    <input type="hidden" name="handling" value="0">
								    <input type="hidden" name="amount" value="15.00">
								    <input type="hidden" name="cancel_return" value="<?php echo site_url();?>/request?type=cancel">
								    <input type="hidden" name="return" value="<?php echo site_url();?>/request?type=success">

									<div class="form-group">
										<label>Select your Service</label>
										<select class="form-control" name="service" id="service">
											<option>--Select Service--</option>
											<option value="Resume Service">Resume Service</option>
											<option value="Study in Australia">Study in Australia</option>
											<option value="Jobs in Australia">Jobs in Australia</option>
											<option value="Migration Services">Migration Services</option>
											<option value="Vision Australia">Vision Australia</option>
											<option value="Information Technology Service">Information Technology Service</option>
											<option value="Other Service">Other Service</option>
										</select>
									</div>
									<div class="form-group" id="otherService">
										<label>Service Name</label>
										<input type="text" class="form-control" name="otherService">
									</div>
									<div class="form-group">
										<label>First Name</label>
										<input type="text" class="form-control" name="first_name" required>
									</div>
									<div class="form-group">
										<label>Last Name</label>
										<input type="text" class="form-control" name="last_name" required>
									</div>
									<div class="form-group">
										<label>Mobile Number</label>
										<input type="tel" class="form-control" name="mobile" required>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" name="email" required>
									</div>
									<div class="form-group">
										<label>Comment</label>
										<textarea class="form-control" name="comment"></textarea>
									</div>
									<div class="form-group">
										<input type="submit" class="btn-apply" name="submit" value="Checkout">
									</div>
								</form>	
							</div>
						</div>
					</div>
				<!-- /Page -->
				<script type="text/javascript">
					jQuery("#service").change(function(){
						if(this.value == "Other Service"){
							jQuery("#otherService").show();
						}
						else{
							jQuery("#otherService").hide();
						}

					});
				</script>

<?php get_footer();?>