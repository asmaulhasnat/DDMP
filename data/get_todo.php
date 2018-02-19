<?php
$conn = new mysqli("localhost","root","","bikhatto");
$selectQuery = "select id, action, done from todo";
$selectQueryResult = $conn->query($selectQuery);
$r=array();
while($row = $selectQueryResult->fetch_array(MYSQLI_ASSOC)){
	$row['done'] = $row['done']?true:false;
	$r[] = $row;	
	}
echo json_encode($r);	
?>