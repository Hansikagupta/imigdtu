<!DOCTYPE html>
<html>
<head>
    <title></title>
<body>
    <?php
        include('meta.php');
        include('style_css.php');
        include("db.php");
        $survey_id = $_POST["survey_name"];
        $survey_question = mysqli_query($con,"SELECT survey_qID, question FROM survey_questionnaire where survey_ID = $survey_id");
        echo "No of questions are ".$survey_question->num_rows."<br>";
        echo "Choose a question : <br>";
    ?>
    <form id="survey" action="try3.php" method="post">
    <select id="survey" name="survey_question">
        <?php
        while( $data1 = mysqli_fetch_array($survey_question)){
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
</body>
</head>
</html>