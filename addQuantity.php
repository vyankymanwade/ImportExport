<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "codingmafia@8187";
$dbname = "ImportExport";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user_name=$_SESSION['username'];
$user_type=$_SESSION['usertype'];

if(isset($_POST['submit']))
{
    $commo_name =mysqli_real_escape_string($conn, $_POST['c_name']);
    $commo_quant=mysqli_real_escape_string($conn, $_POST['quant']);
    $commo_cost=mysqli_real_escape_string($conn, $_POST['cst']);
    if($user_type == "Supplier")
    {
        
        //this query will update the commodity realated details of supplier in supplier table which is 
        //visible to admins only.
         $sql="update supplier_details set s_commodity='$commo_name',s_quantity='$commo_quant' where s_name='$user_name'";
         $conn->query($sql);
        
        //query to decide whether to insert new record in stockdetails or update it
        $sql_1 = "select * from ".$user_name."_s_stockdetails";
         $result = $conn->query($sql_1);
        $count=$result->num_rows;
         if($count)
         {
            //$sql="update '$user_name' set commodity_name='$commo_name',Quantity='$commo_quant',Cost='$commo_cost'";
             $sql = "update ".$user_name."_s_stockdetails set commodity_quantity=".$commo_quant.",commodity_cost=".$commo_cost;
            $conn->query($sql);
         }
        else
        {
           $sql="insert into ".$user_name."_s_stockdetails(order_id,commodity_name,commodity_quantity,commodity_cost) values (1001,'$commo_name','$commo_quant','$commo_cost')";
            $conn->query($sql);
           
        }
        include "supplierProfile.php";
    }
    
    if($user_type == "Distributor")
    {
       
        
        //this query will update the commodity realated details of distributor in distributor table which is //visible to admins only.
        $sql="update distributor_details set d_commodity='$commo_name',d_quantity='$commo_quant' where d_name='$user_name'";
         $conn->query($sql);
        
        
        //query to decide whether to insert new record in stockdetails or update it
        $sql_1 = "select * from ".$user_name."_d_stockdetails";
         $result = $conn->query($sql_1);
         if($result->num_rows > 0)
         {
            $sql = "update ".$user_name."_d_stockdetails set commodity_quantity=".$commo_quant.",commodity_cost=".$commo_cost;
            $conn->query($sql);
         }
        else
        {
//            $sql="insert into '$user_name' _d_stockdetails(commodity_name,Quantity,Cost) values ('$commo_name','$commo_quant','$commo_cost')";
//             $conn->query($sql);
            $sql = "insert into ".$user_name."_d_stockdetails(order_id,commodity_name,commodity_quantity,commodity_cost) values(7001,".$commo_name.",".$commo_quant.",".$commo_cost.")";
            $conn->query($sql);
        }
        
        include "distributorProfile.php";
    }
   
    
    
}
//if ($conn->query($sql) === TRUE) {
//    echo "Record updated successfully";
//} else {
//    echo "Error updating record: " . $conn->error;
//}

$conn->close();
?>