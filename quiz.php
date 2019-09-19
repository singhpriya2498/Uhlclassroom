<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
        <script>
          $(document).ready(function(){
            $("#deselect").click(function(){
              $("input[name=ans]").prop("checked",false);
            });
          });
</script>
        <script type="text/javascript">
        function startTimer(duration, display) {
          var start = Date.now(), diff, hour, minutes, seconds;
          function timer() {
            diff = duration - (((Date.now() - start) / 1000) | 0);

            hour = (diff / 3600) | 0;
            minutes = ((diff - hour * 3600) / 60) | 0;
            seconds = (diff % 60) | 0;

            hour = hour < 10 ? "0" + hour : hour;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = hour + ":" + minutes + ":" + seconds;

            if (diff <= 0) {
              alert("Time out!")
              window.location.href="quiz_result.php";
            }
          };
      timer();
      setInterval(timer, 1000);
    }
        function load(idd,sub) {

        	var mydata;
          if(sub==1)
            mydata = JSON.parse(physics);
            else if(sub==2)
              mydata = JSON.parse(chemistry);
              else if(sub==3)
                mydata = JSON.parse(maths);
          var x=mydata[idd].q_id;
          document.getElementById("ques").innerHTML="Q"+mydata[idd].q_id+") ";
        	document.getElementById("ques").innerHTML+=mydata[idd].question;
          document.getElementById("op1").innerHTML=mydata[idd].opt1;
          document.getElementById("op2").innerHTML=mydata[idd].opt2;
          document.getElementById("op3").innerHTML=mydata[idd].opt3;
          document.getElementById("op4").innerHTML=mydata[idd].opt4;
          document.getElementById("question").setAttribute("value",x);
        }
        function myFunction(qno){
          if(document.getElementById("phys").checked){
              load(qno,1);
              }else if(document.getElementById("chem").checked){
                    load(qno,2);
                  }else if(document.getElementById("math").checked){
                        load(qno,3);
                      }
            document.getElementById("next").onclick = function () { myFunction(qno+1); };
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var x =this.responseText;
                if(x=="0"){
                  alert("NOTHING!");
                }
                else
                {
                  var y="opt"+x;
                  document.getElementById(y).checked = true;
                }
            }
          };
          xmlhttp.open("GET", "quiz_tick.php?q=" + (qno+1).toString(), true);
          xmlhttp.send();
					}
        function loaderFunc(x,y){
          load(x,y);
          var time_period = 60 * 180, display = document.querySelector('#time');
          startTimer(time_period, display);
        }
        function SaveFunction(obj){
            $(obj).ajaxSubmit({
              success:successForm
            });
            return false;
          }
          function successForm(result){
            alert(result);
          }
        function exitFunction(){
            window.location.href="quiz_result.php";
          }
        </script>
      	<link rel="stylesheet" type="text/css" href="quiz.css">
        <title>Online Test Series</title>
        <script type="text/javascript" src="questions.json"></script>
    </head>
    <body id="budy" onload="loaderFunc(0,1)">
      <div style="font-size:27px;font-style:bold;position:relative;right:200px;top:120px" align="right">Time left <br><span id="time"></span></div>
			<div id="working_area" align="center">
        <h1 style="font-size:50px;" align="center">Quiz</h1><br>
        <div id="Subs">
        <ul class="Subjects">
          <li>
			<div class="phy">
				<input type="radio" id="phys" name="subject" onclick="load(0,1)" checked="checked" />
				<label for="phys">Physics</label>
			</div>
          </li>
          <li>
			<div class="chem">
				<input type="radio" id="chem" name="subject" onclick="load(0,2)" />
				<label for="chem">Chemistry</label>
			</div>
          </li>
          <li>
			<div class="maths">
				<input type="radio" id="math" name="subject" onclick="load(0,3)"/>
				<label for="math">Mathematics</label>
			</div>
          </li>
			<div class="exit">
				<input type="button" id="exit" name="exit" onclick="exitFunction()"/>
				<label style="font-size:19px;padding-left:5px;" for="exit">Exit Test</label>
			</div>
        </ul>
    </div><br>
      <div class="contain_it">
        <div id="Q_box">
          <div align="left">
				      <p id="ques"></p>
				      <form method="POST" action="quiz_saving.php" onsubmit="return SaveFunction(this)">
					           <input id="opt1" type="radio" name="ans" value="1">
					                <span id="op1"></span><br>
					           <input id="opt2" type="radio" name="ans" value="2">
					                <span id="op2"></span><br>
					           <input id="opt3" type="radio" name="ans" value="3">
					                <span id="op3"></span><br>
					           <input id="opt4" type="radio" name="ans" value="4">
					                <span id="op4"></span><br>
                        </div><br>
                     <input id="question" type="hidden" value="" name="question">
                     <input id="saving" type="submit" value="Save Ans">
              </form>
              <button id="deselect">Deselect</button>
              <button id="next" onclick="myFunction(1)">Next</button>
            </div>
			<div align="right">
    			<div class="button-container">
       			<button id="buttonz" onclick="myFunction(0)">Q1</button>
       			<button id="buttonz" onclick="myFunction(1)">Q2</button>
       			<button id="buttonz" onclick="myFunction(2)">Q3</button>
       			<button id="buttonz" onclick="myFunction(3)">Q4</button>
       			<button id="buttonz" onclick="myFunction(4)">Q5</button>
				<button id="buttonz" onclick="myFunction(5)">Q6</button>
       			<button id="buttonz" onclick="myFunction(6)">Q7</button>
       			<button id="buttonz" onclick="myFunction(7)">Q8</button>
       			<button id="buttonz" onclick="myFunction(8)">Q9</button>
       			<button id="buttonz" onclick="myFunction(9)">Q10</button>
          </div>
			  </div>
      </div>
    </div>
    </body>
</html>
