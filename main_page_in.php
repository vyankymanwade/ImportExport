<?php
$servername = "localhost";
$username = "root";
$password = "codingmafia@8187";
$dbname = "ImportExport";
//creating connection with db
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{
   // echo "success_1!!!";
}
if(!isset($_SESSION))
{
    session_start();
}
else
{
    session_destroy();
    session_start();
}

if(isset($_POST['submit'])) {
    $User_email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $User_password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $sql_1="SELECT User_password,User_name,User_type FROM User_details WHERE User_email = '$User_email'";
    $res = mysqli_query($conn, $sql_1);
   // echo mysqli_num_rows($res);
    $row=mysqli_fetch_array($res);

    if($row['User_password']==$User_password)
    {
     $User_name=$row['User_name'];
     $User_type=$row['User_type'];
    //echo $User_name;
      $_SESSION['logged']=true;
      $_SESSION['username']=$User_name;
      $_SESSION['usertype']=$User_type;
      //echo $_SESSION['username'];
       // header('Location: admin.html')*/;
        if($row['User_type']=='Admin')
        {
            include "admin.php";
        }
        else if($row['User_type']=='Supplier')
         {
            include "supplierProfile.php";
         }
        else if($row['User_type']=='Distributor')
        {
            include "distributorProfile.php";
        }
        exit();
    }
    else
        {
           // $_SESSION['logged']=false;
            header("Location: main_page.html");
            exit();
        }
}


$conn->close();




?>
