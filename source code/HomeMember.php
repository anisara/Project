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

<link href="./lib/demo.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready( function() {
	$("#s2").click(function(){
		$('html,body').animate({scrollTop:$("#order").offset().top},1000);
	});
	$("#s3").click(function(){
		$('html,body').animate({scrollTop:$("#HTB").offset().top},1000);
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
	height:430px;
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
	 		<a href="MemberPage.php" class="subNavBtn">
		<?PHP
			echo "ID : ".$_SESSION['ID']."<br>";
			echo "NAME : ".$_SESSION['NAME'];
		?> 
		</a>
	 		<a href="#s1" class="subNavBtn" id="s1">Promotion</a> 
			<a href="#s2" class="subNavBtn" id="s2">Order</a>
			<a href="#s3" class="subNavBtn" id="s3">How to Buy</a>
			<a href="Logout.php" class="subNavBtn">Logout</a>
		</div>
</div>

<div class="wrap ">
	<div class="section s1" id="promotion">
		<div class="inner">
			<h1>Promotion</h1>
			<div class="show" id="slideshow">
				<div>
					<img src="img/promotion1.jpg">
				</div>
				<div>
					<img src="img/promotion2.jpg">
				</div>
				<div>
					<img src="img/promotion3.jpg">
				</div>
			</div>
		</div>
	</div>
</div>

</div>

<div class="section s2" id="order">
	<div class="inner">
			<h1>How To Make Order</h1>
		<div class="show">
			<img src = "img/howtoorderinfro.jpg" />			
	</div>
	<br>
	 <div>
		<a href="SelectCake.php"><img src = "img/button_letmake.jpg" /></a>
	 </div>
	<div align="right"><a href="#s1" ><u>go to top</u></a></div>
	</div>
</div>

<div class="section s3" id="HTB">
<div>
		<img width="1345px" src = "img/howtobuyheader.jpg" />			
		
	</div>
	<div class="inner">
		<div class="show">
			<img src = "img/howtoorbuyinfro.jpg" />	
		</div>
		<div align="right"><a href="#s1" ><h4><u>go to top</u></h4></a></div>
	</div>
</div>
</body>
</html>