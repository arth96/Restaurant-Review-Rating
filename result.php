<html>
		<ul>
  <li><a href="f2.php">Home</a></li>
  <li  class="active"><a href="login.php">Login/Signup</a> </li>
  <li><a href="search.php">Search</a></li>
  <li><a href="about">About</a></li>
	</ul>
<head>
	<style>
ul {
    list-style-type: none;
    padding: 0;
	font-family: 'Sniglet', cursive;
	font-size: 1.2em;
    overflow: hidden;
	margin: 0px 0px 0px 300px;
    background-color:#52A8D9;
}

li {
    float:right;
}
li a,.dropbtn {
    display: block;
    color: white;
    text-align: center;
    padding: 16px 80px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: grey;
}
	body{
		background-image : url("/img/pic1.jpg");
		background-repeat : no-repeat;
	}
	table{
	background-color:White;
	border-collapse: collapse;
	font-size :25;		
	
	padding: 10px;
	font-family: 'Sniglet', cursive;
	font-size: 1em;
	color: black;
	border: solid 3px #98d4f3;
	}
	
	div {
    background-color: none;
	width: 500px;
	 
	border: 1px;
	padding: 25px;
	margin: 100px 400px;
	padding: 50px;
	}
	#ad{
	background-color:Grey;
	width: 100%;
		height: 100%;
	}	
	td{
		min-width: 120px;
		min-height: 120px;
	}
	h1{
		margin:10px 100px;
	}
	h2{
		margin: 100px 100px;
	}

	</style>
	</head>
	<body>
<?php
	if(isset($_POST['submit'])){
	$servername="localhost";

	$link= mysql_connect('localhost','root','')
	or die('Could not Connect:' . mysqlerror());

	mysql_select_db('food-r') or die(' Could not ect ');
	$rest=$_POST['rest'];
	$food=$_POST['food'];
	$Area=$_POST['Area'];
	if($food == ""){
	$query="SELECT * from review where Restaurant='$rest' and Area='$Area'" ;
	}
	else{
		$query="SELECT * from review where Food='$food' and Area='$Area'" ;
	}
	$result=mysql_query($query) or die(`Query failed :` .mysql_error());
if(mysql_num_rows($result)>0){
?>
<div>
<table border="1" >
	<caption>Here are the reviews..</caption>
	<tr id="ad">
	<td><b>Name</b></td>
	<td><b>Area</b></td>
	<td><b>Restaurant</b></td>
	<td><b>Food </b></td>
	<td><b>Review</b></td>
	<td><b>Rating</b></td>
	</tr>
<?php
	while($line = mysql_fetch_array($result, MYSQL_ASSOC)){
	echo "\t<tr>\n";
	foreach($line as $col_value){
		echo "\t\t<td>$col_value</td>\n";
		}
		echo "\t</tr>\n";
	}
	}
else{
	echo "<script>alert('Sorry ! No Reviews Relating Your Choices.')</script>";	
	
	}
}	
?>
</table>
</div>
</body>
</html>