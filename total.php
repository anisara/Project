<?PHP
	session_start();
	// Create connection to Oracle
	$conn = oci_connect("system", "Plaiw001", "//localhost/XE","UTF8");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;
	} 
?>


<html>
<head>
<title>Your Cart</title>
</head>
<link href="./lib/demo.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div class="header" >
	<center><img src = "img/logoweb.gif" /></center>
</div>
<br>

<body>
	<div class="section s1">
		<div class="inner">
			<h2>Total</h2>
				<?PHP

					$idM = trim($_SESSION['ID']);
					$name = trim($_SESSION['NAME']);
					$addr = trim($_SESSION['ADDR']);
					$tel = trim($_SESSION['TEl']);
	
					$sql = "SELECT * FROM BPAYORDER WHERE ID_MEM = '$idM'";
					$result = oci_parse($conn,$sql);
					oci_execute($result);
	
	
					while($row = oci_fetch_array($result))
					{	
						//เปลี่ยนตรงนี้ให้ตรงกับหัวตารางมึงนะ
							echo " ID : " .$idM. "   รหัสสั่งซื้อ : " .$row['ORDER_NO']. "   ชื่อลูกค้า :  " .$name.  " โทร :  " .$tel. 
							" ที่อยู่จัดส่ง  :  " .$addr. " ราคา   : " .$row['PRICE']. "<br>";
					}

				?>
				<div class="inner" align="right"><a href="HomeMember.php"><u>BACK HOME</u></a></div>
		</div>
	</div>
	
	<br>
	
</body>

</html>
