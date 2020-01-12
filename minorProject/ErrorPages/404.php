<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>404</title>
    <?php 
    include('head.php');
    ?>
</head>

<body class="error">
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2 text-center">
            <div class="logo">
                <h1>404</h1>
            </div>
            <p class="lead text-muted">Nope, not here.</p>
            <div class="clearfix"></div>
            
            <div class="clearfix"></div>
            <div class="sr-only">
                &nbsp;
            </div>
            <br>
            <div class="col-lg-6 col-lg-offset-3">
                <div class="btn-group btn-group-justified">
                    <a onclick="goBack()" class="btn btn-info">Return Back</a>
                    <a href="../index.php" class="btn btn-warning">Return Dashboard</a>
                </div>
            </div>
        </div>
        <!-- /.col-lg-8 col-offset-2 -->
    </div>
</body>

</html>
<?php 
   include('back_history.php');
?>
