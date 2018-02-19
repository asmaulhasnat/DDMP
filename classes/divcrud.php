<?php 
require "../include/database.php"; 
?>

<?Php 
// division insert
if(isset($_POST['action']) && 
$_POST['action'] =="divadd"){
	$division_name=$_POST['dinam'];
	
	$selectquary="insert into division values(null,'".$division_name."',now())";
	$connection->query($selectquary);
	if($connection->affected_rows == 1){
		$message="successfully added";
		}
		else {$message="data insertaion failed";}
		echo $message;
	}
//division insert end	
?>
<?php 
//show  division table
if (isset($_POST['action']) && $_POST['action'] =="showdata"){
	$insertquary="select * from division";
	$result=$connection->query($insertquary);
$output='<table class="table table-responsive table-hover"><tr><th>SL</th><th>NAME</th>
<th class="hidden">Create DATE</th><th>division id</th><th>ACTION</th></tr>';
$i=1;
while
($row=$result->fetch_array()){
	$divisionid=$row['divid'];
	$output.="<tr><td>".$i++."</td><td class='dn'>".$row['divname']."</td><td class='hidden'>".$row['createdate']."</td><td>".$row['divid']."</td><td ><a class='editbtn' data-edit='".$divisionid."'><img  src='../images/edit-xxl.png' style='width:30px;'/></a>|<a  class='delbtn' data-del='".$divisionid."'><img  src='../images/delete.png' style='width:30px;'></a></td></tr>";
	}
	$output.="</table>";
	echo $output;	
	} 
	//<img src='../images/edit-xxl.png' style='width:30px;'/>|<img src='../images/delete.png' style='width:30px;'>
	
	//show division table end 
?>

<?Php
if(isset($_POST['action']) && ($_POST['action']=="del")){
	$delid=$_POST['rdel'];
	$delquery="delete From division where divid='$delid'";
	$connection->query($delquery);
	if($connection->affected_rows==1){
		$message="data deleted";
		}
		else{$message="data deletion failed";}
		echo $message;
	}
?>

<?php // edit 




// edit close

//update start

if  (isset($_POST['action']) && ($_POST['action']=="update")){
	
	$upp=$_POST['up'];
	$uuu=$_POST['uid'];
	$updatequary=" UPDATE division SET divname ='$upp',createdate=now() where divid='$uuu'";
	$connection->query($updatequary);
	
	
	} 
//update close

?>
