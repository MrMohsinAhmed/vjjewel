<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['jsmsuid']==0)) {
  header('location:logout.php');
  } else{ 

//placing order

if(isset($_POST['placeorder'])){
//getting address
$fnaobno=$_POST['flatbldgnumber'];
$street=$_POST['streename'];
$area=$_POST['area'];
$lndmark=$_POST['landmark'];
$city=$_POST['city'];
$zipcode=$_POST['zipcode'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$paymode=$_POST['paymode'];
$userid=$_SESSION['jsmsuid'];

//genrating order number
$orderno= mt_rand(100000000, 999999999);
$query="update orders set OrderNumber='$orderno',IsOrderPlaced='1',PaymentMethod='$paymode' where UserId='$userid' and IsOrderPlaced is null;";
$query.="insert into tblorderaddresses(UserId,Ordernumber,Flatnobuldngno,StreetName,Area,Landmark,City,Zipcode,Phone,Email,PaymentMethod) values('$userid','$orderno','$fnaobno','$street','$area','$lndmark','$city','$zipcode','$phone','$email','$paymode');";

$result = mysqli_multi_query($con, $query);
if ($result) {

echo '<script>alert("Your order placed successfully. Order number is "+"'.$orderno.'")</script>';
echo "<script>window.location.href='my-orders.php'</script>";

}
}    

 }   ?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from caketheme.com/html/mojuri/shop-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Dec 2024 17:32:54 GMT -->
<head>
		<!-- Meta Data -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Shop Checkout - VJ Jewellery</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="media/favicon.png">
		
		<!-- Dependency Styles -->
		<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="libs/feather-font/css/iconfont.css" type="text/css">
		<link rel="stylesheet" href="libs/icomoon-font/css/icomoon.css" type="text/css">
		<link rel="stylesheet" href="libs/font-awesome/css/font-awesome.css" type="text/css">
		<link rel="stylesheet" href="libs/wpbingofont/css/wpbingofont.css" type="text/css">
		<link rel="stylesheet" href="libs/elegant-icons/css/elegant.css" type="text/css">
		<link rel="stylesheet" href="libs/slick/css/slick.css" type="text/css">
		<link rel="stylesheet" href="libs/slick/css/slick-theme.css" type="text/css">
		<link rel="stylesheet" href="libs/mmenu/css/mmenu.min.css" type="text/css">
		<link rel="stylesheet" href="libs/slider/css/jslider.css">
		<link rel="stylesheet" href="libs/select2/css/select2.min.css">

		<!-- Site Stylesheet -->
		<link rel="stylesheet" href="assets/css/app.css" type="text/css">
		<link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<!-- Google Web Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&amp;display=swap" rel="stylesheet">
	</head>
	
	<body class="shop">
		<div id="page" class="hfeed page-wrapper">
		<?php include_once('includes/header.php'); ?>

			<div id="site-main" class="site-main">
				<div id="main-content" class="main-content">
					<div id="primary" class="content-area">
						<div id="title" class="page-title">
							<div class="section-container">
								<div class="content-title-heading">
									<h1 class="text-title-heading">
										Checkout
									</h1>
								</div>
								<div class="breadcrumbs">
									<a href="index.html">Home</a><span class="delimiter"></span><a href="shop-grid-left.html">Shop</a><span class="delimiter"></span>Checkout
								</div>
							</div>
						</div>

						<div id="content" class="site-content" role="main">
							<div class="section-padding">
								<div class="section-container p-l-r">
									<div class="shop-checkout">
										<form name="checkout" method="post" class="checkout" action="#" autocomplete="off">
											<div class="row">
												<div class="col-xl-8 col-lg-7 col-md-12 col-12">
													<div class="customer-details">
														<div class="billing-fields">
															<h3>Billing Details</h3>
															<div class="billing-fields-wrapper">
																<!-- <p class="form-row form-row-first validate-required">
																	<label>First name <span class="required" title="required">*</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="billing_first_name" value=""></span>
																</p>
																<p class="form-row form-row-last validate-required">
																	<label>Last name <span class="required" title="required">*</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="billing_last_name" value=""></span>
																</p> -->
																<!-- <p class="form-row form-row-wide">
																	<label>Company name <span class="optional">(optional)</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="billing_company" value=""></span>
																</p> -->
																
																<!-- <p class="form-row form-row-last validate-required">
																	<label>Flat or Building Number <span class="required" title="required">*</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="flatbldgnumber" value="" required="true"></span>
																</p>

																<p class="form-row form-row-last validate-required">
																	<label>Street Name <span class="required" title="required">*</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="streename" value="" required="true"></span>
																</p> -->

																<p class="form-row address-field validate-required form-row-wide">
																	<label>Street address <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="text" class="input-text" name="streename" placeholder="House number and street name" value="">
																	</span>
																</p>
																<p class="form-row address-field form-row-wide">
																	<label>Apartment, suite, unit, etc.&nbsp;<span class="optional">(optional)</span></label>
																	<span class="input-wrapper">
																		<input type="text" class="input-text" name="flatbldgnumber" placeholder="Apartment, suite, unit, etc. (optional)" value="">
																	</span>
																</p>
																<p class="form-row form-row-last validate-required">
																	<label>Area <span class="required" title="required">*</span></label>
																	<span class="input-wrapper"><input type="text" class="input-text" name="area" value="" required="true"></span>
																</p>
																<p class="form-row form-row-wide validate-required">
																	<label>Country / Region <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<select name="billing_country" class="country-select custom-select">
																			<option value="">Select a country / region…</option>
																			<option value="AF">Afghanistan</option>
																			<option value="AX">Åland Islands</option>
																			<option value="AL">Albania</option>
																			<option value="DZ">Algeria</option>
																			<option value="AS">American Samoa</option>
																			<option value="IN">India</option>
																		</select>
																	</span>
																</p>
																
																<p class="form-row address-field validate-required form-row-wide">
																	<label for="billing_city" class="">Town / City <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="text" class="input-text" name="city" value="">
																	</span>
																</p>
																<p class="form-row address-field validate-required validate-state form-row-wide">
																	<label>State / County <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<select name="billing_state" class="state-select custom-select">
																			<option value="">Select a state / county…</option>
																			<option value="VN">Vinnytsia Oblast</option>
																			<option value="VL">Volyn Oblast</option>
																			<option value="DP">Dnipropetrovsk Oblast</option>
																			<option value="DT">Donetsk Oblast</option>
																			<option value="TN">Tamil Nadu</option>
																		</select>
																	</span>
																</p>
																<p class="form-row address-field validate-required validate-postcode form-row-wide">
																	<label>Postcode / ZIP <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="text" class="input-text" name="zipcode" value="">
																	</span>
																</p>
																<p class="form-row form-row-wide validate-required validate-phone">
																	<label>Phone <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="tel" class="input-text" name="phone" value="">
																	</span>
																</p>
																<p class="form-row form-row-wide validate-required validate-email">
																	<label>Email address <span class="required" title="required">*</span></label>
																	<span class="input-wrapper">
																		<input type="email" class="input-text" name="email" value="" autocomplete="off">
																	</span>
																</p>
															</div>
														</div>
														
													</div>
													
													<div class="additional-fields">
														<p class="form-row notes">
															<label>Order notes <span class="optional">(optional)</span></label>
															<span class="input-wrapper">
																<textarea name="order_comments" class="input-text" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
															</span>
														</p>
													</div>
												</div>
												<div class="col-xl-4 col-lg-5 col-md-12 col-12">
													<div class="checkout-review-order" style="border: 1px solid #000; border-radius: 10px;">
														<div class="checkout-review-order-table">
															<h3 class="review-order-title">Product</h3>
															<?php 
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"select products.id,products.productName,products.shippingCharge,products.productDescription,products.productPrice,products.productImage1,orders.id,orders.UserId,orders.PId,orders.IsOrderPlaced  from orders join products on products.id=orders.PId where orders.UserId='$userid' and orders.IsOrderPlaced is null");
$num=mysqli_num_rows($query);
if($num>0){
while ($row=mysqli_fetch_array($query)) {
 

?>
															<div class="cart-items">
																
																<div class="cart-item">
																	<div class="info-product">
																		<div class="product-thumbnail">
																			<img width="600" height="600" src="admin/productimages/<?php echo $row['productImage1'];?>" alt="">					
																		</div>
																		<div class="product-name">
																		<p><?php  echo $row['productName'];?></p>
																			<span class="product-quantity"><?php  echo $row['productDescription'];?></span>											
																		</div>
																	</div>
																	<div class="product-total">
																		<span>₹<?php  echo $price=$row['productPrice'];?></span>
																	</div>
																</div>
																<?php 
																$price=$row['productPrice'];
$totprice+=$price;
$cnt=$cnt+1; 




$shipping=$row['shippingCharge'];
$shippingtotal+=$shipping;
$cnt=$cnt+1; 
$total=$price+$shipping;
$grandtotal+=$total;
$cnt=$cnt+1; 
 ?>



<?php } ?>




															</div>
															<div class="cart-subtotal">
																<h2>Subtotal</h2>
																<div class="subtotal-price">
																	<span>₹<?php  echo $totprice;?></span>
																</div>
															</div>
															<div class="shipping-totals shipping">
																<h2>Shipping</h2>
																<div data-title="Shipping">
																	
																		
																		<span style="color: black;">
																			₹<?php  echo $shippingtotal;?>			
																		</span>
																	
																</div>
															</div>
															<?php 

                           
 ?>
															<div class="order-total">
																<h2>Total</h2>
																<div class="total-price">
																	<strong>
																		<span><strong>₹<?php echo $grandtotal;?></strong></span>
																	</strong> 
																</div>
															</div>
															<div class="form-box__single-group">
        
        <select class="form-control" id="payment-method" name="paymode" required style="width: 300px; height: 50px; border: 1px solid #000; border-radius: 5px;">
            <option value="">Choose Payment Mode</option>
            <option value="bacs">Direct Bank Transfer</option>
            <option value="E-Wallet">ICICI Payments</option>
            <option value="cod">Cash on Delivery</option>
        </select><br>
        <div id="payment-info" class="payment-info" style="text-align: justify;">
            <!-- Dynamic content for payment details will be updated here -->
        </div>
		<button type="submit" class="btn" style="background-color: goldenrod; color: white; border-radius: 5px;" name="placeorder">PLACE THE ORDER</button>

    </div>
														</div>
													

														<?php 

                           
 ?>


<script>
    // JavaScript to handle dynamic payment method details
    document.getElementById('payment-method').addEventListener('change', function () {
        const paymentInfo = document.getElementById('payment-info');
        let infoContent = '';

        switch (this.value) {
            case 'bacs':
                infoContent = '<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>';
                break;
            case 'E-Wallet':
                infoContent = '<p>Click on the Payment page</p>';
                break;
            case 'cod':
                infoContent = '<p>Pay with cash upon delivery.</p>';
                break;
            default:
                infoContent = '';
        }

        paymentInfo.innerHTML = infoContent;
    });
</script>

													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div><!-- #content -->
					</div><!-- #primary -->
				</div>
				<?php include_once('includes/footer.php'); ?><!-- #main-content -->
			</div>

			

		<!-- Page Loader -->
		<div class="page-preloader">
	    	<div class="loader">
	    		<div></div>
	    		<div></div>
	    	</div>
	    </div>

		<!-- Dependency Scripts -->
		<script src="libs/popper/js/popper.min.js"></script>
		<script src="libs/jquery/js/jquery.min.js"></script>
		<script src="libs/bootstrap/js/bootstrap.min.js"></script>
		<script src="libs/slick/js/slick.min.js"></script>
		<script src="libs/mmenu/js/jquery.mmenu.all.min.js"></script>
		<script src="libs/slider/js/tmpl.js"></script>
		<script src="libs/slider/js/jquery.dependClass-0.1.js"></script>
		<script src="libs/slider/js/draggable-0.1.js"></script>
		<script src="libs/slider/js/jquery.slider.js"></script>
		<script src="libs/elevatezoom/js/jquery.elevatezoom.js"></script>
		<script src="libs/select2/js/select2.min.js"></script>
		
		<!-- Site Scripts -->
		<script src="assets/js/app.js"></script>
	</body>

<!-- Mirrored from caketheme.com/html/mojuri/shop-checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Dec 2024 17:32:54 GMT -->
</html><?php  } ?>
