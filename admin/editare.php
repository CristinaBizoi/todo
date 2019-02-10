<?php
include ("../_inc/db.php");
 $conection = connect();
if (isset($_POST) && !empty($_POST)){
    if ($conection){
        echo "merge";
    }
    $query = "UPDATE `task` 
    SET `continut` = '".$_POST["text"]."',
        `deadline` = '".$_POST["deadline"]."'
        WHERE `id` = '".$_GET["id"]."'";
    echo $query;
    $result = aplicaquery($conection, $query);
    header("Location:./listare.php");
}
$query1 = "SELECT `task`.`continut` , `task`.`deadline` 
            FROM `task`
            WHERE `id`='".$_GET["id"]."'";
$result1 = aplicaquery($conection, $query1);
// var_dump($result1);
$task = getRow($result1);
// while($row = mysqli_fetch_assoc($result1)) {
//     $task=$row;//valoarea din baza de date il pun in array pt a.l afisa in formu
//   //asa (ca sus) adaug in array
//
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
       <form action="./editare.php?id=<?php echo $_GET["id"];?>" method="post">
            <div class="form-group">
                <label for="text">Task</label>
                <input type="text" class="form-control" id="text"  name="text" value = "<?php echo $task["continut"]; ?>">
             </div>
             <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="text" class="form-control" id="deadline"  name="deadline" value = "<?php echo $task["deadline"]; ?>">
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