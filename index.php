<!DOCTYPE html>
<html>
<head>
    <title>NYSE : DIS Analysis</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
     function chk()
    {
        var to = document.getElementById('toDate').value;
        var from = document.getElementById('fromDate').value;
        var ticker = document.getElementById('tableName').value;
        var dataString = 'toDate=' + to + '&fromDate=' + from + '&tableName=' + ticker;
        $.ajax({
          type:"post",
          url:"data.php",
          data:dataString,
          success: function(html){
            $('#msg').html(html);
          }
        });
        return false;
    }
</script>
<script>

  function tsla() 
  {
      document.getElementById('home').style.backgroundImage = "url('tsla.jpg')";
      document.getElementById('navbar').style.borderBottomColor = "red";
      document.getElementById('analysis').style.borderBottomColor = "red";
      document.getElementById('chart').style.borderBottomColor = "red";
      document.getElementById('trivi').style.borderBottomColor = "red";
      document.getElementById('review').style.borderBottomColor = "red";
      document.getElementById('trivia1').src = "tslatrivia1.jpg";
      document.getElementById('triv1').textContent = "Co-founder Eberhard selected the name after months of struggling for an idea that his then-girlfriend thought sounded appropriate. When the two went to dinner at the Blue Bayou in Disneyland, he suggested Tesla as the company name. She approved, as did Tarpenning, who immediately secured the domain name TeslaMotors.com. The company incorporated on July 1, 2003.";
      document.getElementById('trivia2').src = "tslatrivia2.jpg";
      document.getElementById('triv2').textContent = "The Tesla vehicles are good for more than just the environment; they're also potential lifesavers for drivers. The National Highway Traffic Safety Administration has consistently given the cars high marks when it comes to safety ratings.In fact, at one point, the Model S achieved the best safety rating of any car in history. How tough was the Tesla? It actually broke one of the machines used for testing."
      document.getElementById('triv1color').className = "w3-red";
      document.getElementById('triv2color').className = "w3-red";

      document.getElementById('mission').textContent = "Tesla's mission is to accelerate the world's transition to sustainable energy. Tesla was founded in 2003 by a group of engineers who wanted to prove that people didn't need to compromise to drive electric – that electric vehicles can be better, quicker and more fun to drive than gasoline cars.";
      document.getElementById('tableName').defaultValue = 'tsla';
  }

  function dis()
  {
    location.reload();
  }
