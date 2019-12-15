
<?php
$mysqli = new mysqli("localhost", "root", "codingmafia@8187", "ImportExport");

if ($mysqli ==  false) {
    die("ERROR: Could not connect. ".$mysqli->connect_error);
}

$sql = "select * from Distributor_details";

if ($res = $mysqli->query($sql)) {
    if ($res->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Commodity</th>";
        echo "<th>Quantity</th>";
        echo "</tr>";
        while ($row = $res->fetch_array())
        {
            echo "<tr>";
            echo "<td>".$row['d_id']."</td>";
            echo "<td>".$row['d_name']."</td>";
            echo "<td>".$row['d_commodity']."</td>";
            echo "<td>".$row['d_quantity']."</td>";
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







