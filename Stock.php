
<?php
$mysqli = new mysqli("localhost", "root", "codingmafia@8187", "ImportExport");

if ($mysqli ==  false) {
    die("ERROR: Could not connect. ".$mysqli->connect_error);
}

$sql = "select * from stock_details";

if ($res = $mysqli->query($sql)) {
    if ($res->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Quantity</th>";
        echo "<th>Cost</th>";
        echo "</tr>";
        while ($row = $res->fetch_array())
        {
            echo "<tr>";
            echo "<td>".$row['Commodity_id']."</td>";
            echo "<td>".$row['Commodity_name']."</td>";
            echo "<td>".$row['Quantity']."</td>";
            echo "<td>".$row['Cost']."</td>";
            echo "</tr>";
        }
        echo "</table>";
        $res->free();
    }
    else {
        echo "No matching records are found.";
    }
}
else {
    echo "ERROR: Could not able to execute $sql. "
        .$mysqli->error;
}
$mysqli->close();
?>







