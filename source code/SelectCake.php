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
	<head>
		<title> CHOOSE YOUR CAKE </title>
	</head>

<?PHP
	if(isset($_POST['submit']))
	{
		$idM = trim($_SESSION['ID']);
		$size = trim($_POST['size']);
		$cake = trim($_POST['cake']);
		$cream = trim($_POST['cream']);
		$top1 = trim($_POST['topping1']);
		$top2 = trim($_POST['topping2']);
		$top3 = trim($_POST['topping3']);
		$message = trim($_POST['Message']);
		$candle = trim($_POST['candle']);
		$date = date("d-m-Y") ;
	
		if($size == "1"){
			$sql = "INSERT INTO BPAYORDER (ID_MEM,CSIZE,CAKE,CREAM,TOPPING1,TOPPING2,TOPPING3,MESSAGE,CANDLE,PRICE,STATUS,DATEORDER) 
					Values ('$idM','$size','$cake','$cream','$top1','$top2','$top3','$message','$candle',150,'No','$date')";
			$result = oci_parse($conn,$sql);
			oci_execute($result);
		
		}
		if($size == "2"){
			$sql = "INSERT INTO BPAYORDER (ID_MEM,CSIZE,CAKE,CREAM,TOPPING1,TOPPING2,TOPPING3,MESSAGE,CANDLE,PRICE,STATUS,DATEORDER) 
					Values ('$idM','$size','$cake','$cream','$top1','$top2','$top3','$message','$candle',300,'No','$date')";
			$result = oci_parse($conn,$sql);
			oci_execute($result);
		}
		if($size == "3"){
			$sql = "INSERT INTO BPAYORDER (ID_MEM,CSIZE,CAKE,CREAM,TOPPING1,TOPPING2,TOPPING3,MESSAGE,CANDLE,PRICE,STATUS,DATEORDER) 
					Values ('$idM','$size','$cake','$cream','$top1','$top2','$top3','$message','$candle',450,'No','$date')";
			$result = oci_parse($conn,$sql);
			oci_execute($result);
		}	
					
		header("location: total.php");
	}
	
	
?>

<html>

<link href="./lib/demo.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
	$("#slideshow > div:gt(0)").hide();

	setInterval(function() 
	{ 
		$('#slideshow > div:first')
		.fadeOut(1000)
		.next()
		.fadeIn(1000)
		.end()
		.appendTo('#slideshow');
	},  3000);
</script>

<script type="text/css">
#slideshow { 
    margin: 50px auto; 
    position: relative; 
    width: 240px; 
    height: 540px; 
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
	height:540px;
	overflow:hidden;
	}
	p.slide{
	width: 4000px;
	height:500px;
	margin:0;
	}
	div.bodyselect
	{
		position: relative;
		margin-top: -540px;
		margin-left: 100px
	}

</style>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
<title> CHOOSE YOUR CAKE </title>
</head>

<body>
<div class="header" >
	<img width="1348px" src = "img/orderheader.jpg" />
</div>

<div class="subMenu">
	 	<div class="inner">
	 		<a href="Memberpage1.php" class="subNavBtn">
		<?PHP
			echo "ID : ".$_SESSION['ID']."<br>";
			echo "NAME : ".$_SESSION['NAME'];
		?> 
		</a>
	 		<a href="HomeMember.php" class="subNavBtn" >Promotion</a> 
			<a href="SelectCake.php" class="subNavBtn" >Order</a>
			<a href="HomeMember.php" class="subNavBtn" >How to Buy</a>
			<a href="Logout.php" class="subNavBtn">Logout</a>
		</div>
</div>
<br>

<div width="586px" height="540px" style="margin-left:0">
		<div class="show" id="slideshow">
				<div>
					<img src="img/caketopping.jpg">
				</div>
				<div>
					<img src="img/creamtopping.jpg">
				</div>
				<div>
					<img src="img/topping.jpg">
				</div>
</div>

