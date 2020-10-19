

// Calculation for Actual Values
    // Average
var table = document.getElementById("Table");
console.log(Table);
var sumVal = 0;
var rowCount = table.rows.length - 1; 
for(var i = 1; i < table.rows.length; i++)
  {
      sumVal = sumVal + parseFloat(table.rows[i].cells[2].innerHTML);
  }
var average = (sumVal / rowCount);
var avg = average.toFixed(2)
document.getElementById("average").innerHTML = avg;
    // Standard Deviation
var sum_variance = 0;
var variance
for(var j = 1; j < table.rows.length; j++)
  {
   var varia =  (avg - table.rows[j].cells[2].innerHTML)*(avg - table.rows[j].cells[2].innerHTML);
   sum_variance += varia;
   
   variance = sum_variance/(rowCount - 1)

  }
console.log(sum_variance);
var standard = Math.sqrt(variance)
document.getElementById("sd").innerHTML = standard.toFixed(2);

document.getElementById("distribution").innerHTML = "(" + avg + " , " + standard.toFixed(2) + ")";
// Calculation for Predicted Values
var p_sumVal = 0;
var p_rowCount = table.rows.length - 1; 
for(var a = 1; a < table.rows.length; a++)
  {
      p_sumVal = p_sumVal + parseFloat(table.rows[a].cells[3].innerHTML);
  }
var p_average = (p_sumVal / p_rowCount);
var p_avg = p_average.toFixed(2)
document.getElementById("p_average").innerHTML = p_avg;

var p_sumvariance = 0;
var p_variance;
for(var b = 1; b < table.rows.length; b++)
  {
    
   var p_varia =  (p_avg - table.rows[b].cells[3].innerHTML)*(p_avg - table.rows[b].cells[3].innerHTML);
   p_sumvariance += p_varia;
   p_variance = p_sumvariance/(rowCount - 1);
  }
var p_standard = Math.sqrt(p_variance)
document.getElementById("p_sd").innerHTML = p_standard.toFixed(2);
document.getElementById("p_distribution").innerHTML = `(${p_avg} , ${p_standard.toFixed(2)})`;
// Charts using D3.js

 // javascript

// Data array for line chart
var final_array = [];

for(var b = 0; b < 1; b++){
    var dataset = [];
     for(var a = 0; a < 4; a++){
       if (a == 1) {

       }
       else {
        dataset.push((table.rows[b].cells[a].innerHTML));
      }
    }
     final_array.push(dataset)
 }
 for(var b = 1; b < table.rows.length; b++){
    var dataset = [];
     for(var a = 0; a < 4; a++){
         if (a == 0) {
            dataset.push((table.rows[b].cells[a].innerHTML));
         }
         else if (a == 1){

         }
        else {
            dataset.push(parseFloat(table.rows[b].cells[a].innerHTML));
        }
    }
     final_array.push(dataset)
 }

// Data array for scatter chart
var dev_array = [];
for (var c = 0; c < 1; c++){
  deviation = [];
  for(d = 0; d < 5; d += 4){
    deviation.push(table.rows[c].cells[d].innerHTML);
  }
  dev_array.push(deviation);
}
for (var c = 1; c < table.rows.length; c++){
  deviation = [];
  for(d = 0; d < 5; d+= 4){
    if (d == 0) {
    deviation.push(table.rows[c].cells[d].innerHTML)
    }
    else {
      deviation.push(parseFloat(table.rows[c].cells[d].innerHTML))
    }
  }
  dev_array.push(deviation)
}
console.table(dev_array);
//Creating Line chart
 google.charts.load('current', {'packages':['corechart']});
 google.charts.setOnLoadCallback(drawChart);

 function drawChart() {
   var data = google.visualization.arrayToDataTable(final_array);

   var options = {
     title: 'Stock Performance',
     curveType: 'function',
     legend: { position: 'bottom' }
   };

   var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

   chart.draw(data, options);
 }
// Creating Scatter Chart

google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {
        var data1 = google.visualization.arrayToDataTable(dev_array);

        var options1 = {
          title: 'Deviation - Date',
          hAxis: {title: 'Date', minValue: 0, maxValue: 10},
          vAxis: {title: 'Deviation in %', minValue: 0, maxValue: 5},
          legend: 'none'
        };

        var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

        chart.draw(data1, options1);
      }

// AngularJS for the review list

var app = angular.module("myReviewList", []); 
app.controller("myCtrl", function($scope) {
    $scope.reviews = ["Prediction for week 21/09/20 to 25/09/20: In the first review I had said that choosing a volatile stock as Tesla might have been a bad decision, but now I'm totally content with my decision because the insights which I got from TSLA stock, I wouldn't have gotten from any other stock. The hype to battery day and the subsequent fall of share prices of Tesla this week, taught me a lot about the share market as whole and the consensus of the majority of investors.",];
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