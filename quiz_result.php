<?php  //Start the Session
session_start();
require_once('connect.php');
$sql1 = "SELECT q1,q2,q3,q4,q5,q6,q7,q8,q9,q10 FROM test1 WHERE id=1";
$sql2 = "SELECT q1,q2,q3,q4,q5,q6,q7,q8,q9,q10 FROM test_answers WHERE test_no=1";
$result1 = mysqli_query($connection, $sql1) or die(mysqli_error($connection));
$result2 = mysqli_query($connection, $sql2) or die(mysqli_error($connection));
$total_marks=0;
$row1 = $result1->fetch_assoc();
$row2 = $result2->fetch_assoc();
for($x=1 ; $x<=10 ; $x++)
{
  if($row1["q".$x]==$row2["q".$x])
    $total_marks=$total_marks+4;
  else
    $total_marks=$total_marks-1;
}
$sql="UPDATE `test1` SET total_marks=$total_marks WHERE `id`=1";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
echo "Your Final Score is ".$total_marks;
?>
