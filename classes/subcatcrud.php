<?Php 
require "../include/database.php"; 
?>


<?php
//insert subcatagory start
if(isset($_POST['action']) && 
$_POST['action'] =="inscat"){
	$catagoryid=$_POST['cati'];
	$subcatname=$_POST['subcatna'];
	
	$selectquary="insert into subcatagory values(null,'".$subcatname."','".$catagoryid."',now())";
	$connection->query($selectquary);
	if($connection->affected_rows == 1){
		$message="successfully added";
		}
		else {$message="data insertaion failed";}
		echo $message;
	}


//insert subcatagory end

?>
<?php
//show area table start 
if (isset($_POST['action']) && $_POST['action']=="show"){
$recordstart=isset($_POST['recordstart'])?$_POST['recordstart']:0;
$pagesTOShow = 6;
$pagerecord=20;
if(isset($_POST['uss'])){
	$us=$_POST['uss'];

	$selectquary="select subcatagory.*,catagory.catid from subcatagory,catagory where subcatagory.catid=catagory.catid and(subcatname like '".$us."%') limit $recordstart,$pagerecord";	
	}
else{
$selectquary="select subcatagory.*,catagory.catid from subcatagory,catagory where subcatagory.catid=catagory.catid limit $recordstart,$pagerecord";
}
$result=$connection->query($selectquary);
$option="<table class='table table-responsive table-hover'><tr><th>SL</th><th class='hidden'>SUBCATAGORY ID</th><th>SUBCATAGORY NAME</th><th class=''>CATAGORY ID</th><th class='hidden'>CREATE DATE</th><th>Action</th><tr>";
$i=($recordstart+1);
while($row=$result->fetch_array()){
	
	$option.="<tr><td>".$i++."</td><td class='hidden'>".$row['subcatid']."</td><td class='subcme'>".$row['subcatname']."</td><td class='catid '>".$row['catid']."</td><td class='hidden'>".$row['createdate']."</td>
	<td>
	<a class='editbnt' data-edit='".$row['subcatid']."'><img src='../images/edit-xxl.png' width='30' height='30'/></a>|
	<a class='deltbnt' data-delt='".$row['subcatid']."'><img src='../images/delete.png' width='30' height='30'/></a>
	
	<td>
	
	
	</tr>";
	}
	$option.="</table>";
	echo $option;
	?>
<?php
if(isset($_POST['uss'])){
	$se= $_POST['uss'];
 $selectall="select count(*) from subcatagory where subcatname like '".$se."%'";}

else
{$selectall="select count(*) from subcatagory,catagory where subcatagory.catid=catagory.catid ";}


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
//show area table end


//delete area start
//rdel:recorddel
if (isset($_POST['action']) && $_POST['action']=="delete"){
	$subcataid=$_POST['rdel'];
	$chek=sha1($_POST['check']);
	
	$upass=($_POST['upass']);
	if($chek!=$upass){
		echo "wrong password";
		
		}
		else{
	$deletequary="delete from subcatagory where subcatid=$subcataid";
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

//update subcatagory start
if (isset($_POST['action']) && $_POST['action']=="upsubcat"){
	$subcatna=$_POST['upsucatnam'];
	$upcatid=$_POST['upcatid'];
	$upsubcatid=$_POST['upsucatid'];
	$updatetequary="update  subcatagory set subcatname='".$subcatna."',catid='".$upcatid."' where 
	subcatid='".$upsubcatid."'";
	
	$connection->query($updatetequary);
	if($connection->affected_rows==1)
	{
		$message="successfullyupdated";
		}
		else {$message="update failed";
		}
		echo $message;

//update subcatagory end	
}





	
