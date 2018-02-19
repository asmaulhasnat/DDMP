
<?php
 require "alllink.php";
 require "database.php";
 $pagerecord=2;
 $recordstart=isset($_GET['recordstart'])?$_GET['recordstart']:0;
	$selectquary="select * from district limit $recordstart,$pagerecord";
	$result=$connection->query($selectquary);
$output='<table class="table table-responsive table-hover"><tr><th>SL</th><th class="hidden">Dist id</th><th> District Name</th><th class="hidden">division id</th>
<th>Create DATE</th><th>ACTION</th></tr>';

$s=($recordstart+1);
while
($row=$result->fetch_array()){
	$divisionid=$row['divid'];
	$output.="<tr><td>".$s++."</td><td class='hidden'>".$row['distid']."</td><td class='dn'>".$row['distname']."</td><td class='hidden'>".$row['divid']."</td><td>".$row['datetime']."</td><td ><a class='editbtn' data-edit='".$divisionid."'><img  src='../images/edit-xxl.png' style='width:30px;'/></a>|<a  class='delbtn' data-del='".$divisionid."'><img  src='../images/delete.png' style='width:30px;'></a></td></tr>";
	}
	$output.="</table>";
	echo $output;	

$recordquary="select  count(*)from district";
$pageresult=$connection->query($recordquary);
$row=$pageresult->fetch_array();
$totalrecord = $row[0];
$numberofpages=ceil($totalrecord/$pagerecord);
?>


<ul class="pagination pagination-lg">
<?php 
for($i=0;$i<$numberofpages;$i++){
	
	if($recordstart==($i*$pagerecord)){
 echo "<li class='active'><a href='?recordstart=".$i*$pagerecord."'>".($i+1)."</a></li>";
}
else{
	 echo "<li><a href='?recordstart=".$i*$pagerecord."'>".($i+1)."</a></li>";
	}}
?>	
</ul>