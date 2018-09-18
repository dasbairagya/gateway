<?php 
/*Template Name: Step 2 */
get_header();
// var_dump($_POST);

if(is_user_logged_in()){

	$user = wp_get_current_user();
	$first_name = $user->user_firstname;
	$last_name = $user->user_lastname;
	$email = $user->user_email;
}
?>
<style type="text/css">
	#title{color:#333;}
	.vehicle-section {background-color:#fff;}
	.vehicle-bag-limit{color: #333;}
	.vehicle-passenger-limit{color:#333;}
</style>
		<div id="page-header">
			<h1>Booking Step 2</h1>
			<div class="title-block3"></div>
			<p><a href="#">Home</a><i class="fa fa-angle-right"></i>Booking Step 2</p>
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
							<div class="step-icon step-icon-current">2.</div>
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
							<div class="step-icon">4.</div>
						</div>
						<div class="step-title">Confirmation</div>
					</div>

					<div class="step-line"></div>

				<!-- END .booking-step-wrapper -->
				</div>
				
				<!-- BEGIN .clearfix -->
				<div class="clearfix">
				
					<!-- BEGIN .select-vehicle-wrapper -->
					<div class="select-vehicle-wrapper">
						
						<h4>Select Vehicle</h4>
						<div class="title-block7"></div>
						<?php 
						/**
						 * Custom Slug Name vi
						 */
						        global $post;
						            $args = array( 
						                'posts_per_page'  =>   5 ,
						                'orderby'         => 'date',
						                'order'           => 'DESC',
						                'post_type'       => 'shuttle',
						                'post_status'     => 'publish'
						            );
						            $the_query = new WP_Query( $args );
						            $i=1;
						            while ( $the_query->have_posts() ) :
						                $the_query->the_post();
						                    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						                ?>
						
						              
						<!-- BEGIN .vehicle-section -->
						<a href="javascript:void(0)">
						<div class="vehicle-section clearfix fire" id="fire<?php echo $i;?>" onclick="myFunction(this.id);">
							<p style="display: none;"><?php the_title();?></p>
							<p style="display: none;"><?php the_field('price');?></p>
							<p style="display: none;"><?php the_field('bags');?></p>
							<p style="display: none;"><?php the_field('passenger');?></p>
							<p style="display: none;"><?php echo $url;?></p>
							 
							<p id='title'><?php the_title();?> <strong>$<?php the_field('price');?></strong></p>
							<ul>
								<li class="vehicle-bag-limit" id="bag<"><?php the_field('bags');?></li>
								<li class="vehicle-passenger-limit" id="passenger<?php echo $i;?>"><?php the_field('passenger');?></li>
							</ul>
							<img src="<?php echo $url;?>" alt="" />
						
						
						</div>
					</a>

						

						<!-- END .vehicle-section -->
						  <?php $i++; endwhile; ?>

					<!-- END .select-vehicle-wrapper -->
					</div>
					
					<!-- BEGIN .trip-details-wrapper -->
					<div class="trip-details-wrapper clearfix">
						
						<h4>Trip Details</h4>
						<div class="title-block7"></div>
						<style type="text/css">
							.hideshow{
								display: none;
							}
						</style>
					<div class="vehicle-section clearfix hideshow" id="replacehtm">
							
						
						
						</div>
						<!-- BEGIN .trip-details-wrapper-1 -->
						<div class="trip-details-wrapper-1">
							
							<p class="clearfix"><strong>Service Type:</strong> <span><?php echo $_POST['trip'];?></span></p>
							<p class="clearfix"><strong>From:</strong> <span><?php echo $_POST['pickup-address'];?></span></p>
							<p class="clearfix"><strong>To:</strong> <span><?php echo $_POST['dropoff-address'];?></span></p>
						<p class="clearfix"><strong>Date:</strong> <?php echo $_POST['pickup-date'];?> </p>
							<p class="clearfix"><strong>Pick Up Time:</strong><?php echo $_POST['time'];?>&nbsp;&nbsp;&nbsp;<?php echo $_POST['min'];?></p>
						<!-- END .trip-details-wrapper-1 -->
						</div>

						
						<!-- BEGIN .trip-details-wrapper-2 -->
						<div class="trip-details-wrapper-2">
							
							

						<iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $_POST["pickup-address"]; ?>&output=embed"></iframe>
							<!-- <a href="#" data-gal="prettyPhoto[gallery]" class="view-map-button">View Map</a> -->
							
						<!-- END .trip-details-wrapper-2 -->
						</div>




						
						<div class="clearboth"></div>
						
						<!-- BEGIN .contact-form-1 -->
						<form action="<?php echo site_url();?>/step3" class="contact-form-1" method="post" id="form3">
							

							<input type="hidden" name="trip" value="<?php echo $_POST['trip'];?>">
								<input type="hidden" name="pickup-address" value="<?php echo $_POST['pickup-address'];?>" placeholder="Pick Up Address" />
								<input type="hidden" name="dropoff-address" value="<?php echo $_POST['dropoff-address'];?>" placeholder="Drop Off Address" />
								<input type="hidden" name="pickup-date" value="<?php echo $_POST['pickup-date'];?>" />
								<input type="hidden" name="time" value="<?php echo $_POST['time'];?>"/>
								<input type="hidden" name="min" value="<?php echo $_POST['min'];?>"/>
								<input id="vehicle" class="vehicle" type="hidden" name="vehicle"/>
								<input id="price" class="price" type="hidden" name="price" />
								
							<!-- BEGIN .clearfix -->
							<div class="clearfix">
								
								<!-- BEGIN .qns-one-half -->
								<div class="qns-one-half">
									
									<label>Number Of Passengers</label>
									<div class="select-wrapper">
										<i class="fa fa-angle-down"></i>
									 	<select name="passenger">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
										</select>
									</div>
								
								<!-- END .qns-one-half -->
								</div>
								
								<!-- BEGIN .qns-one-half -->
								<div class="qns-one-half last-col">
									
									<label>Number Of Bags</label>
									<div class="select-wrapper">
										<i class="fa fa-angle-down"></i>
									 	<select name="bags">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
										</select>
									</div>
								
								<!-- END .qns-one-half -->
								</div>
							
							<!-- END .clearfix -->
							</div>
							
							<!-- BEGIN .clearfix -->
							<div class="clearfix">
								
								<!-- BEGIN .qns-one-half -->
								<div class="qns-one-half">
									
									<label>First Name</label>
									<input type="text" name="first-name" value="<?php if(isset($first_name)) {echo $first_name;}?>" />
								
								<!-- END .qns-one-half -->
								</div>
								
								<!-- BEGIN .qns-one-half -->
								<div class="qns-one-half last-col">
									
									<label>Last Name</label>
									<input type="text" name="last-name" value="<?php if(isset($last_name)) {echo $last_name;}?>" />
								
								<!-- END .qns-one-half -->
								</div>
							
							<!-- END .clearfix -->
							</div>
							
							<!-- BEGIN .clearfix -->
							<div class="clearfix">
								
								<!-- BEGIN .qns-one-half -->
								<div class="qns-one-half">
									
									<label>Email Address</label>
									<input type="text" name="email-address" value="<?php if(isset($email)) {echo $email;}?>" />
								
								<!-- END .qns-one-half -->
								</div>
								
								<!-- BEGIN .qns-one-half -->
								<div class="qns-one-half last-col">
									
									<label>Phone Number</label>
									<input type="text" name="phone-number" value="" />
								
								<!-- END .qns-one-half -->
								</div>
							
							<!-- END .clearfix -->
							</div>

							<label>Additional Information</label>
							<textarea cols="10" rows="14" name="info"></textarea>

							<div class="qns-one-half">
									
							<!-- 		<label>Want to add some Tip or Gratuity?</label> -->
									<input type="checkbox" id="tipCheck" onclick="return showTip();"><span>Want to add some Tip or Gratuity?</span>
								
								<!-- END .qns-one-half -->
								</div>
								
								<!-- BEGIN .qns-one-half -->
								<div class="qns-one-half last-col">
									
									<input type="text" name="tip" id="tip" style="display:none" placeholder="Put your tip" onkeypress="return isNumber(event)" >
								
								<!-- END .qns-one-half -->
								</div>



							
							
							<button type="submit">
				 				Confirm &amp; Your Ride  <i class="fa fa-angle-right"></i>
							</button>

						<!-- END .contact-form-1 -->
						</form>
						
					<!-- END .trip-details-wrapper -->
					</div>
				
				<!-- END .clearfix -->
				</div>
				
			<!-- END .main-content -->
			</div>
		
		<!-- END .content-wrapper-outer -->
		</div>

		<script>
			function showTip() {
				
			  // Get the checkbox
			  var checkBox = document.getElementById("tipCheck");
			  // Get the output text
			  var text = document.getElementById("tip");
			  if (checkBox.checked == true){
			    text.style.display = "block";
			  } else {
			    text.style.display = "none";
			    text.value ='';
			  }
			} 
			function isNumber(evt) {
			    evt = (evt) ? evt : window.event;
			    var charCode = (evt.which) ? evt.which : evt.keyCode;
			    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			        return false;
			    }
			    return true;
			}
		</script>



<?php get_footer();?>
