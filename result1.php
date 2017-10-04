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
ki{
float:left;
margin : 30px;

}
.grow {
transition: 1s ease;
}

.grow:hover{
transform: scale(1.5);
transition: 1s ease;
}


kiv{
background-color: #EBECE6;
min-width:500px;
min-height:80px;
display: block;
text-align:center;
margin: 20px;
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
						<li><a href="main.php">Home</a></li>
						<li><a href="explore.php">Explore</a></li>
						<li><a href=#>Result</a></li>
					</ul>
				</div>
				<div id="main-content">
					<div class="wrap-content">
					<?php
						$link= mysql_connect('localhost','root','')
						or die('Could not Connect:' . mysqlerror());

						mysql_select_db('food-r') or die(' Could not ect ');
						$Area=$_GET['name'];
						
						$query="SELECT * from average where Area='$Area'" ;
						
						$result=mysql_query($query) or die(`Query failed :` .mysql_error());
						$x=mysql_num_rows($result);
						if($x>0)
						{
						while($line = mysql_fetch_array($result, MYSQL_ASSOC)){
						echo "
						<div>
								<section>
									<h1><b>";
									echo "<a href=result2.php?restname=",urlencode($line['Restaurant']),">".$line['Restaurant']."</a>";
									echo"
									</b></h1>
									<p>Average Rating:";echo $line['Rating'];echo" </p>
									<p>Total Reviewers:";echo $line['Total'];echo"</p>
								</section>
						<div>
						<br>
						<br>
						";
						}
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