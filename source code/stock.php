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
<!DOCTYPE>
<html>
<head>
	<title> BPAY STOCK </title>
	<style>
		table, th, td {
			border: 1px solid black;
			width: 1200px;
			text-align: center;
		}
</style>
<link href="./lib/demo2.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>

<div class="header" >
	<center><img src = "img/logoweb.gif" /></center>
</div>
<br>

<?PHP


	$sql = "SELECT * FROM STOCK ORDER BY ID_STO";
	$result = oci_parse($conn,$sql);
	oci_execute($result);
	//$row = oci_fetch_array($result);
	//var_dump($row);
	//echo "STOCK ID : " .$row['ID_STO'] ." NAME : " .$row['NAME_STO'];
	
	echo "Today is " . date("d-m-Y") . "<br><br><br>";

	$rows = array();
	while($row = oci_fetch_array($result,OCI_RETURN_NULLS+OCI_ASSOC))
	{	$rows[]= $row;		
		
		/*echo "STOCK ID : " .$row['ID_STO']. "   ชื่อ : ".$row['NAME_STO']. "   จำนวน :  " .$row['AMOUNT']. "ซื้อ :  " .$row['BPRICE']. 
				"ใช้  :  " .$row['USED']. "วันที่เบิก : " .$row['D_USE']. "เข้า  : " .$row['ENTER']. "วันที่ของเข้า : " .$row['D_ENTER']. "<br>";*/
	}
		echo "<center><table><tr><td>รหัส</td><td>ชื่อ</td><td>จำนวน</td><td>ราคา</td><td>ใช้</td><td>วันที่ใช้</td><td>เข้า</td><td>วันที่ของเข้า</td></tr></table></center>";
	foreach ($rows as $STOCK)
		{
			$ID= $STOCK['ID_STO'];
			$NAME= $STOCK['NAME_STO'];
			$CAP = $STOCK['AMOUNT'];
			$PRICE = $STOCK['BPRICE'];
			$USE = $STOCK['USED'];
			$dUse = $STOCK['D_USE'];
			$ent = $STOCK['ENTER'];
			$dEnt = $STOCK['D_ENTER'];
			
			//echo "<table><tr><td>ID</td><td>NAME</td><td>PRICE</td></tr></table>";
			echo "<center><table><tr><td>$ID</td><td>$NAME</td><td>$CAP</td><td>$PRICE</td><td>$USE</td><td>$dUse</td><td>$ent</td><td>$dEnt</td></tr></table></center>";			
		}
	echo "<br><center><h3><a href='upDateStock.php'>Update Stock</a></h3></center>";
		
	
?>
<br>
<?PHP
	if(isset($_POST['submit'])){
		$ids = trim($_POST['select']);
		
		$query = "select * from STOCK WHERE ID_STO = '$ids'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		
		$rows = array();
				while($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)){
					$rows[]= $row;
				}
		
		echo "<table><tr><td>รหัส</td><td>ชื่อ</td><td>จำนวน</td><td>ราคา</td><td>ใช้</td><td>วันที่ใช้</td><td>เข้า</td><td>วันที่ของเข้า</td></tr></table>";
		foreach ($rows as $STOCK)
		{
			$ID= $STOCK['ID_STO'];
			$NAME= $STOCK['NAME_STO'];
			$CAP = $STOCK['AMOUNT'];
			$PRICE = $STOCK['BPRICE'];
			$USE = $STOCK['USED'];
			$dUse = $STOCK['D_USE'];
			$ent = $STOCK['ENTER'];
			$dEnt = $STOCK['D_ENTER'];
			
			//echo "<table><tr><td>ID</td><td>NAME</td><td>PRICE</td></tr></table>";
			echo "<table><tr><td>$ID</td><td>$NAME</td><td>$CAP</td><td>$PRICE</td><td>$USE</td><td>$dUse</td><td>$ent</td><td>$dEnt</td></tr></table>";			
		}
		};
?>


<form action='stock.php' method='post' align="center">
	<h3>ค้นหารายการ</h3>
	<input name='select' type='input' placeholder="กรุณาใส่หมายเลข ID STOCK">
	<input name='submit' type='submit' value='click' size="400px"> 
	<br>
	<div class="inner" align="right"><a href="HomeAdmin.php"><u>BACK HOME</u></a></div>
</form>
<br>
	
</body>
