<?php
session_start();
require_once('connect.php');
$time=$_POST["dura"];
$tim = intval($time);
$test_no=$_POST["testt"];
$test_id = "test".$test_no;

$sqlw ="SELECT 1 FROM $test_id";
$val = mysqli_query($connection,$sqlw);
if($val == FALSE)
{
  echo "No results Found";
  die(mysqli_error($connection));
  exit();
}

if($tim==-1)
{
  $sql11 = "SELECT time_taken_secs FROM $test_id WHERE id=1";
  $result11 = mysqli_query($connection, $sql11) or die(mysqli_error($connection));
  $rew = $result11->fetch_assoc();
  $tim = $rew['time_taken_secs'];
}
//alert($test_id);
$sql = "UPDATE `$test_id` SET `time_taken_secs`=$tim WHERE `id`=1";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$sql1 = "SELECT q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20,q21,q22,q23,q24,q25,q26,q27,q28,q29,q30,q31,q32,q33,q34,q35,q36,q37,q38,q39,q40,q41,q42,q43,q44,q45,q46,q47,q48,q49,q50,q51,q52,q53,q54,q55,q56,q57,q58,q59,q60,q61,q62,q63,q64,q65,q66,q67,q68,q69,q70,q71,q72,q73,q74,q75,q76,q77,q78,q79,q80,q81,q82,q83,q84,q85,q86,q87,q88,q89,q90 FROM $test_id WHERE id=1";
$sql2 = "SELECT q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18,q19,q20,q21,q22,q23,q24,q25,q26,q27,q28,q29,q30,q31,q32,q33,q34,q35,q36,q37,q38,q39,q40,q41,q42,q43,q44,q45,q46,q47,q48,q49,q50,q51,q52,q53,q54,q55,q56,q57,q58,q59,q60,q61,q62,q63,q64,q65,q66,q67,q68,q69,q70,q71,q72,q73,q74,q75,q76,q77,q78,q79,q80,q81,q82,q83,q84,q85,q86,q87,q88,q89,q90 FROM test_answers WHERE test_no=$test_no";
$sql3 = "SELECT AVG(total_marks) FROM $test_id";
$sql4 = "SELECT MAX(total_marks) FROM $test_id";
$sql5 = "SELECT COUNT(total_marks) FROM $test_id";
$result1 = mysqli_query($connection, $sql1) or die(mysqli_error($connection));

