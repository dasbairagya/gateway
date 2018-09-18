<?php 
/*Template Name: Payment Details */
// get_header();
if(isset($_SESSION['price']) && $_SESSION['price']!= null){
$va_trip = $_SESSION['trip'];
$va_pickup_address = $_SESSION['pickup-address'];
$va_dropoff_address = $_SESSION['dropoff-address'];
$va_vehicle = $_SESSION['vehicle'];
$va_pickup_date = $_SESSION['pickup-date'];
$va_time = $_SESSION['time'];
$va_passenger = $_SESSION['passenger'];
$va_bags = $_SESSION['bags'];
$va_first_name = $_SESSION['first-name'];
$va_last_name = $_SESSION['last-name'];
$va_email_address = $_SESSION['email-address'];
$va_phone_number = $_SESSION['phone-number'];
$va_info = $_SESSION['info'];
$va_price = $_SESSION['price'];
$va_total_price = $_SESSION['total_price'];
$va_tip = $_SESSION['tip'];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>payment
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/assets/css/demo.css">
  </head>
  <body>

<style type="text/css">
#title{color:#333;}
.vehicle-section {background-color:#fff;}
.vehicle-bag-limit{color: #333;}
.vehicle-passenger-limit{color:#333;}
</style>

    <!-- BEGIN .content-wrapper-outer -->
    <div class="content-wrapper-outer clearfix">
      <!-- BEGIN .main-content -->
      <div class="main-content main-content-full">
      <!--   <div class="container">
          <div class="row text-center">
            <h2> Payment For $
              <?php echo $va_total_price;?>
            </h2>
          </div>
        </div> -->
        <div class="container">
         
          <div class="creditCardForm">
            <div class="heading">
              <h1>Confirm Purchase $
                <?php echo $va_total_price;?>
              </h1>
              <!-- <img class="img-responsive" src="http://i76.imgup.net/accepted_c22e0.png"> -->
            </div>

            <div class="payment">

            <ul class="nav nav-tabs faq-cat-tabs">
                <li class="active"><a href="#faq-cat-1" data-toggle="tab">Card Payment</a></li>
                <li><a href="#faq-cat-2" data-toggle="tab">Cash Payment</a></li>
            </ul>
            <div class="tab-content faq-cat-content">
                <div class="tab-pane active in fade" id="faq-cat-1">

                    <form role="form" id="payment-form" method="POST" action="<?php echo site_url();?>/pay">
                 <div class="row">
                <input type="hidden" name="mode" value="Credit Card">
                <input type="hidden" name="trip" value="<?php echo $_SESSION['trip'];?>">
                <input type="hidden" name="pickup-address" value="<?php echo $_SESSION['pickup-address'];?>">
                <input type="hidden" name="dropoff-address" value="<?php echo $_SESSION['dropoff-address'];?>">
                <input type="hidden" name="pickup-date" value="<?php echo $_SESSION['pickup-date'];?>">
                <input type="hidden" name="time" value="<?php echo $_SESSION['time'];?>">
                <input type="hidden" name="min" value="<?php echo $_SESSION['min'];?>">
                <input type="hidden" name="vehicle" value="<?php echo $_SESSION['vehicle'];?>">
                <input type="hidden" name="price" value="<?php echo $_SESSION['price'];?>">
                <input type="hidden" name="tip" value="<?php echo $_SESSION['tip'];?>">
                <input type="hidden" name="total_price" value="<?php echo $va_total_price?>">
                <input type="hidden" name="passenger" value="<?php echo $_SESSION['passenger'];?>">
                <input type="hidden" name="bags" value="<?php echo $_SESSION['bags'];?>">
                <input type="hidden" name="first-name" value="<?php echo $_SESSION['first-name'];?>">
                <input type="hidden" name="last-name" value="<?php echo $_SESSION['last-name'];?>">
                <input type="hidden" name="email-address" value="<?php echo $_SESSION['email-address'];?>">
                <input type="hidden" name="phone-number" value="<?php echo $_SESSION['phone-number'];?>">
                <input type="hidden" name="info" value="<?php echo $_SESSION['info'];?>">
                <input class="btn-submit" type="hidden" name="Proceed" value= "Book Your Ride" >
                <div class="form-group owner">
                  <label for="owner">Owner
                  </label>
                  <input type="text" class="form-control" id="owner" name="cardWoner">
                </div>
                <div class="form-group CVV">
                  <label for="cvv">CVV
                  </label>
                  <input type="text" class="form-control" id="cvv"  name="cardCVC">
                </div>
                <div class="form-group" id="card-number-field">
                  <label for="cardNumber">Card Number
                  </label>
                  <input type="text" class="form-control" id="cardNumber" name="cardNumber">
                </div>
                <div class="form-group" id="expiration-date">
                  <label>Expiration Date
                  </label>
                  <select name="cardExpiryMonth">
                    <option value="01">January
                    </option>
                    <option value="02">February 
                    </option>
                    <option value="03">March
                    </option>
                    <option value="04">April
                    </option>
                    <option value="05">May
                    </option>
                    <option value="06">June
                    </option>
                    <option value="07">July
                    </option>
                    <option value="08">August
                    </option>
                    <option value="09">September
                    </option>
                    <option value="10">October
                    </option>
                    <option value="11">November
                    </option>
                    <option value="12">December
                    </option>
                  </select>
                  <select name="cardExpiryYear">
                    <option value="18"> 2018
                    </option>
                    <option value="19"> 2019
                    </option>
                    <option value="20"> 2020
                    </option>
                    <option value="21"> 2021
                    </option>
                    <option value="22"> 2022
                    </option>
                    <option value="23"> 2023
                    </option>
                    <option value="24"> 2024
                    </option>
                    <option value="25"> 2025
                    </option>
                    <option value="26"> 2026
                    </option>
                    <option value="27"> 2027
                    </option>
                    <option value="28"> 2028
                    </option>
                    <option value="29"> 2029
                    </option>
                    <option value="30"> 2030
                    </option>
                  </select>
                </div>
                <div class="form-group" id="credit_cards">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/visa.jpg" id="visa">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/mastercard.jpg" id="mastercard">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/amex.jpg" id="amex">
                </div>
                </div>
                <div class="row">
                  <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table" >
                      <div class="panel-title">
                        <div class="row">
                          <div class="col-md-8"> 
                            <h3>Billing Details
                            </h3>
                          </div>   
                          <div class="col-md-4">
                          </div>   
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_firstname">Firstname
                      </label>
                      <input id="form_firstname" type="text" name="fname" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required." value="<?php echo $_SESSION['first-name'];?>">
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_lastname">Lastname
                      </label>
                      <input id="form_lastname" type="text" name="lname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?php echo $_SESSION['last-name'];?>">
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_country">Country
                      </label>
                      <input id="form_country" type="text" name="country" class="form-control" placeholder="Please enter your country *" required="required" >
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_state">State
                      </label>
                      <input id="form_state" type="text" name="state" class="form-control" placeholder="Please enter your state *">
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_city">City
                      </label>
                      <input id="form_city" type="text" name="city" class="form-control" placeholder="Please enter your city *" required="required">
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_zip">Zip
                      </label>
                      <input id="form_zip" type="text" name="zip" class="form-control" placeholder="Please enter your zip *">
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_phone">Phone
                      </label>
                      <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone *" required="required" value="<?php echo $_SESSION['phone-number'];?>" >
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_address">Email Address
                      </label>
                      <input id="form_address" type="text" name="email-address" class="form-control" placeholder="Please enter your address *" value="<?php echo $_SESSION['email-address'];?>">
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="amount" value="20" />
                <div class="form-group" id="pay-now">
                  <button type="submit" class="btn btn-default" id="confirm-purchase">Confirm
                  </button>
                </div>
              </form>
                </div>
<!-- -------------------------------------tab cash paymenr------------------------------- -->

                <div class="tab-pane in fade" id="faq-cat-2">
                    <form role="form" id="payment-form" method="POST" action="<?php echo site_url();?>/step4">
                 <div class="row">
                <input type="hidden" name="mode" value="Cash Payment">
                <input type="hidden" name="trip" value="<?php echo $_SESSION['trip'];?>">
                <input type="hidden" name="pickup-address" value="<?php echo $_SESSION['pickup-address'];?>">
                <input type="hidden" name="dropoff-address" value="<?php echo $_SESSION['dropoff-address'];?>">
                <input type="hidden" name="pickup-date" value="<?php echo $_SESSION['pickup-date'];?>">
                <input type="hidden" name="time" value="<?php echo $_SESSION['time'];?>">
                <input type="hidden" name="min" value="<?php echo $_SESSION['min'];?>">
                <input type="hidden" name="vehicle" value="<?php echo $_SESSION['vehicle'];?>">
                <input type="hidden" name="price" value="<?php echo $_SESSION['price'];?>">
                <input type="hidden" name="tip" value="<?php echo $_SESSION['tip'];?>">
                <input type="hidden" name="total_price" value="<?php echo $va_total_price?>">
                <input type="hidden" name="passenger" value="<?php echo $_SESSION['passenger'];?>">
                <input type="hidden" name="bags" value="<?php echo $_SESSION['bags'];?>">
                <input type="hidden" name="first-name" value="<?php echo $_SESSION['first-name'];?>">
                <input type="hidden" name="last-name" value="<?php echo $_SESSION['last-name'];?>">
                <input type="hidden" name="email-address" value="<?php echo $_SESSION['email-address'];?>">
                <input type="hidden" name="phone-number" value="<?php echo $_SESSION['phone-number'];?>">
                <input type="hidden" name="info" value="<?php echo $_SESSION['info'];?>">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_firstname">Firstname
                      </label>
                      <input id="form_firstname" type="text" name="fname" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required." value="<?php echo $_SESSION['first-name'];?>">
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_lastname">Lastname
                      </label>
                      <input id="form_lastname" type="text" name="lname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." value="<?php echo $_SESSION['last-name'];?>">
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_country">Country
                      </label>
                      <input id="form_country" type="text" name="country" class="form-control" placeholder="Please enter your country *" required="required" >
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_state">State
                      </label>
                      <input id="form_state" type="text" name="state" class="form-control" placeholder="Please enter your state *">
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_city">City
                      </label>
                      <input id="form_city" type="text" name="city" class="form-control" placeholder="Please enter your city *" required="required">
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_zip">Zip
                      </label>
                      <input id="form_zip" type="text" name="zip" class="form-control" placeholder="Please enter your zip *">
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_phone">Phone
                      </label>
                      <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone *" required="required" value="<?php echo $_SESSION['phone-number'];?>" >
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="form_address">Email Address
                      </label>
                      <input id="form_address" type="text" name="email-address" class="form-control" placeholder="Please enter your address *" value="<?php echo $_SESSION['email-address'];?>">
                      <div class="help-block with-errors">
                      </div>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="amount" value="20" />
                <div class="form-group" id="pay-now">
                  <button type="submit" class="btn btn-default" id="confirm-purchase">Confirm
                  </button>
                </div>
              </form>


                </div>


            </div>

              



            </div>
          </div>
        </div>
        <div class="clearfix">
        </div>
      </div>
    </div>
  <!--     <div class="examples">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Card Number</th>
                            <th>Security Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Visa</td>
                            <td>4716108999716531</td>
                            <td>257</td>
                        </tr>
                        <tr>
                            <td>Visa</td>
                            <td>4163 1702 0112 6873</td>
                            <td>257</td>
                        </tr>
                        <tr>
                            <td>Master Card</td>
                            <td>5281037048916168</td>
                            <td>043</td>
                        </tr>
                        <tr>
                            <td>American Express</td>
                            <td>342498818630298</td>
                            <td>3156</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->

        <script type="text/javascript">
            $(document).ready(function() {
    $('.collapse').on('show.bs.collapse', function() {
        var id = $(this).attr('id');
        $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
        $('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-minus"></i>');
    });
    $('.collapse').on('hide.bs.collapse', function() {
        var id = $(this).attr('id');
        $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
        $('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-plus"></i>');
    });
});
        </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.payform.min.js" charset="utf-8">
    </script>
    <script src="<?php echo get_template_directory_uri();?>/assets/js/script.js">
    </script>
  </body>
</html>
