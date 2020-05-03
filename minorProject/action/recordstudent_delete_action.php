<?php 
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

$url = parse_url("mysql://b997849ceafd11:d2115bcc@us-cdbr-east-06.cleardb.net/heroku_e7b0ec896a85723?reconnect=true");

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
//

$conn = 
new mysqli($server, $username, $password, $db)
 or die("ERROR");
$studentID = $_REQUEST['studentID'];
$verfy_sql = mysqli_query($con,"SELECT * FROM `user_student_detail` WHERE student_ID = '$studentID'");
$verfy_qry = mysqli_fetch_array($verfy_sql);
$student_userID = $verfy_qry['student_userID'];
if ($student_userID == 0) {
	mysqli_query($con,"DELETE FROM `user_student_detail` WHERE `student_ID` = '$studentID'");
}
else
{
	
	mysqli_query($con,"DELETE FROM `user_account` WHERE `user_ID` = '$student_userID'");
	mysqli_query($con,"DELETE FROM `user_student_detail` WHERE `student_ID` = '$studentID'");
}


echo "<script>alert('Successfully Deleted');
						window.location='../recordstudent.php';
					</script>";


?>