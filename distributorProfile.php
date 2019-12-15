<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<title>Distributor</title>
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
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    
    .button2 {
  background-color: white; 
         
  color: black; 
  border: 1px solid #008CBA;
}
    .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 7px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 14px 2px;
  border-radius: 4px;
  cursor: pointer;
}
    .button2 {background-color: #f44336;} /* Blue */
.button3 {background-color:  #4CAF50;} 
    input[type=text]{
  padding: 15px;
width: 100%;    
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=number] {
  padding: 25px;
  width: 37%;    
    height: 20px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;  
}    
/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;

  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .updatebtn {
  float: left;
  width: 100%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 2% auto 25% auto; /* 5% from the top, 15% from the bottom and centered */
    margin-left:325px; 
  border: 1px solid #888;
    
  width: 70%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 25px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
} 
    @media screen and (max-width: 300px) {
  .cancelbtn, .updatebtn {
     width: 100%;
  }
}
        </style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Distributor</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="photo.jpeg" class="w3-circle w3-margin-right" style="width:46px">
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
              <a id="divshow" href="#" class="w3-bar-item w3-button w3-padding" onclick="showDistributorTable()"><i class="	fa fa-handshake-o"></i> Order Requests</a>
      <a href="#" class="w3-bar-item w3-button w3-padding" onclick="showStockDetailsTable()"><i class="		fa fa-cubes"></i>  Stock Details</a>
              <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out"></i>  Sign-out</a><br><br>
          </div>
        </nav>


        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">

          <!-- Header -->
          <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> My Dashboard
<button class="button button3"style="float: right;"onclick="document.getElementById('id01').style.display='block'">Add OR Update Commodity</button></b></h5>
              
          </header>

          <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-quarter">
              <div class="w3-container w3-red w3-padding-16">
                <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
                <div class="w3-right">
                  <h3>52</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Messages</h4>
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

    <table id="supliertable" style="display:none">
        <tr><th><h3 style="visibility:visible">Distributor Details</h3></th></tr>
        
          </table>

         

    <table id="distributortable" style="display:none">
        <tr><th><h3 style="visibility:visible">Distributor Details</h3></th></tr>
        
         </table>
             

   <table id="stockdetails" style="display:none">
        <tr><th><h3 style="visibility:visible">Stock Details</h3></th></tr>
      
    </table>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Distributor Analysis"
	},
	axisX: {
		valueFormatString: "DDD",
		minimum: new Date(2017, 1, 5, 23),
		maximum: new Date(2017, 1, 12, 1)
	},
	axisY: {
		title: "Co Requests"
	},
	legend: {
		verticalAlign: "top",
		horizontalAlign: "right",
		dockInsidePlotArea: true
	},
	toolTip: {
		shared: true
	},
	data: [{
		name: "Order Requests",
		showInLegend: true,
		legendMarkerType: "square",
		type: "area",
		color: "rgba(40,175,101,0.6)",
		markerSize: 0,
		dataPoints: [
			{ x: new Date(2017, 1, 6), y: 220 },
			{ x: new Date(2017, 1, 7), y: 120 },
			{ x: new Date(2017, 1, 8), y: 144 },
			{ x: new Date(2017, 1, 9), y: 162 },
			{ x: new Date(2017, 1, 10), y: 129 },
			{ x: new Date(2017, 1, 11), y: 109 },
			{ x: new Date(2017, 1, 12), y: 129 }
		]
	},
	{
		name: "Stock Available",
		showInLegend: true,
		legendMarkerType: "square",
		type: "area",
		color: "rgba(0,75,141,0.7)",
		markerSize: 0,
		dataPoints: [
			{ x: new Date(2017, 1, 6), y: 42 },
			{ x: new Date(2017, 1, 7), y: 34 },
			{ x: new Date(2017, 1, 8), y: 29 },
			{ x: new Date(2017, 1, 9), y: 42 },
			{ x: new Date(2017, 1, 10), y: 53},
			{ x: new Date(2017, 1, 11), y: 15 },
			{ x: new Date(2017, 1, 12), y: 12 }
		]
	}]
});
chart.render();

}
</script>
              <div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
<!-- Add new Commodity Form -->
    <div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="addQuantity.php" method="post">
    <div class="container">
      <h1>ADD OR UPDATE COMMODITY</h1>
      <p>Please fill in this form to Add OR Update Commodity.</p>
      <hr>
      <label for="c_name"><b>Commodity Name</b></label>
      <input type="text" placeholder="Enter Commodity Name" name="c_name" required>

      <label for="quant" style=" padding-right: 15px;"><b>Quantity</b></label>
      <input type="number" placeholder="Enter Quantity" name="quant" required>

      <label for="cst" style="padding-left: 25px; padding-right: 15px;"><b>Cost</b></label>
      <input type="number" placeholder="Enter Cost" name="cst" required>
      

      <div class="clearfix">
        <button type="submit" class="updatebtn">Add / Update Commodity</button>
      </div>
    </div>
  </form>
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



     function showDistributorTable(hide){
        var lTable = document.getElementById("supliertable");
        lTable.style.display = (lTable.style.display == "table") ? "none" : "table";
       }

//    function showdistributortable(hide){
//        var lTable = document.getElementById("distributortable");
//        lTable.style.display = (lTable.style.display == "table") ? "none" : "table";
//       }

            function showStockDetailsTable(hide){
        var lTable = document.getElementById("stockdetails");
        lTable.style.display = (lTable.style.display == "table") ? "none" : "table";
       }
            function AddNewCommodity(){
                
            }
            // Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
        </script>

        </body>
        </html>
