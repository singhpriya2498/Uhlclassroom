<?php
session_start();
require_once('connect.php');
$max_marks=0;
$max_phy_marks=0;
$max_chem_marks=0;
$max_math_marks=0;
$sum_marks=0;
$sum_phy_marks=0;
$sum_chem_marks=0;
$sum_math_marks=0;
$tot_test=0;
for($i=1 ; TRUE ; $i++)
{
  $test_name = 'test'.$i;
  $sqlw ="SELECT 1 FROM `$test_name`";
  $val = mysqli_query($connection,$sqlw);
  if($val != FALSE)
  {
    $tot_test++;
    $sql = "SELECT total_marks,phy_marks,chem_marks,maths_marks FROM `$test_name` WHERE `id`=1";
    $result = mysqli_query($connection, $sql);
    if($result==FALSE)
      continue;
    $array[$i] = $result->fetch_assoc();
    if($max_marks < $array[$i]["total_marks"])
      $max_marks = $array[$i]["total_marks"];
    if($max_phy_marks < $array[$i]["phy_marks"])
      $max_phy_marks = $array[$i]["phy_marks"];
    if($max_chem_marks < $array[$i]["chem_marks"])
      $max_chem_marks = $array[$i]["chem_marks"];
    if($max_math_marks < $array[$i]["maths_marks"])
      $max_math_marks = $array[$i]["maths_marks"];

      $sum_marks = $sum_marks + $array[$i]["total_marks"];
      $sum_phy_marks = $sum_phy_marks + $array[$i]["phy_marks"];
      $sum_chem_marks = $sum_chem_marks + $array[$i]["chem_marks"];
      $sum_math_marks = $sum_math_marks + $array[$i]["maths_marks"];
  }
  else
  {
      break;
  }
}
$i--;
$avg_marks = $sum_marks/$i;
$avg_phy_marks = $sum_phy_marks/$i;
$avg_chem_marks = $sum_chem_marks/$i;
$avg_math_marks = $sum_math_marks/$i;
//print_r($array);
//max marks, avg_marks , no. of tests given, best_subjectwise
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <style>
    .column {
      padding-left: 250px;
      float:left;
      width: 10%;
    }
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
  </style>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" type="text/css" href="stut_statistics.css">
</head>
<body style="background-color:#F5F5F5">
  <h1 align="center">Your Statistics</h1><br>
  <center>
    <form method="POST" action="analysis_test.php">
      Enter test id to view your results:<input id="test_number" name="testt"></input>
      <input id="timme" type="hidden" value="-1" name="dura"></input>
      <input id="show" type="submit" value="Show results">
    </form>
  </center>
  <br>
  <div id="chart_div"></div><br>
  <div class="row">
    <div class="column"><p><?php echo nl2br("\nNo of tests attempted:\n<b><font size='5pt'>$i</font></b>\n out of $tot_test\n\nMax Marks Obtained:\n<b><font size='5pt'>$max_marks</font></b>\n out of 360\n\nAverage Total marks:\n<b><font size='5pt'>$avg_marks</font></b>\n out of 360"); ?></p></div>
    <div class="column" id="marks_distrb"></div>
    <div class="column" style="float:right;padding-right:250px;"><p><?php echo nl2br("\nMax marks in physics:\n<b><font size='5pt'>$max_phy_marks</font></b>\n out of 120\n\nMax marks in Chemistry:\n<b><font size='5pt'>$max_chem_marks</font></b>\n out of 120\n\nMax marks in Maths:\n<b><font size='5pt'>$max_math_marks</font></b>\n out of 120"); ?></p></div>
  </div>
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'line']});
  google.charts.setOnLoadCallback(drawBasic);
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart)
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
             ['Element', 'marks'],
             <?php
                 echo "['Avg Phys. Marks',$avg_phy_marks]";
                 echo ",['Avg Chem. Marks',$avg_chem_marks]";
                 echo ",['Avg Maths Marks',$avg_math_marks]";
             ?>
          ]);
  var options = {'title':'Subjectwise Average Marks', 'width':500, 'height':450};
  var marksChart = new google.visualization.ColumnChart(document.getElementById('marks_distrb'));
  marksChart.draw(data, options);
}
function myFunction() {
document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
if (!event.target.matches('.dropbtn')) {
  var dropdowns = document.getElementsByClassName("dropdown-content");
  var i;
  for (i = 0; i < dropdowns.length; i++) {
    var openDropdown = dropdowns[i];
    if (openDropdown.classList.contains('show')) {
      openDropdown.classList.remove('show');
    }
  }
}
}
  function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Marks');

      data.addRows([
        <?php
            for($j=1 ; $j<=$i ; $j++)
            {
              echo "[".$j.",".$array[$j]["total_marks"]."],";
            }
        ?>
      ]);

      var options = {
          hAxis: {
            title: 'Test Id',
            minValue : 0,
            maxValue : <?php echo $i.","?>
            gridlines: {
               count: <?php echo ($i+1).","?>
            },
          },
          vAxis: {
            title: 'Marks',
            // gridlines: {
            //   count: 1
            // },
          }
        };
      //  hAxis.gridlines: {count: 2}
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
  }
</script>
</body>
</html>
