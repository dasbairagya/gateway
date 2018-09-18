<?php 
/*Template Name: Step 3 */
get_header();
// var_dump($_POST);
if(isset($_POST['tip']) && $_POST['tip'] != null){
$total_price = $_POST['price'] + $_POST['tip'];
}
else{
	$total_price = $_POST['price'];
}
?>
		

		<div id="page-header">
			<h1>Booking Step 3</h1>
			<div class="title-block3"></div>
			<p><a href="#">Home</a><i class="fa fa-angle-right"></i>Booking Step 3</p>
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
							<div class="step-icon step-icon-current">3.</div>
						</div>
						<div class="step-title">Enter Payment Details</div>
					</div>

					<div class="step-wrapper qns-last clearfix">
						<div class="step-icon-wrapper">
							<div class="step-icon">4.</div>
						</div>
						<div class="step-title">Confirmation</div>
					</div>

					<div class="step-line"></div>

				<!-- END .booking-step-wrapper -->
				</div>
				
				<!-- BEGIN .full-booking-wrapper -->
				<div class="full-booking-wrapper full-booking-wrapper-3 clearfix">
					
					<h4>Trip Details</h4>
					<div class="title-block7"></div>
					
					<!-- BEGIN .clearfix -->
					<div class="clearfix">
						
						<!-- BEGIN .qns-one-half -->
						<div class="qns-one-half">
						
							<p class="clearfix"><strong>Service:</strong> <span><?php echo $_POST['trip'];?></span></p>
							<p class="clearfix"><strong>From:</strong> <span><?php echo $_POST['pickup-address'];?></span></p>
							<p class="clearfix"><strong>To:</strong> <span><?php echo $_POST['dropoff-address'];?></span></p>
							<p class="clearfix"><strong>Vehicle:</strong> <span><?php echo $_POST['vehicle'];?></span></p>
						
						<!-- END .qns-one-half -->
						</div>
						
						<!-- BEGIN .qns-one-half -->
						<div class="qns-one-half last-col">
						
							<p class="clearfix"><strong>Date:</strong> <span><?php echo $_POST['pickup-date'];?></span></p>
							<p class="clearfix"><strong>Day:</strong> <span>Calculation required</span></p>
							<p class="clearfix"><strong>Pick Up Time:</strong> <span><?php echo $_POST['time'];?></span></p>
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

									<p class="clearfix"><strong>Passengers:</strong> <span><?php echo $_POST['passenger'];?></span></p>
									<p class="clearfix"><strong>Bags:</strong> <span><?php echo $_POST['bags'];?></span></p>

								<!-- END .passenger-details-half -->
								</div>

								<!-- BEGIN .passenger-details-half -->
								<div class="passenger-details-half last-col">

									<p class="clearfix"><strong>Name:</strong> <span><?php echo $_POST['first-name'].' '.$_POST['last-name'];?></span></p>
									<p class="clearfix"><strong>Email:</strong> <span><?php echo $_POST['email-address'];?></span></p>
									<p class="clearfix"><strong>Phone:</strong> <span><?php echo $_POST['phone-number'];?></span></p>
									
								<!-- END .passenger-details-half -->
								</div>

							<!-- END .clearfix -->
							</div>
							
						<!-- END .passenger-details-wrapper -->
						</div>
						
						<!-- BEGIN .passenger-details-wrapper -->
						<div class="passenger-details-wrapper additional-information-wrapper last-col">
						
							<p class="clearfix"><strong><?php echo $_POST['info'];?> </span></p>
						
						<!-- END .passenger-details-wrapper -->
						</div>
						
					<!-- END .clearfix -->
					</div>
					<form method="post" action="<?php echo site_url();?>/signin">
						<input type="hidden" name="trip" value="<?php echo $_POST['trip'];?>">
						<input type="hidden" name="pickup-address" value="<?php echo $_POST['pickup-address'];?>">
						<input type="hidden" name="dropoff-address" value="<?php echo $_POST['dropoff-address'];?>">
						<input type="hidden" name="pickup-date" value="<?php echo $_POST['pickup-date'];?>">
						<input type="hidden" name="time" value="<?php echo $_POST['time'];?>">
						<input type="hidden" name="min" value="<?php echo $_POST['min'];?>">
						<input type="hidden" name="vehicle" value="<?php echo $_POST['vehicle'];?>">
						<input type="hidden" name="price" value="<?php echo $_POST['price'];?>">
						<input type="hidden" name="tip" value="<?php echo $_POST['tip'];?>">
						<input type="hidden" name="total_price" value="<?php echo $total_price?>">
						<input type="hidden" name="passenger" value="<?php echo $_POST['passenger'];?>">
						<input type="hidden" name="bags" value="<?php echo $_POST['bags'];?>">
						<input type="hidden" name="first-name" value="<?php echo $_POST['first-name'];?>">
						<input type="hidden" name="last-name" value="<?php echo $_POST['last-name'];?>">
						<input type="hidden" name="email-address" value="<?php echo $_POST['email-address'];?>">
						<input type="hidden" name="phone-number" value="<?php echo $_POST['phone-number'];?>">
						<input type="hidden" name="info" value="<?php echo $_POST['info'];?>">
					    <input class="btn-submit" type="hidden" name="Proceed" value= "Book Your Ride" >
					<div class="total-price-display  clearfix">
						<table class="table passenger-details-wrapper">
						<thead>
						<tr>
						<th>Product</th>
						<th>Price</th>
						</tr>
						</thead>
						<tbody>
						<tr>
						<td width="200px"><i class="fa fa-car" aria-hidden="true"></i>&nbsp;
<?php echo $_POST['vehicle'];?></td>
						<td><i class="fa fa-usd" aria-hidden="true"></i><?php echo $_POST['price'];?></td>
						</tr>
						<tr>
						<td><i class="fa fa-gift" aria-hidden="true"></i>&nbsp;
 Gratuity</td>
						<td><i class="fa fa-usd" aria-hidden="true"></i><?php echo $tip = ( $_POST['tip']!=null)?$_POST['tip']:'00.00';?></td>
						</tr>
						<tr>
						<td>
						Total: <i class="fa fa-usd" aria-hidden="true"> <?php echo $total_price;?>
						</i></td>
						</tr>
						</tbody>
						</table>
						
							<button type="submit">
				 				Process To Payment  <i class="fa fa-angle-right"></i>
							</button>
					

					</div>
				</form>
					
				<!-- END .full-booking-wrapper -->
				</div>
				
			<!-- END .main-content -->
			</div>
		
		<!-- END .content-wrapper-outer -->
		</div>
		
<?php get_footer();?>