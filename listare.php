<?php
    include ("./_inc/db.php");
    $conection =  connect();
    if ($conection){
        // echo "merge";
    }
    $query = "SELECT  `task`.`id`, `task`.`continut`, `task`.`deadline`, `task`.`checked`
     FROM  `task` 
     WHERE 1
     ORDER BY `checked` asc";
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
    include ("./header.php");
?>      

<?php
                        $task_num = 0;
                        foreach ($tasks as $key => $task){ 
                            if($task["checked"]==0){
                                $task_num++;
                            }
                            }
                            ?>

    <div class="container">
            <div class="headoftable">
                <div class="col-1 leftposition">
                    <h1 class="textinchis"><?php echo date("l").",". date("jS"); ?></h1>
                    <h3 class="textdeschis"><?php echo date("F"); ?> </h3>
                    <h3 class="hidden-date textdeschis"> <?php echo $task_num; ?> Tasks </h3>
                </div>
                <div class="col-2 leftposition">
                    <div class="tasks textdeschis">
                       
                        <h3 class="luna hidden-task"> <?php echo $task_num; ?> Tasks </h3>
                    </div>
                    <a href="./adaugare.php" id="buton" class="leftposition"><i class="fas fa-plus"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
        <?php /*
        if(isset($_GET["mesaj"])&& !empty($_GET["mesaj"])){
        ?> 
        <p class ="bg-success"> <?php echo $_GET["mesaj"]; ?> </p>
        <?php } */?>
        <div class="container-table">
            <div class="table-responsive">
                <table class="table">
                <!-- <thead>
                    <tr>
                        <th> ID </th>
                        <th> Continut </th>
                        <th> Deadline </th>
                        <th> Operatii </th>
                    </tr>
                </thead> -->
                <tbody>
                    <?php
                    foreach ($tasks as $key => $task){
                        if($task["checked"]==1){
                            $class = "finish";
                        }
                        else{
                            $class = "stillactive";
                        }
                    ?>
                    <tr class="<?php echo $class; ?>">
                        <!-- <td id="color"></td> -->
                        <td class="idtask textinchis"><?php echo $task["id"]; ?></td>
                        <td class="titlutask evidentiat"><?php echo $task["continut"]; ?>
                        <div class="deadlinetask textdeschis"> <span class="ingrosat">Deadline:</span> <?php echo $task["deadline"]; ?> </div>
                        </td>
                        <td class="operatii">
                        <?php 
                        if ($task["checked"]==0){
                        ?>
                        <a href = "./checked.php?id=<?php  echo $task["id"]; ?>"><i class="fas fa-check"></i></a>
                        <?php 
                        }
                        ?>
                        <a href = "./editare.php?id=<?php  echo $task["id"]; ?>"><i class="fas fa-edit"></i></a>
                        <a href = "./stergere.php?id=<?php  echo $task["id"]; ?>"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                
                </table>
                </div>
        </div>
    </div>

 <?php
include ("./footer.php");
?>