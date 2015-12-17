<?PHP
	session_start();
	// Create connection to Oracle
	$error = "";
	$conn = oci_connect("system", "Plaiw001", "//localhost/XE");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;
	} 
?>

<?PHP
	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$query = "SELECT * FROM PERSON WHERE username='$username' and password='$password'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
		if($row != null)
		{	
		// Fetch each row in an associative array	
			$_SESSION['ID'] = $row['ID_P'];
			$_SESSION['NAME'] = $row['NAME_P'];
			$_SESSION['SURNAME'] = $row['SUR_P'];
			$_SESSION['BIRTHDAY'] = $row['BIRTH'];
			$_SESSION['SEX'] = $row['SEX'];
			$_SESSION['USER'] = $row['USERNAME'];
			$_SESSION['ADDR'] = $row['ADDR'];
			//$_SESSION['EMAIL'] = $row['EMAIL_M'];
			$_SESSION['TEl'] = $row['TEL_P'];
			header("location: HomeAdmin.php");
		}
		else{
			$error = "Your Username or Password is incorrect";
		}
	};
	oci_close($conn);
?>
<br><br><br><br><br>
<div align="center">
		<img src = "img/logoweb.gif"  width="259px" height="200px"/>
</div>

<form action='loginAdmin.php' method='post' align="center">
	<h4>Username<br>
	<input name='username' type='input'><br>
	Password<br>
	<input name='password' type='password'><br>
	<br>
	<input name='submit' type='submit' value='Login' size="200px"> 
</form>
<center><?php echo "$error" ?></center>
<hr size="4" color="#8d208a" width="60%"/>