<?php  //Start the Session
session_start();
require_once('connect.php');
$q = $_REQUEST["q"];
$qno="q".$q;
$sql = "SELECT `$qno` FROM `test1` WHERE `id`=1";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$row = $result->fetch_assoc();
echo $row[$qno];
?>
