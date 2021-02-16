<?php
    if(isset($_POST['id'])){
        include_once 'connect.php';
        $id = $_POST['id'];

        $stmt = mysqli_prepare($conn, "DELETE FROM cars WHERE ID=?");
            
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
    }