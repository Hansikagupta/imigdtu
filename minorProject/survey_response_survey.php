<!DOCTYPE html>
<html>
<head>
    <title></title>

    <?php 
    include('meta.php');
    include('style_css.php');
    include("db.php");
    ?>
    <?php
        $survey_list = mysqli_query($con,"SELECT survey_ID, survey_name FROM survey");
        echo "No. of surveys : ".$survey_list->num_rows."<br>";
        echo "Choose a survey :<br>"
    ?>
    <form id="survey" action="survey_response_question.php" method="post">
    <select id="survey" name="survey_name">
        <?php
        while( $data1 = mysqli_fetch_array($survey_list)){
                $x_name = $data1[1];
                $x_value = $data1[0];
            ?>
                <option value="<?php echo $x_value?>"><?php echo $x_name?></option>
            <?php
            }
        ?>
    </select>
    <input type="submit">
    </form>
    </head>
<body>