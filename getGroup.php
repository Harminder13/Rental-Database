<!DOCTYPE html>
<html>
<head>
    <title>Rental Database: Rental Group</title>
    <link rel="stylesheet" type="text/css" href="design2.css">
</head>
<body>
    <img src="img0.png" alt="Description of the image">
	<p>
    <hr>
    <p>
    <h1>Rental Group Data:</h1>
    <p>
    <hr>
    <p>
    <?php
        include 'ConnectRentalDB.php';

        $whichOwner = $_POST["fourDigitID"];

        $query = 'SELECT * FROM rentalgroup WHERE rentalgroup.fourDigitID = :fourDigitID';
        $statement = $connection->prepare($query);
        $statement->bindParam(':fourDigitID', $whichOwner);
        $statement->execute();
        $groups = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($groups as $group) {
            echo "<b>Group ID:</b> " . $group["fourDigitID"] . "<br><br>";
            echo "<b>Preferences:</b>" . "<br>";
            echo "<b>Accessible:</b> " . ($group["accessible"] ?? "N/A") . "<br>";
            echo "<b>Parking:</b> " . ($group["parking"] ?? "N/A") . "<br>";
            echo "<b>Type:</b> " . ($group["type"] ?? "N/A") . "<br>";
            echo "<b>Bedrooms:</b> " . ($group["numBedrooms"] ?? "N/A") . "<br>";
            echo "<b>Bathrooms:</b> " . ($group["numBathrooms"] ?? "N/A") . "<br>";
            echo "<b>Max Price:</b> $" . number_format($group["maxPrice"], 2) . "<br>";
            echo "<hr>";

            $query = 'SELECT * FROM engages NATURAL JOIN people WHERE engages.fourDigitID = :fourDigitID';
            $statement = $connection->prepare($query);
            $statement->bindParam(':fourDigitID', $whichOwner);
            $statement->execute();
            $people = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($people as $person) {
                echo "<b>Name:</b> " . $person["firstName"] . " " . $person["lastName"] . "<br>";
            }
        }
    ?>
</body>
</html>
