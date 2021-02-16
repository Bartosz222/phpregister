<?php
    if(isset($_POST['model'])){
        include_once 'connect.php';
        $mark = $_POST['mark'];
        $model= $_POST['model'];
        $year= $_POST['year'];
        $color= $_POST['color'];
        $gearBox= $_POST['gear-box'];

        $stmt = mysqli_prepare($conn, "INSERT INTO cars VALUES (NULL,?, ?, ?, ?,?)");
            
        mysqli_stmt_bind_param($stmt, 'ssiss', $mark,$model,$year,$color, $gearBox);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../index.php");
        
    }