<?php

    session_start();
?>


<!DOCTYPE html>
<html>
<title>Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    .button {
  display: inline-block;
  border-radius: 3px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;

  font-size: 15px;
  padding: 6px;
  width:auto;
  transition: all 0.5s;
  cursor: pointer;
 text-align: center;
        
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
      <?php
            echo $_SESSION['username'];
        ?>
    <div class="w3-col s8 w3-bar">
      
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        
        <a id="divsupplier" href="#" class="w3-bar-item w3-button w3-padding" onclick="showSupplierTable()"><i class="fa fa-address-card-o	"></i>  Supplier Details</a>
        
        <a id="divdistributor" href="#" class="w3-bar-item w3-button w3-padding" onclick="showDistributorTable()"><i class="fa fa-address-card-o	"></i>  Distributor Details</a>
        
        <a id="divstock" href="#" class="w3-bar-item w3-button w3-padding" id="stockDetailTable" onclick="showStockDetailsTable()"><i class="		fa fa-cubes"></i>  Stock Details</a>
        
        <a id="divimports " href="#" class="w3-bar-item w3-button w3-padding" id ="importRequestTable" onclick="showImportRequestTable()"><i class=" fa fa-shopping-cart"></i>  Import Requests</a>
        
        <a id="divexport" href="#" class="w3-bar-item w3-button w3-padding" onclick="showExportRequestTable()" ><i class=" 	fa fa-truck"></i>  Export Requests</a>
        
        
        <a href="#" class="w3-bar-item w3-button w3-padding" onclick="show()"><i class="	fa fa-film"></i>  Information</a>
        
        <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users"></i>  Testimony</a>
        
        <a href="logout.php" id="divsignout" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Sign-out</a><br><br>
    </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
    </header>

    <div class="w3-row-padding w3-margin-bottom">
        <div class="w3-quarter">
            <div class="w3-container w3-red w3-padding-16">
                <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <!--<h3>52</h3> -->
                    <h3>


                      <?php
                        include "countingSupplier.php";
                        ?>


                    </h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Supplier</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-blue w3-padding-16">
                <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>99</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Views</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-teal w3-padding-16">
                <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>23</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Shares</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>50</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Users</h4>
            </div>
        </div>
    </div>

    <div class="w3-panel">
        <div id="suppliertable" style="display:none;width:100%">
        <table >
            <tr><th><h3 style="visibility:none"><b>Supplier Details</b></h3></th></tr>
            <?php

        include "supplier.php";

        ?>
            
        </table>
            <br>
<br>
<br>
        </div>

<div id="distributortable" style="display:none;width:100%">
        <table >
            <tr><th><h3 style="visibility:none"><b>Distributor Details</b></h3></th></tr>
            
            <?php
            
            include "distributor.php";
            
            ?>
        </table>
    <br>
<br>
<br>
</div>

<div id="stockdetailstable" style="display:none;width:100%">
        <table >
            <tr><th><h3 style="visibility:visible"><b>Stock Details</b></h3></th></tr>
            
            <?php
            
            include "Stock.php";
            
            ?>
        </table>
    <br>
<br>
<br>
      </div>  

        <div  id="importRequestTable" style="display:none">
        <table>
            <tr><th><h3 style="visibility:visible"><b>Import Request</b></h3></th></tr>
            
            <?php
            
            include "Import.php";
            
            ?>
        </table>
</div>

        <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-third">
                <h5>Regions</h5>
                <img src="world_map.jpg" style="width:100%" alt="Google Regional Map">
            </div>
            <div class="w3-twothird">
                <h5>Feeds</h5>
                <table class="w3-table w3-striped w3-white">
                    <tr>
                        <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
                        <td>New record, over 90 views.</td>
                        <td><i>10 mins</i></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
                        <td>Database error.</td>
                        <td><i>15 mins</i></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
                        <td>New record, over 40 users.</td>
                        <td><i>17 mins</i></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
                        <td>New comments.</td>
                        <td><i>25 mins</i></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
                        <td>Check transactions.</td>
                        <td><i>28 mins</i></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
                        <td>CPU overload.</td>
                        <td><i>35 mins</i></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
                        <td>New shares.</td>
                        <td><i>39 mins</i></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>General Stats</h5>
        <p>Efficiency</p>
        <div class="w3-grey">
            <div class="w3-container w3-center w3-padding w3-green" style="width:80%">80%</div>
        </div>
    </div>
    <p>Available Stock</p>
    <div class="w3-grey">
        <div class="w3-container w3-center w3-padding w3-orange" style="width:40%">40%</div>
    </div>
    <p>Pending Orders</p>
    <div class="w3-grey">
        <div class="w3-container w3-center w3-padding w3-red" style="width:20%">20%</div>
    </div>




    <hr>

    <div class="w3-container">
        <h5>Countries</h5>
        <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
            <tr>
                <td>United States</td>
                <td>65%</td>
            </tr>
            <tr>
                <td>UK</td>
                <td>15.7%</td>
            </tr>
            <tr>
                <td>Russia</td>
                <td>5.6%</td>
            </tr>
            <tr>
                <td>Spain</td>
                <td>2.1%</td>
            </tr>
            <tr>
                <td>India</td>
                <td>1.9%</td>
            </tr>
            <tr>
                <td>France</td>
                <td>1.5%</td>
            </tr>
        </table>

    </div>
    <hr>
    <div class="w3-container">
        <h5>Premium Customers</h5>
        <ul class="w3-ul w3-card-4 w3-white">
            <li class="w3-padding-16">
                <img src="gandhali_profile.jpeg" class="w3-left w3-circle w3-margin-right" style="width:35px">
                <span class="w3-xlarge">Gandhali Kokate</span><br>
            </li>
            <li class="w3-padding-16">
                <img src="shreyas_profile.jpeg" class="w3-left w3-circle w3-margin-right" style="width:35px">
                <span class="w3-xlarge">Shreyas Garud</span><br>
            </li>
            <li class="w3-padding-16">
                <img src="vyankatesh_profile.jpeg" class="w3-left w3-circle w3-margin-right" style="width:35px">
                <span class="w3-xlarge">Vyankatesh Manwade</span><br>
            </li>
            <li class="w3-padding-16">
                <img src="photo.jpeg" class="w3-left w3-circle w3-margin-right" style="width:35px">
                <span class="w3-xlarge">Yogiraj Bhoomkar</span><br>
            </li>
        </ul>
    </div>
    <hr>

    <div class="w3-container">
        <h5>Experts Comments</h5>
        <div class="w3-row">
            <div class="w3-col m2 text-center">
                <img class="w3-circle" src="ratan.jpg" style="width:96px;height:96px">
            </div>
            <div class="w3-col m10 w3-container">
                <h4>RATAN TATA <span class="w3-opacity w3-medium">Oct 7, 2019, 9:12 AM</span></h4>
                <p>Keep up the GREAT work!f you want to walk fast, walk alone. But if you want to walk far, walk together. Keep Working Together </p><br>
            </div>
        </div>

        <div class="w3-row">
            <div class="w3-col m2 text-center">
                <img class="w3-circle" src="mark.jpg" style="width:96px;height:96px">
            </div>
            <div class="w3-col m10 w3-container">
                <h4>MARK ZUKERBERG <span class="w3-opacity w3-medium">Oct 3, 2019, 10:15 PM</span></h4>
                <p>Database Handelling and Website Designing Done Very Well ! We Would Love To Collaborate With Your Team</p><br>
            </div>
        </div>

        <div class="w3-row">
            <div class="w3-col m2 text-center">
                <img class="w3-circle" src="modi.jpeg" style="width:96px;height:96px">
            </div>
            <div class="w3-col m10 w3-container">
                <h4>Narendra Modi <span class="w3-opacity w3-medium">Oct 2, 2019, 4:15 PM</span></h4>
                <p>keep making INDIA proud by being Worlds Largest Firm. Congratulations !!</p><br>
            </div>
        </div>
    </div>
    <br>
    <div class="w3-container w3-dark-grey w3-padding-32">
        <div class="w3-row">
            <div class="w3-container w3-third">
                <h5 class="w3-bottombar w3-border-green">Demographic</h5>
                <p>Language</p>
                <p>Country</p>
                <p>City</p>
            </div>
            <div class="w3-container w3-third">
                <h5 class="w3-bottombar w3-border-red">System</h5>
                <p>Browser</p>
                <p>OS</p>
                <p>More</p>
            </div>
            <div class="w3-container w3-third">
                <h5 class="w3-bottombar w3-border-orange">Target</h5>
                <p>Users</p>
                <p>Active</p>
                <p>Geo</p>
                <p>Interests</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-16 w3-light-grey">
        <p style="align-items:center">         PUNE VIDYARTHI GRIHAS COLLEGE OF ENGINEERING</p>
    </footer>

    <!-- End page content -->
</div>

<script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");
    var table = document.getElementById("table123");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
            overlayBg.style.display = "none";
        } else {
            mySidebar.style.display = 'block';
            overlayBg.style.display = "block";
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
    }



    function showSupplierTable(hide){
        var lTable = document.getElementById("suppliertable");
        lTable.style.display = (lTable.style.display == "table") ? "none" : "table";
    }

    function showDistributorTable(hide){
        var lTable = document.getElementById("distributortable");
        lTable.style.display = (lTable.style.display == "table") ? "none" : "table";
    }

    function showStockDetailsTable(hide){
        var lTable = document.getElementById("stockdetailstable");
        lTable.style.display = (lTable.style.display == "table") ? "none" : "table";
    }
    
    function showImportRequestTable(hide)
    {
         var lTable = document.getElementById("importRequestTable");
        lTable.style.display = (lTable.style.display == "table") ? "none" : "table";
    }
    
    
</script>

</body>
</html>
