<?php
session_start();
require_once('connect.php');
$tim=$_POST["dura"];
$test_no=$_POST["testt"];
$test_id="test".$test_no;
$sql = "UPDATE `$test_id` SET `time_taken_secs`=$tim WHERE `id`=1";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
 ?>
