<?php
//session_start();
$username= $_SESSION['username'];
$mysqli = new mysqli("localhost", "root", "codingmafia@8187", "ImportExport");

if ($mysqli ==  false) {
    die("ERROR: Could not connect. ".$mysqli->connect_error);
}

//$sql = "select * from $username";

$sql = "select * from ".$username."_s_stockdetails";
if ($res = $mysqli->query($sql)) {
    if ($res->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>order_id</th>";
        echo "<th>commodity_name</th>";
        echo "<th>commodity_quantity</th>";
        echo "<th>commodity_cost</th>";
        echo "<th>Process</th>";
        echo "</tr>";
        while ($row = $res->fetch_array())
        {
            echo "<tr>";
            echo "<td>".$row['order_id']."</td>";
            echo "<td>".$row['commodity_name']."</td>";
            echo "<td>".$row['commodity_quantity']."</td>";
            echo "<td>".$row['commodity_cost']."</td>";
            echo "<td><button class='button' style='vertical-align:middle;'><span>Process Order</span</button>
</td>";
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
