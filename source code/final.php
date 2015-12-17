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

					
	//if(isset($_POST['submit'])){
	//$sql1="SELECT * FROM MEMBER";
	//$result1=oci_parse($conn,$sql1);
	//oci_execute($result1);
	//$id = trim($_POST['idOrder']);
	
	$sql = "SELECT * FROM BPAYORDER,MEMBER ORDER BY ORDER_NO ";
	$result = oci_parse($conn,$sql);
	oci_execute($result);
	
	
	
	//$row1 = oci_fetch_array($result1);
	//while($row1 = oci_fetch_array($result1)){
		//$id1 = trim($row1['ID_MEM']);
		while($row = oci_fetch_array($result))
		{	
			//$id = trim($row['ID_MEM']);
		//เปลี่ยนตรงนี้ให้ตรงกับหัวตารางมึงนะ
			//if($id == $id1){
					echo " ID : " .$row['ID_MEM']. "   รหัสสั่งซื้อ : " .$row['ORDER_NO']. "   ชื่อลูกค้า :  " .$row['NAME_M'].  " โทร :  " .$row['TEL_M']. 
						" ที่อยู่จัดส่ง  :  " .$row['ADDR']. " ราคา   : " .$row['PRICE']. "<br>";
			//}
		
		
		}
	//}
	//}

				?>
				<div class="inner" align="right"><a href="HomeMember.php"><u>BACK HOME</u></a></div>
		</div>
	</div>
	
	<br>
	
	<!--<form action="final.php" method="post">
		ID : <input type='input' name="idOrder"> <input type="submit" name="submit" value="search">
	</form>-->
	
</body>

</html>
