<?php
$conn = new mysqli("localhost","root","","bikhatto");
$_POST = json_decode(file_get_contents('php://input'),true);
//echo "want to change: " . $_POST['id'];
$updateQuery = "update todo set done='".$_POST['doneval']."' where id='".$_POST['id']."' limit 1";
//echo $updateQuery; exit;
$conn->query($updateQuery);
if($conn->affected_rows == 1){
	echo "Updated";
	}
else {
	echo "Update failed";
	}	