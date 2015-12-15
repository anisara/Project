<?PHP
	session_start();
	// Create connection to Oracle
	$conn = oci_connect("system", "Plaiw001", "//localhost/XE");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;
	} 
?>
<html>

<link href="./lib/demo2.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready( function() {
	$("#s2").click(function(){
		$('html,body').animate({scrollTop:$("#order").offset().top},1000);
	});
	$("#s3").click(function(){
		$('html,body').animate({scrollTop:$("#mem").offset().top},1000);
	});
 });
</script>

<style type="text/css">
	.pic6{
	margin : 0px 325px
	}
	div.homebut{
	width: 1000px;
	height:100px;
	}
	div.show{
	width: 1000px;
	height:500px;
	overflow:hidden;
	}
	p.slide{
	width: 4000px;
	height:500px;
	margin:0;
	}

</style>

<script type="text/javascript">
	$("#slideshow > div:gt(0)").hide();

	setInterval(function() 
	{ 
		$('#slideshow > div:first')
		.fadeOut(500)
		.next()
		.fadeIn(500)
		.end()
		.appendTo('#slideshow');
	},  3000);
</script>

<script type="text/css">
#slideshow { 
    margin: 50px auto; 
    position: relative; 
    width: 240px; 
    height: 240px; 
    padding: 10px; 
    box-shadow: 0 0 20px rgba(0,0,0,0.4); 
}

#slideshow > div { 
    position: absolute; 
    top: 10px; 
    left: 10px; 
    right: 10px; 
    bottom: 10px; 
}
</script>

<body>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<div class="subMenu">
	 	<div class="inner">
	 		<a href="Adminpage.php" class="subNavBtn">
		<?PHP
			echo "ID : ".$_SESSION['ID']."<br>";
			echo "NAME : ".$_SESSION['NAME'];
		?> 
		</a>
			<a href="#s1" class="subNavBtn" id="s1">Stock</a>
			<a href="#s2" class="subNavBtn" id="s2">Order</a>
			<a href="#s3" class="subNavBtn" id="s3">Manage Member</a>
			<a href="Logout.php" class="subNavBtn">Logout</a>
		</div>
</div>

<div class="section s1" id="stock">
		<div class="inner">
		<h1>Stock</h1>
			<a href="stock.php"><img src="img/stock.png" /></a>
			<a href="insertStock.php"><img src="img/add.png" /></a>
			<a href="updateStock.php"><img src="img/update.png"/></a>
		</div>
</div>

</div>


<div class="section s2" id="order">
	<div class="inner">
		<h1>Order</h1>
			<a href="status.php"><img src="img/status.png"/></a>
			<div align="right"><a href="#s1" ><u>go to top</u></a></div>
	</div>
</div>

<div class="section s3" id="mem">
	<div class="inner">
		<h1>Manage Member</h1>
			<a href="memdata.php"><img src="img/member.png"/></a>
			<div align="right"><a href="#s1" ><u>go to top</u></a></div>
	</div>
</div>



</body>
</html>