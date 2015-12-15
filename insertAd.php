<?PHP
	session_start();
	// Create connection to Oracle
	$conn = oci_connect("system", "Plaiw001", "//localhost/XE");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;
	} //else{echo "Oracle connect";} 
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title> FOR ADMIN BPAY CAKE </title>
		<style>
			.error {color: #FF0000;}
		</style>
		
	</head>
	
<?PHP
	if(isset($_POST['submit'])){
		
		//$tmp =$row['ID_MEM'];
		//$tmp=count(ID_MEM);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$confirm = trim($_POST['confirm']);
		$name = trim($_POST['name']);
		$sur = trim($_POST['surname']);
		$birth = trim($_POST['birth']);
		$sex = trim($_POST['sex']);
		$salary = trim($_POST['salary']);
		$tel = trim($_POST['tel']);
				
		if($password == $confirm){
			$query = "INSERT INTO PERSON(NAME_P, SUR_P, BIRTH,  USERNAME, PASSWORD, TEL_P,SEX,SALARY)
							VALUES ('$name','$sur','$birth','$username','$password','$tel','$sex','$salary')";	
		
			$result = oci_parse($conn,$query);
			oci_execute($result);
		}else{echo "Register fail : password must to same confirm";}
			
			
		
	};
	oci_close($conn);
	
?>

<link href="./lib/demo.css" rel="stylesheet" type="text/css">

<style type="text/css">
	.pic6{
	margin : 0px 325px
	}
	div.homebut{
	width: 1000px;
	height:100px;
	}
	div.show{
	width: 1000px;
	height:540px;
	overflow:hidden;
	}
	p.slide{
	width: 4000px;
	height:500px;
	margin:0;
	}
	div.body
	{
		position: relative;
		margin-left: 500px;
	}

</style>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<body>
<div class="header" >
	<img width="1346px" src = "img/registerheader.jpg" />
</div>
<br>

<div class="body">
<form action='insertAd.php' method='post'>
	<h3>* โปรดกรอกข้อมูลให้ครบถ้วน</h3>
	<br>
	Username : <input type="input" name="username"><br><br>
	Password : <input name="password" type="password"><br><br>
	Re-Password : <input name="confirm" type="password"><br><br>
	Name : <input type="input" name="name"><br><br>
	Surname : <input type="input" name="surname"><br><br>
	Birthday : <input type="input" name="birth"><br><br>
	Sex : <input type="radio" name="sex" value="male" checked>Male  <input type="radio" name="sex" value="female">Female<br><br>
	Salary : <input type="input" name="salary"><br><br>
	Tel : <input type="input" name="tel"><br><br>
	
	<input type="submit" name="submit" value="Register">
	<br>
</form>
</div>
</body>


</html>