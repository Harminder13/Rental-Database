<!DOCTYPE html>
<html>
<head>
    <title>Property Management</title>
    <link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>
<?php
    include 'ConnectRentalDB.php';
?>
<img class="centered-image" src="img1.jpg" alt="Description of the image">

<hr>

<h2>List of Properties</h2>
<?php
    include 'getInfo.php';
?>

<hr>

<h2>List of Rental Groups</h2>
<form action="getGroup.php" method="post">
    <?php
        echo "<b>Which group would you like to look up? </br></b>";
        include 'getInfo2.php';
    ?>
    <input type="submit" value="Get Renter Data">
</form>

<hr>

<h2> Update Preferences:</h2>
<form action="update.php" method="post">
    <b>Accesible</b>: <br>
    <input type="radio" name="accesible" value="Yes">Yes<br>
    <input type="radio" name="accesible" value="No">No<br>
    <input type="radio" name="accesible" value="N/A">N/A<br>

    <b>Parking</b>: <br>
    <input type="radio" name="parking" value="Yes">Yes<br>
    <input type="radio" name="parking" value="No">No<br>
    <input type="radio" name="parking" value="N/A">N/A<br>

    <b>Type</b>: <br>
    <input type="radio" name="type" value="Room">Room<br>
    <input type="radio" name="type" value="House">House<br>
    <input type="radio" name="type" value="Apartment">Apartment<br>
    <input type="radio" name="type" value="N/A">N/A<br>

    <b>Number of Bedrooms</b>: <input type="text" name="numBedrooms"><br>

    <b>Number of Bathrooms</b>: <input type="text" name="numBathrooms"><br>

    <b>Max Price:</b> <input type="text" name="maxPrice"><br>

    <b>Select Rental Group to Update:</b> <br>
    <?php
        include 'getInfo2.php';
    ?>
    <input type="submit" value="Update Preferences">
</form>

<hr>

<h2>Average Cost</h2>
<?php
    include 'avrgCost.php';
?>

<hr>

<?php
    $connection =- NULL;
?>
</body>
</html>