$result2 = mysqli_query($connection, $sql2) or die(mysqli_error($connection));
$result3 = mysqli_query($connection, $sql3) or die(mysqli_error($connection));
$result4 = mysqli_query($connection, $sql4) or die(mysqli_error($connection));
$result5 = mysqli_query($connection, $sql5) or die(mysqli_error($connection));
$total_marks=0;
$correct=0;
$incorrect=0;
$unattemped=0;
$phy_corr=0;
$phy_uncorr=0;
$phy_unattempted=0;
$chem_corr=0;
$chem_uncorr=0;
$chem_unattempted=0;
$math_corr=0;
$math_uncorr=0;
$math_unattempted=0;
$row1 = $result1->fetch_assoc();
$row2 = $result2->fetch_assoc();
$ans1 = $result3->fetch_assoc();
$ans2 = $result4->fetch_assoc();
$ans3 = $result5->fetch_assoc();
$max_marks = $ans2['MAX(total_marks)'];
$avg_marks = $ans1['AVG(total_marks)'];
$no_of_stud = $ans3['COUNT(total_marks)'];
$hr=(int)$tim/3600;
$hr=(int)$hr;
$min=(int)((int)$tim-(int)$hr*3600)/60;
$min=(int)$min;
$sec=(int)$tim-$hr*3600-$min*60;
$sec=round($sec,0);
if($sec<10)
{
  $sec='0'.$sec;
}
if($min<10)
{
  $min='0'.$min;
}
for($x=1 ; $x<=90 ; $x++)
{
  if($row1["q".$x]==$row2["q".$x])
  {
    if($x<=30)
    {
      $phy_corr=$phy_corr+1;
    }
    else if($x<=60)
    {
      $chem_corr=$chem_corr+1;
    }
    else
    {
      $math_corr=$math_corr+1;
    }
    $correct=$correct+1;
    $total_marks=$total_marks+4;
  }
  else if($row1["q".$x]!=$row2["q".$x] && $row1["q".$x]!=0)
  {
    if($x<=30)
    {
      $phy_uncorr=$phy_uncorr+1;
    }
    else if($x<=60)
    {
      $chem_uncorr=$chem_uncorr+1;
    }
    else
    {
      $math_uncorr=$math_uncorr+1;
    }
    $incorrect=$incorrect+1;
    $total_marks=$total_marks-1;
  }
  else
  {
    if($x<=30)
    {
      $phy_unattempted=$phy_unattempted+1;
    }
    else if($x<=60)
    {
      $chem_unattempted=$chem_unattempted+1;
    }
    else
    {
      $math_unattempted=$math_unattempted+1;
    }
    $unattemped=$unattemped+1;
  }
}
$sql6 = "SELECT COUNT(total_marks) FROM $test_id WHERE total_marks>$total_marks";
$result6 = mysqli_query($connection, $sql6) or die(mysqli_error($connection));
$ans4 = $result6->fetch_assoc();
$rank = $ans4['COUNT(total_marks)']+1;
$phys_marks=4*$phy_corr-$phy_uncorr;
$math_marks=4*$math_corr-$math_uncorr;
$chem_marks=4*$chem_corr-$chem_uncorr;
$sql7 = "UPDATE `$test_id` SET `phy_marks`=$phys_marks WHERE `id`=1";
$result7 = mysqli_query($connection, $sql7) or die(mysqli_error($connection));
$sql8 = "UPDATE `$test_id` SET `chem_marks`=$chem_marks WHERE `id`=1";
$result8 = mysqli_query($connection, $sql8) or die(mysqli_error($connection));
$sql9 = "UPDATE `$test_id` SET `maths_marks`=$math_marks WHERE `id`=1";
$result9 = mysqli_query($connection, $sql9) or die(mysqli_error($connection));
$pert_marks=($total_marks/3.6);
$pert_marks=round($pert_marks,1);
$sql="UPDATE `$test_id` SET total_marks=$total_marks WHERE `id`=1";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <script type="text/javascript" src="questions.json"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="analysis_Style.css">
</head>
<body style="background-color:#F5F5F5">
<h1 align="center">Test Analysis</h1>
<br>
<center>
  <div class="tab">
  <button class="tablinks" id="defaultOpen" onclick="openAnalysis(event, 'Perf')">Your Performance</button>
  <button class="tablinks" onclick="openAnalysis(event, 'Answs')">Your Answers</button>
</div>
<br>
</center>
<div id="Perf" class="tabcontent">
<div class="row">
  <div class="column"><p><?php echo nl2br("Score:\n<b><font size='5pt'>$total_marks</font></b> ($pert_marks%)\n out of 360"); ?></p></div>
  <div class="column"><p><?php echo nl2br("Rank:\n<b><font size='5pt'>$rank</font></b>\n out of $no_of_stud students");?></p></div>
  <div class="column"><p><?php echo nl2br("Time Taken:\n<b><font size='5pt'>$hr:$min:$sec Hrs</font></b>\n out of 3:00:00Hrs");?></p></div>
</div>
<br><br><br>
<div align="center">
  <table display="inline" width=100%>
      <tr>
          <td><div id="piechart" width=33%></div></td>
          <td align="center"><div id="marks_distrb"></div></td>
          <td><div id="marks_distr" width=40%></div></td>
      </tr>
   </table>
