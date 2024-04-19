<?php
$query = "SELECT fourDigitID FROM rentalGroup";
$result = $connection->query($query);
while ($row = $result->fetch()) {
    echo '<input type="radio" name="fourDigitID" value="';
    echo $row["fourDigitID"] . '">';
    echo $row["fourDigitID"] . "<br>";
}
?>
