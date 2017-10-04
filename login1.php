<!DOCTYPE html>
<head>
    
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
kl {
    list-style-type: none;
    overflow: hidden;
    background-color: none;
}

ki {
    float:left;
	    margin: 5px 80px;
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

.login-block input#username {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#username:focus {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input#password {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#password:focus {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #ff656c;
}

.login-block input#submit {
    width: 100%;
    height: 40px;
    background: #ff656c;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #e15960;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.login-block input#submit:hover {
    background: #ff7b81;
}

</style>
  
</head>
<body>
<div class="wrap-body">

	<!--////////////////////////////////////Header-->
	<!--Top-->
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

		<!--////////////////////////////////////Container-->
		<section id="container">
			<div class="wrap-container zerogrid">
				<div class="crumbs">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="single.html">Sign in</a></li>
					</ul>
				</div>
				<div id="main-content">
					<div class="wrap-content">
						<article>
							<div class="art-header">
								<div class="entry-title"> 
									<h2>You must sign in here !!!</h2>
								</div>
							</div>
							<div class="art-content">
									<kl>
									<ki>
									<div class="login-block">
										<form method="POST" action="#">
										<h1>Sign in</h1>
										<input type="text" placeholder="ID" name="id" />
										<input type="password" placeholder="Password" name="pass" />
										<br><input type="submit" name="signin" ></input>
										</form>
									</div>
									</ki>
									<ki>
									<div class="login-block">
										<form method="POST" action="#">
										<h1>Sign up</h1>
										<input type="text" value="" placeholder="ID" name="id" />
										<input type="text" value="" placeholder="Name" name="name" />
										<input type="text" value="" placeholder="Email-Id" name="email" />
										<input type="password" value="" placeholder="Password" name="pass" />
										<input type="submit" name="signup"></input>
										</form>
									</div>
									</ki>
									</kl>
									
<?php
if(isset($_POST['signin'])){
$servername="localhost";

$link= mysqli_connect('localhost','root','','food-r')
or die('Could not Connect:'.mysqli_error());

$id=$_POST['id'];
$pass=$_POST['pass'];
$pass=md5($pass);
$query="SELECT * from login where User_id='".$id."' and Password='".$pass."'";
$result=mysqli_query($link, $query) or die('Query failed :'.mysql_error());
$res=mysqli_num_rows($result);
if($res > 0)
{	
	//header("location:result.php");
	echo '<script type="text/javascript">window.location.href="review1.php"</script>';
}
else{
	echo "<script>alert('You have entered a wrong PASSWORD or USERNAME or You are not REGISTERED')</script>";
}
}
if(isset($_POST['signup'])){

$link= mysql_connect('localhost','root','')
or die('Could not Connect:' . mysqlerror());

mysql_select_db('food-r') or die(' Could not ect ');
$name=$_POST['name'];
$id=$_POST['id'];
$pass=$_POST['pass'];
$email=$_POST['email'];
$pass=md5($pass);

$query="SELECT * from login where User_id='$id'";
$result=mysql_query($query)
or die(`Query failed :` .mysql_error());
if(mysql_num_rows($result) > 0){
	echo "<script>alert('This ID is already REGISTERED !!!')</script>";
}


$query2="INSERT INTO login (User_id, Name, Email, Password)
VALUES ('".$id."', '".$name."','".$email."', '".$pass."')";
$result=mysql_query($query2) 
or die(`Query failed :` .mysql_error());

	echo "<script>alert('You have been succesfully REGISTERED !!!')</script>";
}
?>
	
	</div>
						</article>
					</div>
				</div>
			</div>
		</section>

	<!--////////////////////////////////////Footer-->
	<footer>
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