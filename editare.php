<?php
include ("./_inc/db.php");
 $conection = connect();
if (isset($_POST) && !empty($_POST)){
    if ($conection){
        echo "merge";
    }
    $query = "UPDATE `task` 
    SET `continut` = '".$_POST["text"]."',
        `deadline` = '".$_POST["deadline"]."',
        `priority` = '".$_POST["priority"]."'
        WHERE `id` = '".$_GET["id"]."'";
    echo $query;
    $result = aplicaquery($conection, $query);
    if(mysqli_affected_rows($conection)>0){
        $mesaj = "Task-ul a fost editat";
    }else{
        $mesaj = "A ramas la fel";
    }
    header("Location:./index.php?mesaj=".urlencode($mesaj));
}
$query1 = "SELECT `task`.`continut` , `task`.`deadline` , `task`.`priority`
            FROM `task`
            WHERE `id`='".$_GET["id"]."'";
$result1 = aplicaquery($conection, $query1);
// var_dump($result1);
$task = getRow($result1);
// while($row = mysqli_fetch_assoc($result1)) {
//     $task=$row;//valoarea din baza de date il pun in array pt a.l afisa in formu
//   //asa (ca sus) adaug in array
//
include ("./header.php");
?>



    <div class="container">
        <div class="content-formular">
            <h1 class="textinchis">Editare task</h1>
            <div class="formular">
                <form action="./editare.php?id=<?php echo $_GET["id"];?>" method="post">
                        <div class="form-group">
                            <label for="text" class="textinchis">Task</label>
                            <input type="text" class="form-control" id="text"  name="text" value = "<?php echo $task["continut"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="deadline" class="textinchis">Deadline</label>
                            <input type="date" class="form-control date" id="deadline"  name="deadline" value = "<?php echo $task["deadline"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="priority" class="textinchis">Prioritate</label>
                            <select name="priority" id="priority" class="form-control">
                            <option value="0" <?php if($task["priority"]==0){ echo "selected"; } ?>>scazuta </option>
                            <option value="1" <?php if($task["priority"]==1){ echo "selected"; } ?>>medie </option>
                            <option value="2" <?php if($task["priority"]==2){ echo "selected"; } ?>>ridicata </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>

<?php
include ("./footer.php");
?>