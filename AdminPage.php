<?PHP
	session_start();
	if(empty($_SESSION['ID']) || empty($_SESSION['NAME']) || empty($_SESSION['SURNAME'])){
		echo '<script>window.location = "LoginAdmin.php";</script>';
	}
?>


<html>
<head>
<title>Admin information</title>
</head>
<link href="./lib/demo.css" rel="stylesheet" type="text/css">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<body>
<div class="header" >
	<center><img src = "img/logoweb.gif" /></center>
</div>
<br>
<h3>
<div class="inner" style="margin-left: 400px">
<?PHP
	echo "ID : ".$_SESSION['ID']."<br>";
	echo "Name : ".$_SESSION['NAME']."<br>";
	echo "Surname : ".$_SESSION['SURNAME']."<br>";
	echo "Birthday  : ".$_SESSION['BIRTHDAY']."<br>";
	echo "Sex  :  ".$_SESSION['SEX']."<br>";
	echo "Username  ".$_SESSION['USER']."<br>";
	//echo "Address : ".$_SESSION['ADDR']."<br>";
	//echo "E-mail  : ".$_SESSION['EMAIL']."<br>";
	echo "Tel :  ".$_SESSION['TEl']."<br>";
	echo "<a href='Logout.php'>Logout</a>";
?>
</div></h3>

<div class="inner" align="right"><a href="HomeAdmin.php"><u>BACK HOME</u></a></div>

</html>