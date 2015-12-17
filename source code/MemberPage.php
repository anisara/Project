<?PHP
	session_start();
	if(empty($_SESSION['ID']) || empty($_SESSION['NAME']) || empty($_SESSION['SURNAME'])){
		echo '<script>window.location = "Login.php";</script>';
	}
?>


<html>
<head>
<title>Your information</title>
</head>
<link href="./lib/demo.css" rel="stylesheet" type="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<div class="header" >
	<center><img src = "img/logoweb.gif" /></center>
</div>
<br>

<div>
<?PHP

	/*$idM = trim($_SESSION['ID']);

	$sql = "SELECT * FROM MEMBER WHERE ID_MEM = '$idM'";
	$result = oci_parse($conn,$sql);
	oci_execute($result);
	
	
	while($row = oci_fetch_array($result))
	{	
		//เปลี่ยนตรงนี้ให้ตรงกับหัวตารางมึงนะ
		echo "ID : " .$idM. "    Name : " .$row['Name_M']. "   Surname :  " .$row['Sur_M']. "Birthday :  " .$row['BIRTHDAY_M']. " Sex  : " .$row['SEX']. 
				"  โทร :  " .$row['TEL_M']. 	"ที่อยู่  :  " .$row['ADDR']. "E-mail   : " .$row['EMAIL_M']. "<br>";
		
		
	}*/
	
	
	echo "ID : ".$_SESSION['ID']."<br>";
	echo "Name : ".$_SESSION['NAME']."<br>";
	echo "Surname : ".$_SESSION['SURNAME']."<br>";
	echo "Birthday  : ".$_SESSION['BIRTHDAY']."<br>";
	echo "Sex  :  ".$_SESSION['SEX']."<br>";
	echo "Username  ".$_SESSION['USER']."<br>";
	echo "Address : ".$_SESSION['ADDR']."<br>";
	echo "E-mail  : ".$_SESSION['EMAIL']."<br>";
	echo "Tel :  ".$_SESSION['TEl']."<br>";
	echo "<a href='Logout.php'>Logout</a>";
?>
</div>
<div class="inner" align="center"><a href="editData.php"><u>Edit your information</u></a></div>
<div class="inner" align="right"><a href="HomeMember.php"><u>BACK HOME</u></a></div>

</html>
