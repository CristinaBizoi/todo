<?php
    include ("../_inc/db.php");
    $conection =  connect();
    // $username ="root";
    // $password = "";
    // $servername = "localhost";
    // $db = "todo";
    // $conection = mysqli_connect($servername, $username, $password, $db);
    if ($conection){
        // echo "merge";
    }
    $query = "SELECT  `task`.`id`, `task`.`continut`, `task`.`deadline`
     FROM  `task` 
     WHERE 1";
    // echo $query;
    $result = aplicaquery($conection, $query);
    // echo $result;
    // var_dump($result);
    $tasks = getArray($result);

    
    //fac un array in care pun fiecare rand rezultat din query.
    // $tasks = array();
    // while($row = mysqli_fetch_assoc($result)) {
    //     $tasks[]=$row;//valoarea din baza de date il pun in array pt a.l afisa in formu
    //   //asa (ca sus) adaug in array
    // }

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Listare <small><a href="./adaugare.php"><i class="fas fa-plus"></i></a></small></h1> 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <p>TEST CARD</p>
                </div>
            </div>
        </div>

    <div class="table-responsive">
        <table class="table">
        <tbody>
            <tr>
                <th> ID </th>
                <th> Continut </th>
                <th> Deadline </th>
                <th> Operatii </th>
            </tr>
            <?php
            foreach ($tasks as $key => $task){
            ?>
            <tr>
                <td class=""><?php echo $task["id"]; ?></td>
                <td class=""><?php echo $task["continut"]; ?></td>
                <td class=""><?php echo $task["deadline"]; ?></td>
                <td class="">
                <a href = "./editare.php?id=<?php  echo $task["id"]; ?>"><i class="fas fa-edit"></i></a>
                <a href = "./stergere.php?id=<?php  echo $task["id"]; ?>"><i class="fas fa-trash"></i></a>
                
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
        </div>
    </div>
<?php
include("./footer.php");
?>