<form action = 'SelectCake.php' method = 'POST'>
<div class="bodyselect" style="margin-left: 650px">
		<h1>Make your order</h1>
		<img src = "img/button_size.jpg" />
			<div style="margin-left:100px">
				<h3>
					<input type="radio" name="size" value ="1" checked> 1 pounds <br>
					<input type="radio" name="size" value="2" checked> 2 pounds <br>
					<input type="radio" name="size" value="3" checked> 3 pounds <br>
				</h3>
			</div>
		<br>
		<img src = "img/button_cake.jpg" />
			<div style="margin-left:100px">
				<h3>
					<input type="radio" name="cake" value="Butter" checked>Butter<br>
					<input type="radio" name="cake" value="Chocolate" checked> Chocolate<br> 
					<input type="radio" name="cake" value="Greentea" checked>Greentea<br>
					<input type="radio" name="cake" value="Baitoey" checked> Baitoey <br>
					<input type="radio" name="cake" value="Milk" checked> Milk <br>
				</h3>
			</div>
		<br>
		<img src = "img/button_cream.jpg" />
			<div style="margin-left:100px">
				<h3>
					<input type="radio" name="cream" value="Vanilla" checked> Vanilla <br>
					<input type="radio" name="cream" value="Chocolate" checked> Chocolate <br>
					<input type="radio" name="cream" value="Greentea" checked> Greentea <br>
					<input type="radio" name="cream" value="Milk" checked> Milk <br>
					<input type="radio" name="cream" value="None" checked> None <br>
				</h3>
			</div>
		<br>
		<img src = "img/button_topping1.jpg" />
			<div style="margin-left:100px">
				<h3>
					<input type="radio" name="topping1" value="Heart Icing">ไอซ์ซิ่งหัวใจ<br>
					<input type="radio" name="topping1" value="Flower Icing">ไอซ์ซิ่งดอกไม้<br>
					<input type="radio" name="topping1" value="Star Icing">ไอซ์ซิ่งดาว<br>
					<input type="radio" name="topping1" value="Leaf Icing">ไอซ์ซิ่งใบไม้<br>
					<input type="radio" name="topping1" value="Ribbin Icing">ไอซ์ซิ่งโบว์<br>
					<input type="radio" name="topping1" value="Rainbow">เกล็ดสายรุ้ง<br>
					<input type="radio" name="topping1" value="Gelly">เยลลี่<br>
					<input type="radio" name="topping1" value="Row Sugar">น้ำตาลกลม <br>
					<input type="radio" name="topping1" value="None">None<br>
				</h3>
			</div>
		<br>
		<img src = "img/button_topping2.jpg" />
			<div style="margin-left:100px">
				<h3>
					<input type="radio" name="topping2" value="Kitkat"> Kitkatt <br>
					<input type="radio" name="topping2" value="Oreo"> Oreo <br>
					<input type="radio" name="topping2" value="M&M"> M&M <br>
					<input type="radio" name="topping2" value="None"> None <br>
				</h3>
			</div>
		<br>
		<img src = "img/button_topping3.jpg" />
			<div style="margin-left:100px">
				<h3>
					<input type="radio" name="topping3" value="Banana"> กล้วยหอม <br>
					<input type="radio" name="topping3" value="Blueberry"> บลูเบอร์รี่ <br>
					<input type="radio" name="topping3" value="Cherry"> เชอร์รี่ <br>
					<input type="radio" name="topping3" value="Orange"> ส้ม <br>
					<input type="radio" name="topping3" value="Strawberry"> สตรอเบอร์รี่ <br>
					<input type="radio" name="topping3" value="None">None<br>
				</h3>
			</div>
		<br>
		<img src = "img/button_message.jpg" />
			<div style="margin-left:100px">
				<h3>
					<textarea type="text" name="Message" cols="45" rows="5" placeholder="กรุณากรอกข้อความของคุณที่นี่" ></textarea>
				</h3>
			</div>
		<br>
		<img src = "img/button_candle.jpg" />
			<div style="margin-left:100px">
				<h3>
					<input type="radio" name="candle" value="yes"> YES  <input type="radio" name="candle" value="no"> NO
				</h3>
			</div>
		
		
		<br><br>
		<input name='submit' type='submit' value='SELECTCAKE' size="500px" style="margin-left:300px">
</div>
</form><br>

</body>
</html>