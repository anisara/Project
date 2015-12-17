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
	<title> BPAY STOCK BASKET </title>
</head>
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
$query = "SELECT * FROM BPAYORDER order by ORDER_NO";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		$rows = array();
				while($row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC)){
					$rows[]= $row;
				}
		foreach ($rows as $review)
		{
			$number= $review['ORDER_NO'];
			$idM= $review['ID_MEM'];
			$size = $review['CSIZE'];
			$cake = $review['CAKE'];
			$cream = $review['CREAM'];
			$top1 = $review['TOPPING1'];
			$top2 = $review['TOPPING2'];
			$top3 = $review['TOPPING3'];
			$message = $review['MESSAGE'];
			$can = $review['CANDLE'];
			$price = $review['PRICE'];
			$sta = $review['STATUS'];
			echo "<li> Order_No : $number</li>";
			echo "<li> ID MEM  :  $idM</li>";
			echo "<li> Size  :  $size pound</li>";
			echo "<li> Cake  :  $cake</li>";
			echo "<li> Cream  :  $cream </li>";
			echo "<li> Topping1 :  $top1</li>";
			echo "<li> Topping2  :  $top2</li>";
			echo "<li> Topping3  :  $top3</li>";
			echo "<li> Message  :  $message</li>";
			echo "<li> STATUS : $sta<br><br></li>";
			
		}
		
if(isset($_POST['update'])){
	$num = trim($_POST['search']);
	$pay = "Yes";
	
	$sql = "UPDATE BPAYORDER SET STATUS = '$pay' WHERE ORDER_NO = $num";
	$result = oci_parse($conn,$sql);
	oci_execute($result);
		
		
}

?>


<form action='status.php' method='post'>
	
	<center><h2>Update Status payment  :</h2>  <input name='search' type='text' placeholder="กรุณาใส่หมายเลข ORDER No.">	
	<input name='update' type='submit' value='update' size="300px"> </center>
	<br>
	<div class="inner" align="right"><a href="HomeAdmin.php"><u>BACK HOME</u></a></div>
</form>
</body>
</html>