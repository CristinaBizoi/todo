<?php
$username ="root";
$password = "";
$servername = "localhost";
$db = "todo";
$conection = mysqli_connect($servername, $username, $password, $db);
$query = "DELETE FROM `task` 
       WHERE `id` ='".$_GET["id"]."'";
$result = mysqli_query($conection, $query);
header("Location:./listare.php");
exit();
?>