<?php
include_once 'connect.php';
    if(isset($_POST['id'])){
        
        $id = $_POST['id'];
        $sql = "SELECT * FROM cars WHERE ID=$id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $arr = [
                "id" => $row['ID'],
                "mark" => $row['Mark'],
                "model" => $row['Model'],
                "year" => $row['Year'],
                "color" => $row['Color'],
                "gearBox" => $row['Gearbox']
            ];
        }
        echo json_encode($arr);
    }