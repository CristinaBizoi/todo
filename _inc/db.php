<?php
if(is_file("../config/db_config.php")){
    include ("../config/db_config.php");
}elseif(is_file("./config/db_config.php")){
    include ("./config/db_config.php");
}else{
    echo "No data";
}

function connect (){
    global $servername, $username, $password, $db;
    $con = mysqli_connect ($servername, $username, $password, $db);
    if (!$con){
        die ("nu merge conexiunea");

    }
    else {
    //    echo "merge conexiunea";
    }
    return $con;
}
function closedb ($con){
   mysqli_close($con);
}
function aplicaquery($con, $query){
    $result = mysqli_query($con, $query);
    return $result;
}
function getRow($result){
    // $task = array();
    while($row = mysqli_fetch_assoc($result)) {
        $task=$row;}
    return $task;
}

function getArray($result){
    $tasks = array();
    while ($row = mysqli_fetch_assoc($result)){
        $tasks[] = $row;

    }
    return $tasks;
}
?>