</div>
</div>
<center>
<div id="Answs" class="tabcontent">
  <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">All Subjects</button>
    <div id="myDropdown" class="dropdown-content">
      <button class="qlinks" id="defOpen" onclick="QuesAnalysis(event, 'Physics')">Physics</button>
      <button class="qlinks" onclick="QuesAnalysis(event, 'Chemistry')">Chemistry</button>
      <button class="qlinks" onclick="QuesAnalysis(event, 'Maths')">Maths</button>
    </div>
  </div>
  <br><br><br><br>
  <div class="subbjectz">
    <div id="Physics" class="qContent">
      <p><b>Physics</b></p><br>
      <div id="pQues">
      </div>
    </div>
    <div id="Chemistry" class="qContent">
      <p><b>Chemistry</b></p><br>
      <div id="cQues">
      </div>
    </div>
    <div id="Maths" class="qContent">
      <p><b>Mathematics</b></p><br>
      <div id="mQues">
      </div>
    </div>
  </div>
</div>
</center>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
var phy_count = 0;
var chem_count = 0;
var math_count = 0;
function loader(sub)
{
  //1 for phy, 2 for chem, 3 for math
  var ur_anwsers = <?php echo '["' . implode('", "', $row1) . '"]' ?>;
  var mydata;
  if(sub==1)
  {
    mydata = JSON.parse(physics);
    for(var i=0 ; i<30 ; i++)
    {
      var main_div = document.createElement("DIV");
      var div_idd = "main_div_id_p" + i;
      main_div.setAttribute("id", div_idd);
      document.getElementById('pQues').appendChild(main_div);
      var ques = document.createElement("p");
      ques.innerHTML= "<br>" +"Q" + mydata[i].q_id + ") " + mydata[i].question + "<br>";
      document.getElementById(div_idd).appendChild(ques);
      var options = document.createElement("table");
      var table_id="opTable_p"+i;
      options.setAttribute("id", table_id);
      document.getElementById(div_idd).appendChild(options);

      var y1 = document.createElement("TR");
      var row_id1 = "myTr1_p"+i;
      y1.setAttribute("id", row_id1);
      document.getElementById(table_id).appendChild(y1);

      var z1 = document.createElement("TD");
      var text1="a) "+mydata[i].opt1;
      var t1 = document.createTextNode(text1);
      z1.appendChild(t1);

      var z2 = document.createElement("TD");
      var text2="b) "+mydata[i].opt2;
      var t2 = document.createTextNode(text2);
      z2.appendChild(t2);

      var y2 = document.createElement("TR");
      var row_id2="myTr2_p"+i;
      y2.setAttribute("id", row_id2);
      document.getElementById(table_id).appendChild(y2);

      var z3 = document.createElement("TD");
      var text3="c) "+mydata[i].opt3;
      var t3 = document.createTextNode(text3);
      z3.appendChild(t3);

      var z4 = document.createElement("TD");
      var text4="d) "+mydata[i].opt4;
      var t4 = document.createTextNode(text4);
      z4.appendChild(t4);
      document.getElementById(row_id1).appendChild(z1);
      document.getElementById(row_id1).appendChild(z2);
      document.getElementById(row_id2).appendChild(z3);
      document.getElementById(row_id2).appendChild(z4);
      document.getElementById(div_idd).style.border = "thin solid grey";
      var y1 = document.createElement("P");
      var x = parseInt(mydata[i].answer)+parseInt("a".charCodeAt(0))-1;
      var ans = String.fromCharCode(x);
      var q_code = parseInt(mydata[i].q_id) + parseInt((sub-1)*30);
      var qqq = ur_anwsers[q_code-1];
      var verify = parseInt(qqq);
      var x1 = parseInt(qqq)+parseInt("a".charCodeAt(0))-1;
      var ans1 = String.fromCharCode(x1);
      y1.innerHTML="Correct Answer: "+ ans + "    |    " + " Your Answer: " + ((verify==0)? "NA" : ans1) + "<br>";
      document.getElementById('pQues').appendChild(y1);
    }
  }
  else if(sub==2)
  {
    mydata = JSON.parse(chemistry);
    for(var i=0 ; i<30 ; i++)
    {
      var main_div = document.createElement("DIV");
      var div_idd = "main_div_id_c" + i;
      main_div.setAttribute("id", div_idd);
      document.getElementById('cQues').appendChild(main_div);
      var ques = document.createElement("p");
      ques.innerHTML= "<br>" +"Q" + mydata[i].q_id + ") " + mydata[i].question + "<br>";
      document.getElementById(div_idd).appendChild(ques);
      var options = document.createElement("table");
      var table_id="opTable_c"+i;
      options.setAttribute("id", table_id);
      document.getElementById(div_idd).appendChild(options);

      var y1 = document.createElement("TR");
      var row_id1 = "myTr1_c"+i;
      y1.setAttribute("id", row_id1);
      document.getElementById(table_id).appendChild(y1);

      var z1 = document.createElement("TD");
      var text1="a) "+mydata[i].opt1;
      var t1 = document.createTextNode(text1);
      z1.appendChild(t1);

      var z2 = document.createElement("TD");
      var text2="b) "+mydata[i].opt2;
      var t2 = document.createTextNode(text2);
      z2.appendChild(t2);

      var y2 = document.createElement("TR");
      var row_id2="myTr2_c"+i;
      y2.setAttribute("id", row_id2);
      document.getElementById(table_id).appendChild(y2);

      var z3 = document.createElement("TD");
      var text3="c) "+mydata[i].opt3;
      var t3 = document.createTextNode(text3);
      z3.appendChild(t3);

      var z4 = document.createElement("TD");
      var text4="d) "+mydata[i].opt4;
      var t4 = document.createTextNode(text4);
      z4.appendChild(t4);
      document.getElementById(row_id1).appendChild(z1);
      document.getElementById(row_id1).appendChild(z2);
      document.getElementById(row_id2).appendChild(z3);
      document.getElementById(row_id2).appendChild(z4);
      document.getElementById(div_idd).style.border = "thin solid grey";
      var y1 = document.createElement("P");
      var x = parseInt(mydata[i].answer)+parseInt("a".charCodeAt(0))-1;
      var ans = String.fromCharCode(x);
      var q_code = parseInt(mydata[i].q_id) + parseInt((sub-1)*30);
      var qqq = ur_anwsers[q_code-1];
      var verify = parseInt(qqq);
      var x1 = parseInt(qqq)+parseInt("a".charCodeAt(0))-1;
      var ans1 = String.fromCharCode(x1);
      y1.innerHTML="Correct Answer: "+ ans + "    |    " + " Your Answer: " + ((verify==0)? "NA" : ans1) + "<br>";
      document.getElementById('cQues').appendChild(y1);
    }
  }
  else if(sub==3)
  {
    mydata = JSON.parse(maths);
    for(var i=0 ; i<30 ; i++)
    {
      var main_div = document.createElement("DIV");
      var div_idd = "main_div_id_m" + i;
      main_div.setAttribute("id", div_idd);
      document.getElementById('mQues').appendChild(main_div);
      var ques = document.createElement("p");
      ques.innerHTML= "<br>" +"Q" + mydata[i].q_id + ") " + mydata[i].question + "<br>";
      document.getElementById(div_idd).appendChild(ques);
      var options = document.createElement("table");
      var table_id="opTable_m"+i;
      options.setAttribute("id", table_id);
      document.getElementById(div_idd).appendChild(options);

      var y1 = document.createElement("TR");
      var row_id1 = "myTr1_m"+i;
      y1.setAttribute("id", row_id1);
      document.getElementById(table_id).appendChild(y1);

      var z1 = document.createElement("TD");
      var text1="a) "+mydata[i].opt1;
      var t1 = document.createTextNode(text1);
      z1.appendChild(t1);

      var z2 = document.createElement("TD");
      var text2="b) "+mydata[i].opt2;
      var t2 = document.createTextNode(text2);
      z2.appendChild(t2);

      var y2 = document.createElement("TR");
      var row_id2="myTr2_m"+i;
      y2.setAttribute("id", row_id2);
      document.getElementById(table_id).appendChild(y2);

      var z3 = document.createElement("TD");
      var text3="c) "+mydata[i].opt3;
      var t3 = document.createTextNode(text3);
      z3.appendChild(t3);

      var z4 = document.createElement("TD");
      var text4="d) "+mydata[i].opt4;
      var t4 = document.createTextNode(text4);
      z4.appendChild(t4);
      document.getElementById(row_id1).appendChild(z1);
      document.getElementById(row_id1).appendChild(z2);
      document.getElementById(row_id2).appendChild(z3);
      document.getElementById(row_id2).appendChild(z4);
      document.getElementById(div_idd).style.border = "thin solid grey";
      var y1 = document.createElement("P");
      var x = parseInt(mydata[i].answer)+parseInt("a".charCodeAt(0))-1;
      var ans = String.fromCharCode(x);
      var q_code = parseInt(mydata[i].q_id) + parseInt((sub-1)*30);
      var qqq = ur_anwsers[q_code-1];
      var verify = parseInt(qqq);
      var x1 = parseInt(qqq)+parseInt("a".charCodeAt(0))-1;
      var ans1 = String.fromCharCode(x1);
      y1.innerHTML="Correct Answer: "+ ans + "    |    " + " Your Answer: " + ((verify==0)? "NA" : ans1) + "<br>";
      document.getElementById('mQues').appendChild(y1);
    }
  }
}
function openAnalysis(evt, idName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(idName).style.display = "block";
  evt.currentTarget.className += " active";
     if(idName=="Answs")
     {
       if(phy_count==0)
       {
         loader(1);
         phy_count++;
       }
     }
}
document.getElementById("defaultOpen").click();

