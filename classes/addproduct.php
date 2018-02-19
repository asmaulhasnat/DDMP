<?php 
if (isset($_POST['action'])){
	
	$ftitle=$_POST['ptit'];
	$pprice=$_POST['ppri'];
	$parea=$_POST['pare'];
	$upfile=$_FILES['pnam']['name'];
	echo $upfile;
	exit;
	
	$filename="uploadfiles/".$upfile;
	
	if(is_uploaded_file($_FILES['pnam']['tmp_name'])){
		if(move_uploaded_file($_FILES['pnam']['tmp_name'],$filename)){
			require "../include/database.php";
			$insertquery="insert into upload_file values(null,'$ftitle','',now())"; 
			$connection->query($insertquery);
			if($connection->affected_rows==1){
				echo "successfully uploded";}
					else {echo"uploded fail";}
	
			}
	}
}
			
			
	
?>