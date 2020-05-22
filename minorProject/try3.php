<!DOCTYPE html>
<html>
<head>
    <title></title>

    <?php include('meta.php');?>
    <?php include('style_css.php');
    include("db.php");
    ?>
<?php  
    $survey_question = $_POST["survey_question"];
    echo "The quetion you selected is ".$survey_question."<br>";
    $s_qid = $survey_question;
    $survey_aId = mysqli_query($con,"SELECT survey_aID, answer FROM survey_anweroptions WHERE survey_qID = '$s_qid'");
    echo "No of records : ".$survey_aId->num_rows."<br>";
    $php_data_array = Array();
    while($data = mysqli_fetch_array($survey_aId))
    {
        $survey_answerID = $data[0];
        $survey_answer = mysqli_query($con,"SELECT COUNT(user_ID) FROM survey_answer WHERE survey_aID = '$survey_answerID'");
        echo "No of records : ".$survey_answer->num_rows."<br>";
        $answer_array = Array();
        $count = mysqli_fetch_array($survey_answer);
        echo "Answer is ".$data[1]."<br>";
        echo "Count is".$count[0]."<br>";
        array_push($answer_array,$data[1],$count[0]);
        array_push($php_data_array,$answer_array);
    }
    echo json_encode($php_data_array);
    echo '<div id="chart_div"></div>';
    echo "<script>
        var my_2d = ".json_encode($php_data_array)."
        </script>";
    echo "<script>
        var i;
        for(i = 0;i < my_2d.length;i++)
        {
            data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
        }
    </script>";
    echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"> </script>';

    echo "<script>
        google.charts.load('current', {'packages':['corechart']});
        // Draw the pie chart when Charts is loaded.
        google.charts.setOnLoadCallback(draw_my_chart);
        // Callback that draws the pie chart
        function draw_my_chart() {
            // Create the data table .
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'answer');
            data.addColumn('number', 'Nos');
            for(i = 0; i < my_2d.length; i++)
        data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
    // above row adds the JavaScript two dimensional array data into required chart format
        var options = {title:'Results of the survey are : ',
                        width:600,
                        height:500};

            // Instantiate and draw the chart
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>";
    ?>
    </head>
<body>
            
   