<?php 


$url = parse_url("mysql://b997849ceafd11:d2115bcc@us-cdbr-east-06.cleardb.net/heroku_e7b0ec896a85723?reconnect=true");

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
//

$conn = 
new mysqli($server, $username, $password, $db)
 or die("ERROR");
if (isset($_POST['submit-course'])) {
    echo $Course = $_POST['Course'];
    echo $Acronym = $_POST['Acronym'];
    echo $Department = $_POST['Department'];

   mysqli_query($con,"INSERT INTO `cvsu_course` (`course_ID`, `course_departmentID`, `course_name`, `course_acronym`) VALUES (NULL, '$Department', '$Course', '$Acronym');");
    echo "<script>alert('Successfully Added!');
                                                window.location='../course';
                                            </script>";
}

if (isset($_POST['edit-course'])) {

    echo $id = $_REQUEST['id']; 
    echo $Course = $_POST['Course'];
    echo $Acronym = $_POST['Acronym'];
    echo $Department = $_POST['Department'];
    mysqli_query($con,"UPDATE `cvsu_course` SET `course_departmentID` = '$Department',`course_name` = '$Course',`course_acronym` ='$Acronym'   WHERE `cvsu_course`.`course_ID` = '$id'");
    echo "<script>alert('Successfully Edit!');
                                                window.location='../course';
                                            </script>";
}
if (isset($_POST['delete-course'])) {
    $id = $_REQUEST['id']; 
    mysqli_query($con,"DELETE FROM `cvsu_course` WHERE `cvsu_course`.`course_ID` = $id");
    echo "<script>alert('Successfully Deleted!');
                                                window.location='../course';
                                            </script>";
}
?>