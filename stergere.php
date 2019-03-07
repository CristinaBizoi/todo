<?php
// $username ="root";
// $password = "";
// $servername = "localhost";
// $db = "todo";
// $conection = mysqli_connect($servername, $username, $password, $db);
    include ("./_inc/db.php");
    $conection = connect();
    $query = "DELETE FROM `task` 
        WHERE `id` ='".$_GET["id"]."'";
    $result = aplicaquery($conection, $query);
    header("Location:./index.php");
    exit();
?>