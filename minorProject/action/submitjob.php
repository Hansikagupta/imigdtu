<?php 


$url = parse_url("mysql://b997849ceafd11:d2115bcc@us-cdbr-east-06.cleardb.net/heroku_e7b0ec896a85723?reconnect=true");

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
//

$con = 
new mysqli($server, $username, $password, $db)
 or die("ERROR");
if (isset($_POST['submit-job'])) {
    echo $Title = $_POST['Title'];
    echo $course = $_POST['course'];
   mysqli_query($con,"INSERT INTO `suggested_job` (`job_ID`, `job_Title`, `job_Course`) VALUES (NULL, '$Title', '$course')");
    echo "<script>alert('Successfully Added!');
                                                window.location='../suggestedjob';
                                            </script>";
}

if (isset($_POST['edit-job'])) {

    echo $id = $_REQUEST['id']; 
    echo $Title = $_POST['Title'];
    echo $course = $_POST['course'];
    mysqli_query($con,"UPDATE `suggested_job` SET `job_Title` = '$Title',`job_Course` = '$course' WHERE `suggested_job`.`job_ID` = '$id'");
    echo "<script>alert('Successfully Edit!');
                                                window.location='../suggestedjob';
                                            </script>";
}
if (isset($_POST['delete-job'])) {
    $id = $_REQUEST['id']; 
    mysqli_query($con,"DELETE FROM `suggested_job` WHERE `suggested_job`.`job_ID` = $id");
    echo "<script>alert('Successfully Deleted!');
                                                window.location='../suggestedjob';
                                            </script>";
}
?>