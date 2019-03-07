<?php
include("./_inc/db.php");
$con = connect();
$id = mysqli_real_escape_string($con, $_GET["id"]);
$query = "SELECT  `task`.`id`, `task`.`continut`, `task`.`deadline`, `task`.`checked`
        FROM  `task` 
        WHERE `task`.`id`='".$id."'";
// echo $query;
$rezultat = aplicaquery($con, $query);
$task = getRow($rezultat);
$status = $task["checked"];
if($status == 0){
    $status = 1;
    $query1 = "UPDATE `task`
            SET `task`.`checked`='".$status."'
            WHERE `task`.`id`='".$id."'"; 
    echo $query1;
    $rezultat1 = aplicaquery($con, $query1);
    if(mysqli_affected_rows($con) > 0){
        $mesaj = "Task-ul a fost rezolvat";
        header("Location:./index.php?mesaj=$mesaj");
        exit();
    }

}
// elseif($status == 0){
//     $status = 1;
//     $query2 = "UPDATE `homepage_images`
//             SET `homepage_images`.`status`='".$status."'
//             WHERE `id`='".$id."'"; 
//     $rezultat2 = queryactive($con, $query2);
//     if(mysqli_affected_rows($con) > 0){
//         $mesaj = "Bannerul s-a activat";
//         header("Location:./banner_listare.php?mesaj=$mesaj");
//         exit();
//     }
// }

?>