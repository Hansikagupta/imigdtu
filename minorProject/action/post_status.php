<?php 

// Establishing Connection with Server by passing server_name, user_id and password as a parameter

$url = parse_url("mysql://b997849ceafd11:d2115bcc@us-cdbr-east-06.cleardb.net/heroku_e7b0ec896a85723?reconnect=true");

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
//

$con = 
new mysqli($server, $username, $password, $db)
 or die("ERROR");
$stat = $_REQUEST['stat'];
$pID = $_REQUEST['pID'];
$stat = stripslashes($stat);
$pID = stripslashes($pID);
$stat = mysqli_real_escape_string($con,$stat);
$pID = mysqli_real_escape_string($con,$pID);
$hashID = password_hash($pID, PASSWORD_DEFAULT);
mysqli_query($con,"UPDATE `forum_topic` SET `post_status` = '$stat' WHERE `topic_ID` = '$pID'");
echo "<script>alert('Successfully $stat');
											window.location='../forum_view.php?post_ID=$hashID';
										</script>";

?>