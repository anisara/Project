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
	<title> EDIT DATA </title>
</head>

<link href="./lib/demo.css" rel="stylesheet" type="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<div class="header" >
	<center><img src = "img/logoweb.gif" /></center>
</div>
<br>

<?PHP

	if(isset($_POST['submit'])){
		
		$id = trim($_SESSION['ID']);
		$addr = trim($_POST['addr']);
		$tel = trim($_POST['tel']);
		
			$sql5 = "UPDATE MEMBER SET ADDR='$addr',TEL_M='$tel' WHERE ID_MEM = '$id'"; //ต้องหาทางดึง ID มาใช้ ยังหาทางไมได้รุย
			$update5 = oci_parse($conn,$sql5);
			oci_execute($update5);
				
	}

?>


<center><form action='editData.php' method='post'>
	<h3>
	Addr : <textarea type="input" name="addr" cols = "45" rows = "5" ></textarea><br><br>
	Tel : <input name='tel' type='text'><br><br>
	<input name='submit' type='submit' value='Submit'> </h3>
	
</form></center>

</html>