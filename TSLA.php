<!DOCTYPE html>
<html>
<head>
    <title>NASDAQ : TSLA Analysis</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    body,h1,h2,h4,h5,h6 {font-family: "Raleway", sans-serif}
    h3{font-family: "Raleway", sans-serif; border-bottom: 2px solid hsl(0, 100%, 38%)}
    body, html {
        height: 100%;
        line-height: 1.8;
    }

    /* Full height image header */
    .bgimg-1 {
        background-position: center;
        background-size: cover;
        background-image: url("tsla.jpg");
        min-height: 100%;
    }

    .w3-bar .w3-button {
        padding: 16px;
    }
</style>
<body>

<!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
      <a href="http://localhost/SPWA/DIS.php" class="w3-bar-item w3-button w3-wide" style = "border-bottom: 2px solid blue">NYSE : [DIS]</a>
      <button><a href="#home" class="w3-bar-item w3-button w3-wide" style = "border-bottom: 2px solid red">NASDAQ : [TSLA]</a></butto
      <!-- Right-sided navbar links -->
      <div class="w3-right w3-hide-small">
        <a href="#stats" class="w3-bar-item w3-button" style = "border-bottom: 2px solid red">STATS</a>
        <a href="#charts" class="w3-bar-item w3-button" style = "border-bottom: 2px solid red"> CHARTS</a>
        <a href="#trivia" class="w3-bar-item w3-button" style = "border-bottom: 2px solid red"> TRIVIA</a>
        <a href="#reviews" class="w3-bar-item w3-button" style = "border-bottom: 2px solid red"> REVIEWS</a>
      </div>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
        <i class="fa fa-bars"></i>
        </a>
      </div>
  </div>
