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


if (isset($_POST['submit-thread'])) 
{
	$_POST['thread_Name'];
	//inseting new thread 
	$result = mysqli_query($con,"INSERT INTO message_thread (thread_Name) VALUES ('')");
	//getting the last value of created message thread 
	$last_id = mysqli_insert_id($con);
	$userid_participant = $login_id ;
	//first add the id of user created
	$result = mysqli_query($con,"INSERT INTO message_thread_participant (participant_threadID,participant_userID) VALUES ('$last_id','$userid_participant ')
	");
}

if (isset($_POST['submit-message'])) 
{
	
}

if (isset($_POST['submit-message'])) 
{
	//update state_dateRead where state_ID
	0000-00-00 00:00:00
}

?>