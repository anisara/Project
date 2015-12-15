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
	<title> UPDATE STOCK </title>
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
	

if(isset($_POST['sub'])){	
	
	$id = trim($_POST['id']);
	$num = trim($_POST['num']);
	$dateuse =  date("d-m-Y") ;
	
	$sql = "UPDATE STOCK SET AMOUNT = (AMOUNT - '$num') , USED = '$num' , D_USE = '$dateuse'  WHERE ID_STO = '$id'";
	$update = oci_parse($conn,$sql);
	oci_execute($update);
	
	//$row = oci_fetch_array($update, OCI_RETURN_NULLS+OCI_ASSOC);
	
}
if(isset($_POST['add'])){
	
	$id = trim($_POST['id']);
	$num = trim($_POST['num']);
	$dateuse =  date("d-m-Y") ;
		
	$sql2 = "UPDATE STOCK SET AMOUNT = (AMOUNT + '$num') , ENTER = '$num' , D_ENTER = '$dateuse'  WHERE ID_STO = '$id'";
	$update2 = oci_parse($conn,$sql2);
	oci_execute($update2);
	
}

?>



<form action ='updateStock.php' method='post'>
	<center><h3>ของที่เบิก :    <select name="id">
				<option value="1">เทียน</option>
				<option value="2">มีด</option>
				<option value="3">ถาด</option>
				<option value="4">กล่อง</option>
				<option value="5">ป้ายต่างๆ</option>
				<option value="6">วิปปิ้งครีมแต่งหน้าเค้ก</option>
				<option value="7">เชอร์รี่สด</option>
				<option value="8">กล้วยสด</option>
				<option value="9">ส้มสด</option>
				<option value="10">บลูเบอร์รี่สด</option>
				<option value="11">เอ็ม&เอ็ม</option>
				<option value="12">โอริโอ้</option>
				<option value="13">คิทแคท</option>
				<option value="14">สตอเบอร์รี่สด</option>
				<option value="15">เกล็ดช็อคโกแลต</option>
				<option value="16">เกล็ดสายรุ่ง</option>
				<option value="17">ไอซ์ซิ่งใบไม้</option>
				<option value="18">ไอซ์ซื่งดอกไม้</option>
				<option value="19">ไอซ์ซิ่งหัวใจ</option>
				<option value="20">เม็ดน้ำตาลกลม</option>
				<option value="21">แป้งเค้ก</option>
				<option value="22">ผงฟู</option>
				<option value="23">เบกกิ้งโซดา</option>
				<option value="24">เกลือป่น</option>
				<option value="25">น้ำตาลทรายขาว</option>
				<option value="26">น้ำตาลทรายแดง</option>
				<option value="27">น้ำตาลไอซิ่ง</option>
				<option value="28">เนยจืด</option>
				<option value="29">เนยเค็ม</option>
				<option value="30">เนยขาว</option>
				<option value="31">ไข่ไก่</option>
				<option value="32">ไข่เป็ด</option>
				<option value="33">นมข้นจืด</option>
				<option value="34">นมข้นหวาน</option>
				<option value="35">น้ำมะนาว</option>
				<option value="36">น้ำมันพืช</option>
				<option value="37">ผงวุ้น</option>
				<option value="38">แป้งข้าวโพด</option>
				<option value="39">ครีมชีส</option>
				<option value="40">นมสด</option>
				<option value="41">วิปปิ้งครีม</option>
				<option value="42">ผงโกโก้</option>
				<option value="43">ผงชาเขียว</option>
				<option value="44">ดาร์คช็อคโกแลต</option>
				<option value="45">ไวท์ช็อคโกแลต</option>
				<option value="46">เซมิช็อคโกแลต</option>
				<option value="47">ใบเตย</option>
				<option value="48">ผงคัสตาร์ดครีม</option>
				<option value="49">ผงเจลาติน</option>
				<option value="50">เจลาตินแผ่น</option>
				<option value="51">ฝักวนิลา</option>
				<option value="52">ครีมออฟทาร์ทาร์</option>
				<option value="53">ลูกเกดดำ</option>
				<option value="54">บลูเบอรร์กวน</option>
				<option value="55">เชอร์รี่กวน</option>
				<option value="56">สตรอเบอร์รี่กวน</option>
				<option value="57">ผงชินามอน</option>
				<option value="58">มิกซ์ฟรุต</option>
				<option value="59">แป้งกวนไส้</option>
				<option value="60">เชอร์รี่ดำ</option>
				<option value="61">มาร์การีน</option>
				<option value="62">ข้าวโอ๊ต</option>
				<option value="63">อัลมอนด์</option>
				<option value="64">เม็ดมะม่วง</option>
				<option value="65">วอลนัท</option>
				<option value="66">กลิ่นเลม่อน</option>
				<option value="67">กลิ่นวนิลา</option>
				<option value="68">กลิ่นใบเตย</option>
				<option value="69">กลิ่นรัม</option>
				<option value="70">กลิ่นมอคค่า</option>
				<option value="71">กลิ่นเนยนม</option>
				<option value="72">สีน้ำตาล</option>
				<option value="73">สีฟ้า</option>
				<option value="74">สีแดง</option>
				<option value="75">สีเหลือง</option>
				<option value="76">สีชมพู</option>
				<option value="77">สีเขียว</option>
				<option value="78">สีม่วง</option>
				<option value="79">สีดำ</option>
				<option value="80">สีส้ม</option>
								
				
			  </select>
	จำนวน :  <select name="num">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
			</select></h3>
	
	<br>
	<input name='sub' type='submit' value='เบิก'>     
	<input name="add" type ="submit" value="เพิ่ม" ></center>
	<br>
	<div class="inner" align="right"><a href="HomeAdmin.php"><u>BACK HOME</u></a></div>
	
</form>
<html>