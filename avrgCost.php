<?php

$query0 = "SELECT ID, costPerMonth FROM properties NATURAL JOIN room";
$query1 = "SELECT ID, costPerMonth FROM properties NATURAL JOIN apartment";
$query2 = "SELECT ID, costPerMonth FROM properties NATURAL JOIN house";

$query3 = "
SELECT
    ROUND((SELECT AVG(costPerMonth) FROM ($query0) AS subquery), 2) AS AvgPriceRoom,
    ROUND((SELECT AVG(costPerMonth) FROM ($query1) AS subquery), 2) AS AvgPriceApartment,
    ROUND((SELECT AVG(costPerMonth) FROM ($query2) AS subquery), 2) AS AvgPriceHouse;
";

$result = $connection->query($query3);
$row = $result->fetch(PDO::FETCH_ASSOC); 

?>

<table>
    <tr>
        <th>Category</th>
        <th>Average Monthly Rent</th>
    </tr>
    <tr>
        <td>Room</td>
        <td><?php echo "$" . number_format($row["AvgPriceRoom"], 2); ?></td>
    </tr>
    <tr>
        <td>Apartment</td>
        <td><?php echo "$" . number_format($row["AvgPriceApartment"], 2); ?></td>
    </tr>
    <tr>
        <td>House</td>
        <td><?php echo "$" . number_format($row["AvgPriceHouse"], 2); ?></td>
    </tr>
</table>

