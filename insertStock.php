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

<?PHP
	if(isset($_POST['submit'])){

	$name = trim($_POST['stName']);
	$pri = trim($_POST['price']);
	
	$sql = "INSERT INTO STOCK (NAME_STO,AMOUNT,BPRICE) VALUES ('$name',0,'$pri')";
	$result = oci_parse($conn,$sql);
	oci_execute($result);
	
	}

?>

<html>
<head>
<title>Insert item</title>
</head>
<link href="./lib/demo2.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<div class="header" >
	<center><img src = "img/logoweb.gif" /></center>
</div>
<br>
<form action='insertStock.php' method="post">
	<center><h3>
	ชื่อ : <input type="input" name="stName">
	ราคาซื้อ : <input type='input' name='price'></h3>
	<br>
	<input name='submit' type='submit' value='Insert' size="200px"></center>
	<br>
	<div class="inner" align="right"><a href="HomeAdmin.php"><u>BACK HOME</u></a></div>
</form>
</body>
</html>