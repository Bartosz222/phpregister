<?php 
include ('connect.php');
if(isset($_POST['model'])){
    $id= $_POST['id'];
    $Mark= $_POST['mark'];
    $Model= $_POST['model'];
    $Year= $_POST['year'];
    $Color= $_POST['color'];
    $Gearbox= $_POST['gearbox'];


    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, 'UPDATE cars SET mark=?, model=?, year=?, color=?, gearbox=? WHERE id=?')){
mysqli_stmt_bind_param($stmt, "ssissi", $Mark, $Model, $Year, $Color, $Gearbox, $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

    
    };
    mysqli_close($conn);
    
    
    
    
}
?>