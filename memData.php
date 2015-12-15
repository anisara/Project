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
		table{
			
			border-collapse: collapse;
			width: 1200px;
			text-align: left;
		}
		tr, td {
			
			border-collapse: collapse;
			text-align: left;    
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


	$sql = "SELECT * FROM MEMBER ORDER BY ID_MEM";
	$result = oci_parse($conn,$sql);
	oci_execute($result);
	//$row = oci_fetch_array($result);
	//var_dump($row);
	//echo "STOCK ID : " .$row['ID_STO'] ." NAME : " .$row['NAME_STO'];
	
	//echo "Today is " . date("d-m-Y") . "<br><br><br>";

	$rows = array();
	while($row = oci_fetch_array($result,OCI_RETURN_NULLS+OCI_ASSOC))
	{	$rows[]= $row;		
		foreach ($rows as $MEM)
		{
			$id = $MEM['ID_MEM'];
			$name = $MEM['NAME_M'];
			$sur = $MEM['SUR_M'];
			$birth = $MEM['BIRTHDAY_M'];
			$addr = $MEM['ADDR'];
			$email = $MEM['EMAIL_M'];
			$tel = $MEM['TEL_M'];
		
		echo " รหัสสมาชิก : " .$id. "   ชื่อ : " .$name. "   นามสกุล :  " .$sur.  " วันเกิด :  " .$birth. 
							" ที่อยู่  :  " .$addr. " E-mail : " .$email.    "<br>";
		
		}
	}
		/*echo "<center>
						"" รหัสสมาชิก : " .$id. "   ชื่อ : " .$row['NAME_M']. "   นามสกุล :  " .$sur.  " วันเกิด :  " .$birth. 
							" ที่อยู่  :  " .$addr. " E-mail : " .$row['EMAIL_M']. " "  " โทร : " .$row['TEL_M']. "<br>"
				</center>";*/
	/*foreach ($rows as $MEM)
		{
			$id = $MEM['ID_MEM'];
			$name = $MEM['NAME_M'];
			$sur = $MEM['SUR_M'];
			$birth = $MEM['BIRTHDAY_M'];
			$addr = $MEM['ADDR'];
			$email = $MEM['EMAIL_M'];
			$tel = $MEM['TEL_M'];*/
			//$dEnt = $STOCK['D_ENTER'];
			
			//echo "<table><tr><td>ID</td><td>NAME</td><td>PRICE</td></tr></table>";
		//	echo "<center><table><tr><td>$id</td><td>$name</td><td>$sur</td><td>$birth</td><td>$addr</td><td>$email</td><td>$tel</td></tr></table></center>";			
		//}
	/*echo "<br><center><h3><a href='upDateStock.php'>Update Stock</a></h3></center>";*/
		
	
?>
<br>
<?PHP
	if(isset($_POST['submit'])){
		$ids = trim($_POST['select']);
		
		$query = "select * from MEMBER WHERE ID_MEM = '$ids'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		
		$rows = array();
				while($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)){
					$rows[]= $row;
				}
		
	//	echo "<center><table><tr><td>รหัสสมาชิก</td><td>ชื่อ</td><td>นามสกุล</td><td>วันเกิด</td><td>ที่อยู่</td><td>E-mail</td><td>โทร</td></tr></table></center>";
	foreach ($rows as $MEM)
		{
			$id = $MEM['ID_MEM'];
			$name = $MEM['NAME_M'];
			$sur = $MEM['SUR_M'];
			$birth = $MEM['BIRTHDAY_M'];
			$addr = $MEM['ADDR'];
			$email = $MEM['EMAIL_M'];
			$tel = $MEM['TEL_M'];
			
			echo " รหัสสมาชิก : " .$id. "   ชื่อ : " .$name. "   นามสกุล :  " .$sur.  " วันเกิด :  " .$birth. 
							" ที่อยู่  :  " .$addr. " E-mail : " .$email.    "<br>";
		
		/*echo " รหัสสมาชิก : " .$id. "   ชื่อ : " .$row['NAME_M']. "   นามสกุล :  " .$sur.  " วันเกิด :  " .$birth. 
							" ที่อยู่  :  " .$addr. " E-mail : " .$row['EMAIL_M'].    "<br>";*/
		
		}
		};
?>


<form action='memData.php' method='post' align="center">
	<h3>ค้นหารายการ</h3>
	<input name='select' type='input' placeholder="กรุณาใส่หมายเลข ID STOCK">
	<input name='submit' type='submit' value='click' size="400px"> 
	<br>
	<div class="inner" align="right"><a href="HomeAdmin.php"><u>BACK HOME</u></a></div>
</form>
<br>
	
</body>
