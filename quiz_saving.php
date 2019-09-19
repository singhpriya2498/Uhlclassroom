<?php  //Start the Session
session_start();
require_once('connect.php');
$ques=$_POST["name"];
$answer=$_POST["ans"];
$qno=$_POST["question"];
$qno="q".$qno;
$sql = "UPDATE `test1` SET `$qno`=$answer WHERE `id`=1";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
echo "Successfully saved";
?>
