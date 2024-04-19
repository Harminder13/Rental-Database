<?php

$query0 = "SELECT * FROM manages NATURAL JOIN people";
$query1 = "SELECT * FROM owns NATURAL JOIN people";
$query2 = "SELECT propertyID, firstName as ManagerFirst, lastName as ManagerLast FROM ($query0) AS subquery";
$query3 = "SELECT propertyID, firstName as OwnerFirst, lastName as OwnerLast FROM ($query1) AS subquery";
$query4 = "SELECT * FROM ($query2) AS subquery1 LEFT JOIN ($query3) AS subquery2 ON subquery1.propertyID = subquery2.propertyID";

$result = $connection->query($query4);

?>

<table>
    <tr>
        <th>Property ID</th>
        <th>Manager</th>
        <th>Owner</th>
    </tr>
    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?php echo $row["propertyID"]; ?></td>
            <td><?php echo $row["ManagerFirst"] . " " . $row["ManagerLast"]; ?></td>
            <td><?php echo $row["OwnerFirst"] . " " . $row["OwnerLast"]; ?></td>
        </tr>
    <?php } ?>
</table>
