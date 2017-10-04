<!DOCTYPE html>

<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Owl Carousel Assets -->
    <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="owl-carousel/owl.theme.css" rel="stylesheet">
	
	<script src="js/jquery-2.1.1.js"></script>
	<script src="js/script.js"></script>

<style>
body {
    background: url('http://i.imgur.com/Eor57Ae.jpg') no-repeat fixed center center;
    background-size: cover;
    font-family: Montserrat;
}
.logo {
    width: 213px;
    height: 36px;
    background: url('http://i.imgur.com/fd8Lcso.png') no-repeat;
    margin: 30px auto;
}

.login-block {
    width: 320px;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #ff656c;
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #ff656c;
}

.login-block button {
    width: 100%;
    height: 40px;
    background: #ff656c;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #e15960;
    color: black;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.login-block button:hover {
    background: #ff7b81;
}
</style>
</head>
<body>
<div class="wrap-body">
	<div id="top">
		<div class="zerogrid">
			<div class="row">
				<div class="col-1-3">
					<ul class="list-inline top-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<header class="sub-header">
		<nav class="wrap-menu">
			<div class="zerogrid">
				<div id="menu-trigger">Menu</div>    
				<ul id="menu" style="display: none;">
					<li><a href="main.php">Home</a></li>
					<li>
						<a href="login1.php">Sign in</a>
					</li>
					<li><a href="explore.php">Explore</a></li>
					<li><a href="review1.php">reivew</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li style="float:right !important">
						<form method="get" action="/search" id="search" class="f-right">
							<input name="q" type="text" size="40" placeholder="Search..." />
						</form>
					</li>
				</ul>
			</div>
		</nav>
	</header>


		<section id="container">
			<div class="wrap-container zerogrid">
				<div class="crumbs">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="archive.html">Review</a></li>
					</ul>
				</div>
				<div id="main-content">
					<div class="wrap-content">
									<div class="login-block">
									<h1>Your Review Please !</h1>
									<form action="#" method="post">
											<input type="text" value="" placeholder="Name" name="name" />
											<input list="Area" name="Area" placeholder="Area">
											<datalist id="Area"><option value="Thaltej"><option value="Vadaj"></datalist>
											<input type="text" value="" placeholder="Restaurant" name="rest" />
											<input type="text" value="" placeholder="Food" name="food" />
											<input type="text" value="" placeholder="Review" name="rev" />
											<button name="submit">Go !!</button>
										</form>
									</div>
<?php
if(isset($_POST['submit'])){
$servername="localhost";

$link= mysql_connect('localhost','root','')
or die('Could not Connect:' . mysqlerror());

mysql_select_db('food-r') or die(' Could not ect ');
$name=$_POST['name'];
$rest=$_POST['rest'];
$food=$_POST['food'];
$rev=$_POST['rev'];
$area=$_POST['Area'];

$pyscript = 'C:\Users\dell\AppData\Local\Programs\Python\Python36-32\test.py';
$python = 'C:\Users\dell\AppData\Local\Programs\Python\Python36-32\python.exe';

$cmd = "$python $pyscript $rev";
$rat=exec("$cmd",$output);

$query="INSERT INTO review (Name, Area, Restaurant, Food, Review, Rating)
VALUES ('".$name."','".$area."', '".$rest."', '".$food."', '".$rev."', '".$rat."')";;
$result=mysql_query($query) or die(`Query failed :` .mysql_error());
		
$query1="Select * from average where Restaurant='$rest' and Area='$area'";
$result=mysql_query($query1) or die(`Query failed :` .mysql_error());
$line = mysql_fetch_array($result, MYSQL_ASSOC);
$temp1=$line['Total'];
$temp=$line['Rating'];
$temp=$temp*$temp1;
$temp=$temp + $rat;

$temp1=$temp1 + 1;
$temp=$temp/$temp1;

$rat=round($temp,2);	

$query2="Update `average` set `Rating`='$rat',`Total`='$temp1' where `Restaurant`='$rest' and `Area`='$area'";
$result=mysql_query($query2) or die(`Query failed :` .mysql_error());

echo "<script>alert('Your review has been recored !!!')</script>";
}
?>
					</div>
				</div>
			</div>
		</section>

	<!--////////////////////////////////////Footer-->
	<footer>
		<div class="top-footer">
			<div id="map" style="height: 270px;"></div>
		</div>
		<div class="zerogrid">
			<div class="wrap-footer">
				<div class="row">
					<div class="col-1-3 col-footer-1">
						<div class="wrap-col">
							<h3 class="widget-title">About Us</h3>
							<p>Ut volutpat consectetur aliquam. Curabitur auctor in nis ulum ornare. Sed consequat, augue condimentum fermentum gravida, metus elit vehicula dui. Curabitur auctor in nis ulum ornare. Sed consequat, augue condimentum fermentum</p>
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque la udantium</p>
						</div>
					</div>
					<div class="col-1-3 col-footer-2">
						<div class="wrap-col">
							<h3 class="widget-title">Recent Post</h3>
							<ul>
								<li><a href="#">MOST VISITED COUNTRIES</a></li>
								<li><a href="#">5 PLACES THAT MAKE A GREAT HOLIDAY</a></li>
								<li><a href="#">PEBBLE TIME STEEL IS ON TRACK TO SHIP IN JULY</a></li>
								<li><a href="#">STARTUP COMPANY’S CO-FOUNDER TALKS ON HIS NEW PRODUCT</a></li>
							</ul>
						</div>
					</div>
					<div class="col-1-3 col-footer-3">
						<div class="wrap-col">
							<h3 class="widget-title">Subcribe</h3>
							<p>Never missed any post published in our site. Subscribe to our daly newsletter now.</p>
							<p>Email address:</p>
							<form action="#" method="post">
								<input type="text" name="your-name" value="" size="40" placeholder="Your Email" />
								<input type="submit" value="SUBSCRIBE" class="button button-subcribe" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
	<!-- Js Menu -->
	<script src="js/jquery183.min.js"></script>
	<script type="text/javascript">
		$(function() {
			if ($.browser.msie && $.browser.version.substr(0,1)<7)
			{
			$('li').has('ul').mouseover(function(){
				$(this).children('ul').css('visibility','visible');
				}).mouseout(function(){
				$(this).children('ul').css('visibility','hidden');
				})
			}

			/* Mobile */
			$("#menu-trigger").on("click", function(){
				$("#menu").slideToggle();
			});

			// iPad
			var isiPad = navigator.userAgent.match(/iPad/i) != null;
			if (isiPad) $('#menu ul').addClass('no-transition');      
		});          
	</script>
	
	
</div>
</body></html>