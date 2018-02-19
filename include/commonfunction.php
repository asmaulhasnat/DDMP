<?php
require "../include/database.php";

function divisionlist(){
	global $connection;
	$selectdivisionquery="select * from division order by divname asc";
	$result=$connection->query($selectdivisionquery);
	$option="";
	while($row=$result->fetch_array()){
		
		$option.= "<option value='".$row['divid']."'>".$row['divname']."</option>";
		}
	return $option;
	}
	
	function catagorylist(){
	global $connection;
	$selectccatagory="select * from catagory order by catname asc";
	$result=$connection->query($selectccatagory);
	$option="";
	while($row=$result->fetch_array()){
		
		$option.= "<option value='".$row['catid']."'>".$row['catname']."</option>";
		}
	return $option;
	}
	
?>