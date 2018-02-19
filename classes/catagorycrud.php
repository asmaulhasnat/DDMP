<?Php 
require "../include/database.php"; 
?>


<?php
//insert catagory start
if(isset($_POST['action']) && 
$_POST['action'] =="incatagory"){
	$cat_name=$_POST['catname'];

	
	
	$insertquery="insert into catagory values(null,'".$cat_name."',now())";
	$connection->query($insertquery);
	if($connection->affected_rows == 1){
		$message="successfully added";
		}
		else {$message="data insertaion failed";}
		echo $message;
	}


//insert catagory end

?>
<?php
//show catagory table start 
if (isset($_POST['action']) && $_POST['action']=="show"){
$recordstart=isset($_POST['recordstart'])?$_POST['recordstart']:0;
$pagesTOShow = 6;
$pagerecord=20;
if(isset($_POST['uss'])){
	$us=$_POST['uss'];

	$selectquary="select * from catagory where catname like '".$us."%' limit $recordstart,$pagerecord";	
	}
else{
$selectquary="select * from catagory  limit $recordstart,$pagerecord";
}
$result=$connection->query($selectquary);
$option="<table class='table table-responsive table-hover'><tr><th>SL</th><th class='hidden'>CATAGORY ID</th><th>CATAGORY NAME</th><th class='hidden'>CREATE DATE</th><th>Action</th><tr>";
$i=($recordstart+1);
while($row=$result->fetch_array()){
	
	$option.="<tr><td>".$i++."</td><td class='hidden'>".$row['catid']."</td><td class='catnam'>".$row['catname']."</td><td class='hidden'>".$row['createdate']."</td>
	<td>
	<a class='editbnt' data-edit='".$row['catid']."'><img src='../images/edit-xxl.png' width='30' height='30'/></a>|
	<a class='deltbnt' data-delt='".$row['catid']."'><img src='../images/delete.png' width='30' height='30'/></a>
	
	<td>
	
	
	</tr>";
	}
	$option.="</table>";
	echo $option;
	?>
<?php
if(isset($_POST['uss'])){
	$se= $_POST['uss'];
 $selectall="select count(*) from catagory where catname like '".$se."%'";}

else
{$selectall="select count(*) from catagory";}


$result=$connection->query($selectall);
$row=$result->fetch_array();
$totalrecord=$row[0];
$numofpages=ceil($totalrecord/$pagerecord);

?>


<center>
<ul class="pagination pagination-lg">
<?php
for($i=0;$i<$numofpages;$i++){
	if($recordstart==($i*$pagerecord)){
 echo "<li class='active'><a class='pagi' data-rec='".($i*$pagerecord)."'>".($i+1)."</a></li>";
	}else
	{
		if(abs($recordstart-($i*$pagerecord)) <= $pagesTOShow*$pagerecord){
		echo "<li><a class='pagi' data-rec='".($i*$pagerecord)."'>".($i+1)."</a></li>";
		}
		else {
		//echo "<li class='hide'><a class='pagi' data-rec='".($i*$pagerecord)."'>".($i+1)."</a></li>";			
		}
		
		}
}
?>
</ul>	
<?php
}
//show catagory table end


//delete catagory start

if (isset($_POST['action']) && $_POST['action']=="delete"){
	$catagoryid=$_POST['rdel'];
	$chek=sha1($_POST['check']);
	
	$upass=($_POST['upass']);
	if($chek!=$upass){
		echo "wrong password";
		
		}
		else{
	$deletequary="delete from catagory where catid=$catagoryid";
	$result=$connection->query($deletequary);
	if($connection->affected_rows==1)
	{
		$message="successfully delete";
		}
		else {"data delation failed";
		}
		echo $message;
	
}
}



 
//delete catagory end

//update catagory start
if (isset($_POST['action']) && $_POST['action']=="upcatagory"){
	$upcatagory=$_POST['upcatnam'];
	
	$upcatid=$_POST['upcatid'];
	$updatetequary="update  catagory set catname='".$upcatagory."' where catid='".$upcatid."'";
	
	$connection->query($updatetequary);
	if($connection->affected_rows==1)
	{
		$message="successfullyupdated";
		}
		else {$message="update failed";
		}
		echo $message;

//update area end	
}





	