<!-- Header with full-height image -->
  <header class="bgimg-1 w3-display-container " id="home">
    <div class="w3-display-bottomleft w3-text-white" style="padding:20px">
      <span class="w3-jumbo w3-hide-small">MISSION:</span><br>
      <span class="w3-xxlarge w3-hide-large w3-hide-medium">Start something that matters</span><br>
      <span class="w3-large">Tesla's mission is to accelerate the world's transition to sustainable energy. Tesla was founded in 2003 by a group of engineers who wanted to prove that people didn't need to compromise to drive electric – that electric vehicles can be better, quicker and more fun to drive than gasoline cars.</span>
    </div>
  </header>
  <br>
  <div id = "stats" class="w3-container w3-light-gray">
  
  <br>
  <div class="w3-container" style="padding:25px 16px">  
    <h3 class="w3-center ">STATISTICAL ANALYSIS</h3>

    <br>
  <?php
      // define variables and set to empty values
      $toDate = $fromDate = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fromDate = $_POST["fromDate"];
        $toDate = $_POST["toDate"];
      }
  ?>	
    <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div style = float:left;margin-left:150px>
			  <label for="fromDate">From Date:</label>
        <input type="date" id="fromDate" name="fromDate">
      </div>
      <div style = float:right;margin-right:150px>
	  		<label style = text-align:right for="toDate">To Date:</label>
	  		<input type="date" id="toDate" name="toDate">
        <input type="submit">
      </div>
		</form>
  </div>
  <br>
  <br>
  <div class = "w3-container">
    <table align="Left" border="1px" class = "w3-table-all w3-hoverable tbody tr:hover" style = width:300px>
      <tr>
        <th colspan = "2" class = w3-large style = text-align:center> Actual Values </th>
      </tr>
      <tr>
        <td style = width:150px> Moving Avg. </td>
        <td style = width:100px id = "average">  </td>
      </tr>
      <tr>
        <td style = width:150px> SD </td>
        <td style = width:100px id = "sd">  </td>
      </tr>
      <tr>
        <td style = width:150px> Distribution </td>
        <td style = width:100px id = 'distribution'>  </td>
      </tr>
    </table>
    <table align="Right" border="1px" class = "w3-table-all w3-hoverable tbody tr:hover" style = width:300px>
      <tr>
      <th colspan = "2" class = w3-large style = text-align:center> Predicted Values </th>
      </tr>
      <tr>
        <td style = width:150px> Mean </td>
        <td style = width:100px id = "p_average">  </td>
      </tr>
      <tr>
        <td style = width:150px> SD </td>
        <td style = width:100px id = "p_sd">  </td>
      </tr>
      <tr>
        <td style = width:150px> Distribution </td>
        <td style = width:100px id = "p_distribution">  </td>
      </tr>
    </table>
    <table align="center" border="1px" class = "w3-table-all w3-hoverable tbody tr:hover" style = width:600px id = 'Table'>
      <tr>
        <th> Date </th>
        <th> Day </th>
        <th> Actual </th>
        <th> Predicted </th>
        <th> Deviation </th>
      </tr>
      <?php
        $conn = mysqli_connect("localhost", "root", "", "Stock");
  // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
          }
        $sql = "SELECT * FROM tsla WHERE date >= '$fromDate' and date <= '$toDate'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Date"]. "</td><td>" . $row["Day"] . "</td><td>"
        . $row["Actual"]. "</td><td>" . $row["Predicted"] . "</td><td>" . $row["Deviation"] . "</td></tr>";
        }
        echo "</table>";
        $conn->close();
      ?>
    </table>
  </div>
  <br>
  <div id = "charts">
  <br>
  <br>
    <h3 class = "w3-center";>CHARTS</h3>
    <h5 style = margin-left:50px;> 1. Line chart comparing actual vs predicted<h5>
    <div id="curve_chart" style="margin:40px auto; width: 1400px; height: 400px"></div> 
  
    <h5 style = margin-left:50px;> 2. Scatter chart of Deviation<h5>
    <div id="chart_div" style="margin:40px auto; width: 1400px; height: 400px"></div>
  </div>
  <br>
  <div id = "trivia">
      <br>
      <br>
      <h3 class="w3-center">TRIVIA</h3>
      <br>
      <br>
      <div class = "w3-container">
          <div class=" w3-card w3-red w3-hover-shadow" style = "height: 630px; width: 500px; float:left; margin-left: 100px; border-radius: 10%">
              <div style = "width: 100px; margin-left: 195px">
                  <h3 class = "w3-center" style = "border-bottom: 2px solid black; ">Trivia 1</h3>
              </div>
              <br>
              <div>
                  <img src = "tslatrivia1.jpg" style="border: 2px solid black; border-radius:5%;width: 400px; height: 350px; margin-left: 50px; border-radius: 5% ;">
              </div>
                    <p style = "text-align: justify;margin-left: 12px; margin-right: 12px;">Co-founder Eberhard selected the name after months of struggling for an idea that his then-girlfriend thought sounded appropriate. When the two went to dinner at the Blue Bayou in Disneyland, he suggested Tesla as the company name. She approved, as did Tarpenning, who immediately secured the domain name TeslaMotors.com. The company incorporated on July 1, 2003.</p>				
          </div>
            
          <div class=" w3-card w3-red w3-hover-shadow" style = "height: 630px; width: 500px; float:right; margin-right: 100px; border-radius: 10%">
              <div style = "width: 100px; margin-left: 195px">
                <h3 class = "w3-center" style = "border-bottom: 2px solid black; ">Trivia 2</h3>
              </div>
              <br>
              <div>
                <img src = "tslatrivia2.jpg" style="border: 2px solid black; border-radius:5%;width: 400px; height: 350px; margin-left: 50px; border-radius: 5% ;">
              </div>
              <p style = "text-align: justify;margin-left: 10px; margin-right: 10px;">The Tesla vehicles are good for more than just the environment; they're also potential lifesavers for drivers. The National Highway Traffic Safety Administration has consistently given the cars high marks when it comes to safety ratings.In fact, at one point, the Model S achieved the best safety rating of any car in history. How tough was the Tesla? It actually broke one of the machines used for testing.</p>				
          </div>
      </div>
  </div>
  <div id = "reviews">
    <br>
    <br>
    <h3 class="w3-center ">REVIEWS</h3>
    <br>
    <br>
    <div ng-app="myReviewList" ng-cloak ng-controller="myCtrl" class="w3-card-2" style="margin:auto; max-width:800px; border: 2px solid black; background-color:hsl(0, 100%, 63%)">
        <header class="w3-center w3-container w3-padding-16" >
            <h4>My Reviews List</h4>
        </header>
        <ul class="w3-ul">
          <li ng-repeat="x in reviews" class="w3-center w3-light-grey w3-padding-16" style = "text-align: justify";>{{x}}<span ng-click="removeReview($index)" style="cursor:pointer;" class="w3-te w3-right w3-margin-right">X<br></span></li>
        </ul>
        <div class="w3-container w3-padding-16" style = "background-color:hsl(0, 100%, 63%)">
          <div class="w3-row w3-margin-top">
            <div class="w3-col s10">
              <textarea ng-model="addMe"  class="w3-input w3-border w3-padding"></textarea>
            </div>
            <div class="w3-col s2">
              <button ng-click="addReview()" class="w3-btn w3-padding w3-green">Add</button>
            </div>
          </div>
        </div>
    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script src="myjs.js"></script> 
</body>
</html>
