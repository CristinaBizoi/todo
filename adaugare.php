<?php

if (isset($_POST) && !empty($_POST)){
    include ("./_inc/db.php");
    $conection = connect();
    $query = "INSERT INTO `task` 
    SET `continut` = '".$_POST["text"]."',
        `deadline` = '".$_POST["deadline"]."'";
    echo $query;
    $result = aplicaquery($conection, $query);
    header("Location:./listare.php");
    $close =  closedb ($conection);
}
include("./header.php");
?>

    <div class="container">
      <div class="content-formular">
        <h1 class="textinchis">Adauga task</h1>
        <div class="formular">
          <form action="./adaugare.php" method="post">
                <div class="form-group">
                    <label for="text" class="textinchis">Task</label>
                    <input type="text" class="form-control" id="text"  name="text" placeholder="Introduce task">
                </div>
                <div class="form-group">
                    <label for="deadline" class="textinchis">Deadline</label>
                    <input type="text" class="form-control" id="deadline"  name="deadline" placeholder=" wtv">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../public/js/bootstrap.min.js"></script>
  </body>
</html>