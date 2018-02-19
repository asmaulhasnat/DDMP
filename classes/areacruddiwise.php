<?Php 
require "../include/database.php"; 
?>
<?php
// division change start 
if(isset($_POST['action']) && 
$_POST['action'] =="changedist"){
	$divid=$_POST['did'];
	
	$selectquary="select * from district where divid='".$divid."'";
	$result=$connection->query($selectquary);



	$option="<option value='-1'>Select District</option>";
	while($row=$result->fetch_array()){
	
	$option.= "<option value='".$row['distid']."'>".$row['distname']."</option>";
	
		}
		
	
			 echo $option;
	}
	
//division change end
?>

<?php
//insert area start
if(isset($_POST['action']) && 
$_POST['action'] =="inarea"){
	$area_name=$_POST['aren'];
	$area_des=$_POST['aredes'];
	
	$divid=$_POST['dii'];
	$districtid=$_POST['disii'];
	$selectquary="insert into area values(null,'".$area_name."','".$area_des."','".$divid."','".$districtid."',now())";
	$connection->query($selectquary);
	if($connection->affected_rows == 1){
		$message="successfully added";
		}
		else {$message="data insertaion failed";}
		echo $message;
	}


//insert area end

?>
<?php
//show area table start 
if (isset($_POST['action']) && $_POST['action']=="show"){
$recordstart=isset($_POST['recordstart'])?$_POST['recordstart']:0;
$pagesTOShow = 6;
$pagerecord=20;
if(isset($_POST['uss'])){
	$us=$_POST['uss'];

	$selectquary="select area.*,division.divid,division.divname,district.distid from area,division,district where area.divid=division.divid and area.distid=district.distid and(divname like '".$us."%') limit $recordstart,$pagerecord";	
	}
else{
$selectquary="select area.*,division.divid,division.divname,district.distid from area,division,district where area.divid=division.divid and area.distid=district.distid  limit $recordstart,$pagerecord";
}
$result=$connection->query($selectquary);
$option="<table class='table table-responsive table-hover'><tr><th>SL</th><th class='hidden'>AREA ID</th><th>AREA NAME</th><th>AREA DESCRIPTION</th><th class=''>DIVISION ID</th><th class=''>DISTRICT ID</th><th class='hidden'>CREATE DATE</th><th>Action</th><tr>";
$i=($recordstart+1);
while($row=$result->fetch_array()){
	
	$option.="<tr><td>".$i++."</td><td class='hidden'>".$row['areaid']."</td><td class='aname'>".$row['area_name']."</td><td class='arede'>".$row['area_description']."</td><td class='divid '>".$row['divid']."</td><td  class='distid '>".$row['distid']."</td><td class='hidden'>".$row['createdate']."</td>
	<td>
	<a class='editbnt' data-edit='".$row['areaid']."'><img src='../images/edit-xxl.png' width='30' height='30'/></a>|
	<a class='deltbnt' data-delt='".$row['areaid']."'><img src='../images/delete.png' width='30' height='30'/></a>
	
	<td>
	
	
	</tr>";
	}
	$option.="</table>";
	echo $option;
	?>
<?php
if(isset($_POST['uss'])){
	$se= $_POST['uss'];
 $selectall="select count(*)from area,division,district where area.divid=division.divid and area.distid=district.distid and(divname like '".$se."%')";}

else
{$selectall="select count(*) from area,division,district where area.divid=division.divid and area.distid=district.distid";}


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
	$areaid=$_POST['rdel'];
	$chek=sha1($_POST['check']);
	
	$upass=($_POST['upass']);
	if($chek!=$upass){
		echo "wrong password";
		
		}
		else{
	$deletequary="delete from area where areaid=$areaid";
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



 
//delete area end

//update area start
if (isset($_POST['action']) && $_POST['action']=="uparea"){
	$uparea=$_POST['uparenam'];
	$upareades=$_POST['uparedes'];
	$upardid=$_POST['upareadiv'];
	$aredisid=$_POST['uparedistid'];
	$upareaid=$_POST['upareaid'];
	$updatetequary="update  area set area_name='".$uparea."',area_description='".$upareades."',divid='".$upardid."',distid='".$aredisid."' where 
	areaid='".$upareaid."'";
	
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





	