</script>
<style>
    body,h1,h2,h4,h5,h6 {font-family: "Raleway", sans-serif}
    h3{font-family: "Raleway", sans-serif; border-bottom: 2px solid #3f51b5}
    body, html {
        height: 100%;
        line-height: 1.8;
    }

    /* Full height image header */
    .bgimg-1 {
        background-position: center;
        background-size: cover;
        background-image: url("wdc.jpg");
        min-height: 100%;
    }

    .w3-bar .w3-button {
        padding: 16px;
    }
</style>
<body style = "background-color: light-gray">

<!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
      <a onclick="dis()" href="#home" class="w3-bar-item w3-button w3-wide" style = "border-bottom: 2px solid blue">NYSE : [DIS]</a>
      <a onclick = "tsla()" href="#home" class="w3-bar-item w3-button w3-wide" style = "border-bottom: 2px solid red">NASDAQ : [TSLA]</a>
      <!-- Right-sided navbar links -->
      <div  class="w3-right w3-hide-small" id = "navbar" style = "border-bottom: 2px solid blue" >
        <a href="#stats" class="w3-bar-item w3-button" >STATS</a>
        <a href="#charts" class="w3-bar-item w3-button"> CHARTS</a>
        <a href="#trivia" class="w3-bar-item w3-button" > TRIVIA</a>
        <a href="#reviews" class="w3-bar-item w3-button" > REVIEWS</a>
      </div>
      </div>
  </div>
<!-- Header with full-height image -->
  <header class="bgimg-1 w3-display-container " id="home">
    <div class="w3-display-bottomleft w3-text-white" style="padding:20px">
      <span class="w3-jumbo w3-hide-small">MISSION:</span><br>
      <span class="w3-xxlarge w3-hide-large w3-hide-medium">Start something that matters</span><br>
      <span class="w3-large" id = "mission">The mission of The Walt Disney Company is to entertain, inform and inspire people around the globe through the power of unparalleled storytelling, reflecting the iconic brands, creative minds and innovative technologies that make ours the world’s premier entertainment company.</span>
    </div>
  </header>
  <br>
  <div id = "stats" class="w3-container w3-light-gray">
  
  <br>
  <div class="w3-container w3-light-gray" style="padding:25px 16px">  
    <h3 id = "analysis" class="w3-center ">STATISTICAL ANALYSIS</h3>

    <br>

    <form>
      <div style = float:left;margin-left:150px>
			  <label for="fromDate">From Date:</label>
        <input type="date" id="fromDate" >
      </div>
      <input type = "hidden" id = "tableName" value = "dis">
      <div style = float:right;margin-right:150px>
	  		<label style = text-align:right for="toDate">To Date:</label>
	  		<input type="date" id="toDate">
        <input type = "submit" value = "submit" onclick = "return chk()">
      </div>
      <br>
      <br>
		</form>
    <p id = "msg"></p>
  </div>
  <br>
  <br>
  
  <br>
  <br>
  <div id = "charts">
  <br>
  <br>
    <h3 id = "chart" class = "w3-center";>CHARTS</h3>
    <h5 style = margin-left:50px;> 1. Line chart comparing actual vs predicted<h5>
    <div id="curve_chart" style="margin:40px auto; width: 1400px; height: 400px"></div>
  
    <h5 style = margin-left:50px;> 2. Scatter chart of Deviation<h5>
    <div id="chart_div" style="margin:40px auto; width: 1400px; height: 400px"></div>
  </div>
  <br>
  <br>
  <div id = "trivia">
      <br>
      <br>
      <h3 id = "trivi" class="w3-center">TRIVIA</h3>
      <br>
      <br>
      <div class = "w3-container">
          <div id = "triv1color" class=" w3-card w3-blue w3-hover-shadow" style = "height: 630px; width: 500px; float:left; margin-left: 100px; border-radius: 10%">
              <div style = "width: 100px; margin-left: 195px">
                  <h3 class = "w3-center" style = "border-bottom: 2px solid black; ">Trivia 1</h3>
              </div>
              <br>
              <div>
                  <img id = "trivia1" src = "distrivia1.jpg" style="border: 2px solid black; border-radius:5%;width: 400px; height: 350px; margin-left: 50px; border-radius: 5% ;">
              </div>
                    <p id = "triv1" style = "text-align: justify;margin-left: 12px; margin-right: 12px;">The company started with the name "Disney Brothers Cartoon Studio" in 1923. Later in 1926 was renamed to "Disney Brothers Animation Studio". From there to the current "The Walt Disney Company", the shift of the name from Animation Studios to The Company, retrospects their immense achievements in enternaiment industry. </p>				
          </div>
            
          <div id = "triv2color" class=" w3-card w3-blue w3-hover-shadow" style = "height: 630px; width: 500px; float:right; margin-right: 100px; border-radius: 10%">
              <div style = "width: 100px; margin-left: 195px">
                <h3 class = "w3-center" style = "border-bottom: 2px solid black; ">Trivia 2</h3>
              </div>
              <br>
              <div>
                <img id = "trivia2" src = "distrivia2.jpg" style="border: 2px solid black; border-radius:5%;width: 400px; height: 350px; margin-left: 50px; border-radius: 5% ;">
              </div>
              <p id = "triv2" style = "text-align: justify;margin-left: 10px; margin-right: 10px;"> Disney took a massive risk producing the world's first feature-length animated movie in 1937's Snow White and the Seven Dwarfs, which required a then-enormous $1.499 million production budget. Industry skeptics called the project "Disney's Folly" before it even hit theaters. But it went to gain over $66 mil, which adjusted to inflation becomes $885 million </p>				
          </div>
      </div>
  </div>
  <br>
  <br>
  <div id = "reviews">
    <br>
    <br>
    <h3 id = "review" class="w3-center ">REVIEWS</h3>
    <br>
    <br>
    <div ng-app="myReviewList" ng-cloak ng-controller="myCtrl" class="w3-card-2" style="margin:auto; max-width:800px; border: 2px solid black;">
        <header class="w3-center w3-container w3-deep-purple w3-padding-16">
            <h4>My Reviews</h4>
        </header>
        <ul class="w3-ul">
          <li ng-repeat="x in reviews" class="w3-center w3-light-grey w3-padding-16" style = "text-align: justify";>{{x}}<span ng-click="removeReview($index)" style="cursor:pointer;" class="w3-te w3-right w3-margin-right">X<br></span></li>
        </ul>
        <div class="w3-container w3-deep-purple w3-padding-16">
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
<script>
var app = angular.module("myReviewList", []); 
app.controller("myCtrl", function($scope) {
    $scope.reviews = ["Review for week 21/09/20 to 25/09/20: In the first review I had said that choosing a volatile stock as Tesla might have been a bad decision, but now I'm totally content with my decision because the insights which I got from TSLA stock, I wouldn't have gotten from any other stock. The hype to battery day and the subsequent fall of share prices of Tesla this week, taught me a lot about the share market as whole and the consensus of the majority of investors.",
                      "Review for week 28/09/20 to 02/10/2020: Now after doing the webpage assignment the one trend which I noticed was that I always was behind the curve. That means I couldn't envisage how a particular shift in scenario would affect the stock prices the day before. What I learnt this week was upto what extent one factor outweighs the other factor, even though Tesla Inc. broke it's expected production target, the news of Trump's contraction outweigh that and the stock fell."];
    $scope.addReview = function () {
        $scope.errortext = "";
        if (!$scope.addMe) {return;}
        if ($scope.reviews.indexOf($scope.addMe) == -1) {
            $scope.reviews.push($scope.addMe);
        } else {
        }
    }
    $scope.removeReview = function (x) {	
        $scope.errortext = "";    
        $scope.reviews.splice(x, 1);
    }
});
</script>
</body>
</html>
