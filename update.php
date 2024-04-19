<!DOCTYPE html>
<html>
<head>
    <title>Preferences Updated</title>
    <style>
        .popup {
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: Blue;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
            z-index: 9999;
        }
    </style>
</head>
<body>
<?php
include 'ConnectRentalDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $whichOwner = $_POST["fourDigitID"];
    $accesible = $_POST["accesible"];
    $parking = $_POST["parking"];
    $type = $_POST["type"];
    $numBedrooms = $_POST["numBedrooms"];
    $numBathrooms = $_POST["numBathrooms"];
    $maxPrice = $_POST["maxPrice"];

    $numBedrooms = !empty($_POST["numBedrooms"]) ? $_POST["numBedrooms"] : "N/A";
    $numBathrooms = !empty($_POST["numBathrooms"]) ? $_POST["numBathrooms"] : "N/A";
    $maxPrice = !empty($_POST["maxPrice"]) ? $_POST["maxPrice"] : "N/A";

    $sql = "UPDATE rentalgroup SET `accesible`=:accesible, `parking`=:parking, `type`=:type, `numBedrooms`=:numBedrooms, `numBathrooms`=:numBathrooms, `maxPrice`=:maxPrice WHERE `fourDigitID`=:whichOwner";
    $stmt = $connection->prepare($sql);

    $stmt->bindParam(':accesible', $accesible);
    $stmt->bindParam(':parking', $parking);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':numBedrooms', $numBedrooms);
    $stmt->bindParam(':numBathrooms', $numBathrooms);
    $stmt->bindParam(':maxPrice', $maxPrice);
    $stmt->bindParam(':whichOwner', $whichOwner);

    $stmt->execute();
    
    echo "<script>
            window.onload = function() {
                var popup = document.querySelector('.popup');
                popup.style.display = 'block';
            }
          </script>";
    
    $stmt = null;
    $connection = null;
}
?>
<div class="popup">Your preferences were updated!.</div>
</body>
</html>
