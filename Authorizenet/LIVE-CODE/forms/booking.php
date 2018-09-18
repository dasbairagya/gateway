<?php 
/*Template Name: Reservation */
get_header();
?>
		
		<div id="page-header">
			<h1>Booking Step 1</h1>
			<div class="title-block3"></div>
			<p><a href="#">Home</a><i class="fa fa-angle-right"></i>Booking Step 1</p>
		</div>
		
		<!-- BEGIN .content-wrapper-outer -->
		<div class="content-wrapper-outer clearfix">
			
			<!-- BEGIN .main-content -->
			<div class="main-content main-content-full">
				
				<!-- BEGIN .booking-step-wrapper -->
				<div class="booking-step-wrapper clearfix">

					<div class="step-wrapper clearfix">
						<div class="step-icon-wrapper">
							<div class="step-icon step-icon-current">1.</div>
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
							<div class="step-icon">4.</div>
						</div>
						<div class="step-title">Confirmation</div>
					</div>

					<div class="step-line"></div>

				<!-- END .booking-step-wrapper -->
				</div>
				
				<!-- BEGIN .clearfix -->
				<div class="clearfix">
				
					<!-- BEGIN .widget-booking-form-wrapper -->
					<div class="widget-booking-form-wrapper booking-step-1-form">

						<!-- BEGIN #booking-tabs -->
						<div id="booking-tabs">

							<ul class="nav clearfix">
								<li><a href="#tab-one-way">One-Way Transfer</a></li>
								<li><a href="#tab-hourly">Hourly Service</a></li>
							</ul>

							<!-- BEGIN #tab-one-way -->
							<div id="tab-one-way">

								<!-- BEGIN .booking-form-1 -->
								<form action="<?php echo site_url(); ?>/step2" class="booking-form-1" method="post">
									<input type="hidden" name="trip" value="One-Way Transfer">
									<input type="text" name="pickup-address" value="" placeholder="Pick Up Address" />
									<input type="text" name="dropoff-address" value="" placeholder="Drop Off Address" />
									<input type="text" name="pickup-date" class="datepicker" value="" placeholder="Pick Up Date" />

									<div class="booking-form-time">
										<label>Pick Up Time</label>
									</div>

									<div class="booking-form-hour">
										<div class="select-wrapper">
											<i class="fa fa-angle-down"></i>
										 	<select name="time">
												<option value="12am">12am</option>
												<option value="01am">01am</option>
												<option value="02am">02am</option>
												<option value="03am">03am</option>
												<option value="04am">04am</option>
												<option value="05am">05am</option>
												<option value="06am">06am</option>
												<option value="07am">07am</option>
												<option value="08am">08am</option>
												<option value="09am">09am</option>
												<option value="10am">10am</option>
												<option value="11am">11am</option>
												<option value="12pm">12pm</option>
												<option value="01pm">01pm</option>
												<option value="02pm">02pm</option>
												<option value="03pm">03pm</option>
												<option value="04pm">04pm</option>
												<option value="05pm">05pm</option>
												<option value="06pm">06pm</option>
												<option value="07pm">07pm</option>
												<option value="08pm">08pm</option>
												<option value="09pm">09pm</option>
												<option value="10pm">10pm</option>
												<option value="11pm">11pm</option>
											</select>
										</div>
									</div>

									<div class="booking-form-min">
										<div class="select-wrapper">
											<i class="fa fa-angle-down"></i>
										 	<select name="min">
												<option value="00">00</option>
												<option value="15">15</option>
												<option value="30">30</option>
												<option value="45">45</option>
											</select>
										</div>
									</div>

									<button type="submit">
						 				<span>Reserve Now</span>
									</button>

								<!-- END .booking-form-1 -->
								</form>

							<!-- END #tab-one-way -->
							</div>

							<!-- BEGIN #tab-hourly -->
							<div id="tab-hourly">

								<!-- BEGIN .booking-form-1 -->
								<form  action="<?php echo site_url(); ?>/step2" class="booking-form-1" method="post">
								<input type="hidden" name="trip" value="Hourly Service">
									<input type="text" name="pickup-address" value="" placeholder="Pick Up Address" />

									<div class="one-third">
										<label>Trip Duration</label>
									</div>

									<div class="two-thirds last-col">
										<div class="select-wrapper">
											<i class="fa fa-angle-down"></i>
										 	<select>
												<option value="1hr">1 Hour</option>
												<option value="2hr">2 Hours</option>
												<option value="3hr">3 Hours</option>
												<option value="4hr">4 Hours</option>
												<option value="5hr">5 Hours</option>
												<option value="6hr">6 Hours</option>
												<option value="7hr">7 Hours</option>
												<option value="8hr">8 Hours</option>
												<option value="9hr">9 Hours</option>
												<option value="10hr">10 Hours</option>
												<option value="11hr">11 Hours</option>
												<option value="12hr">12 Hours</option>
												<option value="13hr">13 Hours</option>
												<option value="14hr">14 Hours</option>
												<option value="15hr">15 Hours</option>
												<option value="16hr">16 Hours</option>
												<option value="17hr">17 Hours</option>
												<option value="18hr">18 Hours</option>
												<option value="19hr">19 Hours</option>
												<option value="20hr">20 Hours</option>
												<option value="21hr">21 Hours</option>
												<option value="22hr">22 Hours</option>
												<option value="23hr">23 Hours</option>
												<option value="24hr">24 Hours</option>
												<option value="25hr">25 Hours</option>
												<option value="26hr">26 Hours</option>
												<option value="27hr">27 Hours</option>
												<option value="28hr">28 Hours</option>
												<option value="29hr">29 Hours</option>
												<option value="30hr">30 Hours</option>
												<option value="31hr">31 Hours</option>
												<option value="32hr">32 Hours</option>
												<option value="33hr">33 Hours</option>
												<option value="34hr">34 Hours</option>
												<option value="35hr">35 Hours</option>
												<option value="36hr">36 Hours</option>
												<option value="37hr">37 Hours</option>
												<option value="38hr">38 Hours</option>
												<option value="39hr">39 Hours</option>
												<option value="40hr">40 Hours</option>
												<option value="41hr">41 Hours</option>
												<option value="42hr">42 Hours</option>
												<option value="43hr">43 Hours</option>
												<option value="44hr">44 Hours</option>
												<option value="45hr">45 Hours</option>
												<option value="46hr">46 Hours</option>
												<option value="47hr">47 Hours</option>
												<option value="48hr">48 Hours</option>
											</select>
										</div>
									</div>

									<input type="text" name="dropoff-address" value="" placeholder="Drop Off Address" />
									<input type="text" name="pickup-date" class="datepicker" value="" placeholder="Pick Up Date" />

									<div class="booking-form-time">
										<label>Pick Up Time</label>
									</div>

									<div class="booking-form-hour">
										<div class="select-wrapper">
											<i class="fa fa-angle-down"></i>
										 	<select name="time">
												<option value="12am">12am</option>
												<option value="01am">01am</option>
												<option value="02am">02am</option>
												<option value="03am">03am</option>
												<option value="04am">04am</option>
												<option value="05am">05am</option>
												<option value="06am">06am</option>
												<option value="07am">07am</option>
												<option value="08am">08am</option>
												<option value="09am">09am</option>
												<option value="10am">10am</option>
												<option value="11am">11am</option>
												<option value="12pm">12pm</option>
												<option value="01pm">01pm</option>
												<option value="02pm">02pm</option>
												<option value="03pm">03pm</option>
												<option value="04pm">04pm</option>
												<option value="05pm">05pm</option>
												<option value="06pm">06pm</option>
												<option value="07pm">07pm</option>
												<option value="08pm">08pm</option>
												<option value="09pm">09pm</option>
												<option value="10pm">10pm</option>
												<option value="11pm">11pm</option>
											</select>
										</div>
									</div>

									<div class="booking-form-min">
										<div class="select-wrapper">
											<i class="fa fa-angle-down"></i>
										 	<select name="min">
												<option value="00">00</option>
												<option value="15">15</option>
												<option value="30">30</option>
												<option value="45">45</option>
											</select>
										</div>
									</div>

									<button type="submit">
						 				<span><a href="booking2.php">Reserve Now</a></span>
										
									</button>

								<!-- END .booking-form-1 -->
								</form>

							<!-- END #tab-hourly -->
							</div>

						<!-- END #booking-tabs -->
						</div>

					<!-- END .widget-booking-form-wrapper -->
					</div>
					
					<!-- BEGIN .booking-step-intro -->
					<div class="booking-step-intro">
						
						<h4>Online Reservations</h4>
						<div class="title-block7"></div>
					
						<p><?php the_field('online_reservations_content'); ?></p>
						
						<hr class="space6" />
						
						<!-- BEGIN .clearfix -->
						<div class="clearfix">
							
							<!-- BEGIN .qns-one-half -->
							<div class="qns-one-half">
								
								<ul class="list-style4">
								  <?php while( have_rows('service_list_left') ): the_row(); 
                            		$add_service = get_sub_field('add_service');
                            		?>
									<li><?php echo $add_service; ?></li> 
									<?php endwhile; ?>
								</ul>
								
							<!-- END .qns-one-half -->
							</div>
							
							<!-- BEGIN .qns-one-half -->
							<div class="qns-one-half qns-last">
								
								<ul class="list-style4">
								<?php while( have_rows('service_list_right') ): the_row(); 
                            		$add_service = get_sub_field('add_service');
                            		?>
									<li><?php echo $add_service; ?></li>
									<?php endwhile; ?>
								</ul>
								
							<!-- END .qns-one-half -->
							</div>
							
						<!-- END .clearfix -->
						</div>
						
					<!-- END .booking-step-intro -->
					</div>
				
				<!-- END .clearfix -->
				</div>
				
			<!-- END .main-content -->
			</div>
		
		<!-- END .content-wrapper-outer -->
		</div>
		
<?php include 'footer.php';?>