<div class="cars-bar">
    <div class="type-bar">
        <div class="car-item">
            <p>id</p>
        </div>
        <div class="car-item">
            <p>Marka</p>
        </div>
        <div class="car-item">
            <p>Model</p>
        </div>
        <div class="car-item">
            <p>Rocznik</p>
        </div>
        <div class="car-item">
            <p>Kolor</p>
        </div>
        <div class="car-item">
            <p>Skrzynia biegów</p>
        </div>
        <div class="car-item">
            <p>Edytuj</p>
        </div>
        <div class="car-item">
            <p>Usuń</p>
        </div>
    </div>
<?php
require_once('connect.php');
$count = 1;
$sql = 'SELECT * FROM cars';
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
?>

    <div class="car">
        <div class="car-item" id="id"><p><?= $count?></p></div>
        <div class="car-item" id="mark"><p><?= $row['Mark']?></p></div>
        <div class="car-item" id="model"><p><?= $row['Model']?></p></div>
        <div class="car-item" id="year"><p><?= $row['Year']?></p></div>
        <div class="car-item" id="color"><p><?= $row['Color']?></p></div>
        <div class="car-item" id="gear-box"><p><?= $row['Gearbox']?></p></div>
        <div class="car-item"><button data-id="<?= $row['ID']?>" id="edit-btn" data-id="<?= $row['ID']?>" class="edit-btn">Edytuj</button></div>
        <div class="car-item"><button data-id="<?= $row['ID']?>" class="delete-btn">Usuń</button></div>
    </div>


<?php
$count++;
    }
}
?>
</div>