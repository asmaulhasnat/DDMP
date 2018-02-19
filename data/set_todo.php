<?php
$conn = new mysqli("localhost","root","","bikhatto");
$_POST = json_decode(file_get_contents('php://input'),true);
$act = $_POST['act'];
//echo $act; exit;
$iq = "insert into todo values(null,'$act','0',CURRENT_TIMESTAMP)";
//echo $iq;exit;
$conn->query($iq);
if($conn->affected_rows > 0){echo "saved";}
else {echo "problem";}

?>