function QuesAnalysis(evt, subName) {
  var i, dropdowncontent, qlinks;
  dropdowncontent = document.getElementsByClassName("qContent");
  for (i = 0; i < dropdowncontent.length; i++) {
    dropdowncontent[i].style.display = "none";
  }
  qlinks = document.getElementsByClassName("qlinks");
  for (i = 0; i < qlinks.length; i++) {
    qlinks[i].className = qlinks[i].className.replace(" active", "");
  }
  document.getElementById(subName).style.display = "block";
  evt.currentTarget.className += " active";
  if(subName=="Physics")
  {
    if(phy_count==0)
    {
      loader(1);
      phy_count++;
    }
  }
  else if(subName=="Chemistry")
  {
    if(chem_count==0)
    {
      loader(2);
      chem_count++;
    }
  }
  else if(subName=="Maths")
  {
    if(math_count==0)
    {
      loader(3);
      math_count++;
    }
  }
}
document.getElementById("defOpen").click();
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
function drawChart() {
  var data1 = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  <?php
      echo "['Correct',".$correct."]";
      echo ",['Incorrect',".$incorrect."]";
      echo ",['Unattempted',".$unattemped."]";
  ?>
]);
  var data2 = google.visualization.arrayToDataTable([
    ['Task', '2Hours per Day'],
  <?php
      echo "['Physics',".$phys_marks."]";
      echo ",['Math',".$math_marks."]";
      echo ",['Chemistry',".$chem_marks."]";
  ?>
]);
var data3 = google.visualization.arrayToDataTable([
         ['Element', 'marks'],
         <?php
             echo "['Your Marks',$total_marks]";
             echo ",['Max Marks',$max_marks]";
             echo ",['Avg Marks',$avg_marks]";
         ?>
      ]);

  // Optional; add a title and set the width and height of the chart
  var options1 = {'title':'Questions', 'width':500, 'height':400, is3D: true};
  var options2 = {'title':'Sujbectwise Marks Distribution', 'width':500, 'height':400, is3D: true};
  var options3 = {'title':'Marks Distribution', 'width':500, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart1 = new google.visualization.PieChart(document.getElementById('piechart'));
  chart1.draw(data1, options1);
  var chart2 = new google.visualization.PieChart(document.getElementById('marks_distr'));
  chart2.draw(data2, options2);
  var marksChart = new google.visualization.ColumnChart(document.getElementById('marks_distrb'));
  marksChart.draw(data3, options3);
}
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
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
</script>
</body>
</html>
