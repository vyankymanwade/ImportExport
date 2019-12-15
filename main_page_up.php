<?php
define('db_host','localhost');
define('db_user','root');
define('db_pass','codingmafia@8187');
define('db_name','ImportExport');

try
{
    $dbh=new PDO("mysql:host=".db_host.";dbname=".db_name,db_user,db_pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES 'utf8'"));

}
catch(PDOException $e)
{
    exit("Error:".$e->getMessage());
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
$status=0;
if(isset($_POST['submit']))
{
    $user_name=$_POST['User_name'];
    $user_email=$_POST['User_email'];
    $user_password=$_POST['User_password'];
    $user_type=$_POST['User_type'];
    if(isset($_POST['User_name']) && $_POST['User_email'] && $_POST['User_password'] &&  $_POST['User_type'])
    {
        
        $sqlInsert = "INSERT INTO User_details (User_name,User_email,User_password,User_type) VALUES (:user_name,:user_email,:user_password,:user_type)";
        $query = $dbh->prepare($sqlInsert);
        $query->bindParam(':user_name', $user_name, PDO::PARAM_STR);
        $query->bindParam(':user_email', $user_email, PDO::PARAM_STR);
        $query->bindParam(':user_password', $user_password, PDO::PARAM_STR);
        $query->bindParam(':user_type',$user_type,PDO::PARAM_STR);
        $query->execute();
        if($user_type=='Supplier')
        {
             
//            $sql="INSERT INTO supplier_details (s_id,s_name,s_commodity,s_quanity) VALUES (3005,'xyz',NULL,0)";
           $sql="insert into supplier_details (s_name,s_commodity,s_quantity)values(:user_name,NULL,0)";
            $query=$dbh->prepare($sql);
            $query->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $query->execute();
           
          
            
            
            //user_nameOrderRequest table
            $finalUser = $user_name."_s_OrderRequest";
            $sqlCreateOrder = "create table ".$finalUser."(order_id int primary key,commodity_name varchar(20),commodity_quantity int,commodity_cost int)";
            $dbh->exec($sqlCreateOrder);
            
            //user_nameS_stockDetails table
            $finalUser = $user_name."_s_stockDetails";
            $sqlCreateOrder = "create table ".$finalUser."(order_id int primary key,commodity_name varchar(20),commodity_quantity int,commodity_cost int)";
            $dbh->exec($sqlCreateOrder);
            
        }
        if($user_type=='Distributor')
        {
            $sql="insert into distributor_details(d_name,d_commodity,d_quantity)values(:user_name,NULL,0)";
            $query=$dbh->prepare($sql);
            $query->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $query->execute();
           
            
            //user_nameOrderRequest table
            $finalUser = $user_name."_d_OrderRequest";
            $sqlCreateOrder = "create table ".$finalUser."(order_id int primary key,commodity_name varchar(20),commodity_quantity int,commodity_cost int)";
            $dbh->exec($sqlCreateOrder);
            
            //user_nameS_stockDetails table
            $finalUser = $user_name."_d_stockDetails";
            $sqlCreateOrder = "create table ".$finalUser."(order_id int primary key,commodity_name varchar(20),commodity_quantity int,commodity_cost int)";
            $dbh->exec($sqlCreateOrder);
        }
       $status=1;
    }
   
      
   
    if($status)
    {
       
        $_SESSION['logged']=true;
        $_SESSION['username']=$user_name;
       // $_SESSION['useremail']=$user_email;
        $_SESSION['usertype']=$user_type;
        
        
        if($user_type=="Admin")
        {
            include "admin.php";
        }
        else if($user_type=="Supplier")
        {
    
            include "supplierProfile.php";
        }
        else if($user_type=="Distributor")
        {
            include "distributorProfile.php";
        }
    }
    else
    {
        $_SESSION['logged']=false;
        echo "Error ! ! !";
    }
}
?>
