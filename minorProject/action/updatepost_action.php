<?php






//
$url = parse_url("mysql://b997849ceafd11:d2115bcc@us-cdbr-east-06.cleardb.net/heroku_e7b0ec896a85723?reconnect=true");

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
//

$con =
new mysqli($server, $username, $password, $db)
 or die("ERROR");

$post_ID = $_REQUEST['post_ID'];
if (isset($_POST['submit_updatetopic'])) {
	$updatepost_title = $_POST['updatepost_title'];
	$updatepost_content = $_POST['updatepost_content'];
	$updatepost_title = stripslashes($updatepost_title);
	$updatepost_content = stripslashes($updatepost_content);
	$updatepost_title = mysqli_real_escape_string($con,$updatepost_title);
	$updatepost_content = mysqli_real_escape_string($con,$updatepost_content);

	mysqli_query($con,"UPDATE `forum_topic` SET  `post_title` = '$updatepost_title' ,`post_content` = '$updatepost_content', `post_status` = 'UNPIN' WHERE `topic_ID` = '$post_ID'");
$req_encypted_postID = password_hash($post_ID, PASSWORD_DEFAULT);
	echo "<script>alert('Successfully Updated');
											window.location='../forum_view.php?post_ID=$req_encypted_postID';
										</script>";

}
?>
