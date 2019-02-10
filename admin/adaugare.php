<?php
if (isset($_POST) && !empty($_POST)){
    $username ="root";
    $password = "";
    $servername = "localhost";
    $db = "todo";
    $conection = mysqli_connect($servername, $username, $password, $db);
    if ($conection){
        echo "merge";
    }
    $query = "INSERT INTO `task` 
    SET `continut` = '".$_POST["text"]."',
        `deadline` = '".$_POST["deadline"]."'";
    echo $query;
    $result = mysqli_query($conection, $query);
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Adaugare</h1>
    <div class="container">
       <h1>Test</h1>
       <form action="./adaugare.php" method="post">
            <div class="form-group">
                <label for="text">Task</label>
                <input type="text" class="form-control" id="text"  name="text" placeholder="Introduce task">
             </div>
             <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="text" class="form-control" id="deadline"  name="deadline" placeholder=" wtv">
             </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../public/js/bootstrap.min.js"></script>
  </body>
</html>