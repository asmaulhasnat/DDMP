

<?php 
require "../include/database.php"; 
?>

<?Php 
// division insert
if(isset($_POST['action']) && 
$_POST['action'] =="distadd"){
	$district_name=$_POST['distnam'];
	$divid=$_POST['divid'];
	
	$selectquary="insert into district values(null,'".$district_name."','".$divid."',now())";
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
//show  dist table

 $pagerecord=10;
 $recordstart=isset($_POST['recordstart'])?$_POST['recordstart']:0;
 if(isset($_POST['serch'])){
	 $serch=$_POST['serch'];
	 $selectQuery="SELECT district.*,division.divname FROM district, division where district.divid = division.divid and (distname like '".$serch."%') limit $recordstart,$pagerecord";
	 }
	 else {
$selectQuery = "SELECT district.*, division.divname FROM `district`,division where district.divid = division.divid  limit $recordstart,$pagerecord";
}
$eresult=$connection->query($selectQuery);

//echo $selectQuery;	 

$s=($recordstart+1);

//var_dump($result);
$output='<table class="table table-responsive table-hover"><tr><th>SL</th><th class="">Dist id</th><th> District Name</th><th class="">division id</th>
<th class="hidden">Create DATE</th><th>ACTION</th></tr>';
while($row=$eresult->fetch_array(MYSQL_ASSOC)){
	$distid=$row['distid'];
	$output.="<tr><td>".$s++."</td><td class=''>".$row['distid']."</td><td class='dn'>".$row['distname']."</td><td class='kk'>".$row['divid']."</td><td class='hidden'>".$row['datetime']."</td><td ><a class='editbtn' data-edit=".$distid."><img class='edit' src='../images/images (3).png' style='width:30px;'/></a>|<a  class='delbtn' data-del=".$distid."><img class='delete' src='../images/images (4).png' style='width:30px;'></a></td></tr>";
	}
	$output.="</table>";
	echo $output;	
if (isset($_POST['serch'])){
	$ser=$_POST['serch'];
	$recordquary="select  count(*)from district,division where district.divid = division.divid and(distname like'".$ser."%')";
	}else{
$recordquary="select count(*)from district,division where district.divid = division.divid";
}
//echo $recordquary;
$pageresult=$connection->query($recordquary);
$row=$pageresult->fetch_array();
$totalrecord = $row[0];

$numberofpages=ceil($totalrecord/$pagerecord);
//echo $numberofpages;
?>

<center>

<ul class="pagination pagination-lg">
<!--<li><img src="../images/left_arrow-512.png"width="30px"/></li>-->
<?php 
for($i=0;$i<$numberofpages;$i++){
	
	if($recordstart==($i*$pagerecord)){
 echo "<li class='active'><a class='page' data-pagi=".($i*$pagerecord).">".($i+1)."</a></li>";
}
else{
	 echo "<li><a class='page' data-pagi=".($i*$pagerecord).">".($i+1)."</a></li>";
	}}
?>	<!--<li><img src="../images/rightt_arrow-512.png" width="30px"></li>-->
</ul>
</center>	
<?Php
/*if(isset($_POST['action']) && $_POST['action']=="del"){
	$delid=$_POST['rdel'];
	$delquery="delete From division where divid='$delid'";
	$connection->query($delquery);
	if($connection->affected_rows==1){
		$message="data deleted";
		}
		else{$message="data deletion failed";}
		echo $message;
	}*/
?>

<?php


//update start




if  (isset($_POST['action']) && ($_POST['action']=="update")){
	
	 $updid=$_POST['updivid'];
		 $udisname=$_POST['updistname'];
			$udistid=$_POST['updistid'];
			//UPDATE `district` SET `distname` = 'Mymen' WHERE `district`.`distid` = 8; 
	
	$updatequary="UPDATE district SET distname = '".$udisname."', divid = '".$updid."' WHERE district.distid = '".$udistid."'"; 
	$connection->query($updatequary);
	if($connection->affected_rows==1){
		echo "update successful";}
		else{
			echo "update fail";}
	
	
	
	} 
	
	
	
//update close

?>
<?php 
// delete start delete stop for kazi vai

/*if(isset($_POST['action']) && $_POST['action']=="delete"){
    $dell=$_POST['rdel'];
	$delectquary="delete from district where distid=".$dell."";
	
	$connection->query($delectquary);
	if($connection->affected_rows ==1){
		$message="data delected";}
		else {$message="data can\'t delete";}
		echo $message;
	}*/ 
	

//delete end



?>
