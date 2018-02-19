<?php
$conn = new mysqli("localhost","root","","bikhatto");
$_POST = json_decode(file_get_contents('php://input'),true);
$deleteQuery = "delete from todo where id='".$_POST['id']."' limit 1";
$conn->query($deleteQuery);
if($conn->affected_rows == 1){
	echo "Deleted";
	}
else {
	echo "Delete failed";
	}	