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
session_start(); // Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = mysqli_query($con,"SELECT user_name,user_level,user_ID FROM user_account WHERE user_name='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['user_name'];
$login_level = $row['user_level'];
$login_id = $row['user_ID'];
$_SESSION['login_id'] = $row['user_ID'];


if (!isset($login_session))
{
  mysqli_close($con); // Closing Connection
  header('Location: index.php'); // Redirecting To Home Page
}

?>
