<?php 

include('../session.php'); 

$url = parse_url("mysql://b997849ceafd11:d2115bcc@us-cdbr-east-06.cleardb.net/heroku_e7b0ec896a85723?reconnect=true");

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
//

$con = 
new mysqli($server, $username, $password, $db)
 or die("ERROR");


	$cid = $_REQUEST['cid'];
	$result = mysqli_query($con,"DELETE  FROM `forum_comment` WHERE `comment_ID` = '$cid'");
	echo "<script>alert('Successfully Deleted');
						window.location='../forum.php';
					</script>";

?>