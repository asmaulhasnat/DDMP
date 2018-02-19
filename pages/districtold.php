
<?php require "../include/commonfunction.php"; ?>
<head>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

<title>division</title>
<style>
label{
	
	
	font-size:18px;
}

	 </style>
</head>

<body>
<div class="container">
<div class="row">
<div class="col-xm-12">
<button type="button" id="addlocation" class="btn btn-lg btn-primary"/>Add District</button>
<input type="search" class="pull-right" id="serch" placeholder="search">
<form method="post" id="form"action="" >

<select id="division_select" class="form-control">
<option value="-1">select division</option>
<?php
echo divisionlist();
?>
</select>

<input type="hidden" id="disid" placeholder="District id">
<input type="text" class="form-control" id="distname" placeholder="add district name"/></br>
<input type="button" class="btn btn-success" id="add" value="add"/>
<input type="reset" class="btn btn-warning" id="clear" value="clear"/>
<input type="button" class="btn btn-primary" id="update" value="update"/>
<input type="button" class="btn btn-danger" id="close" value="close"/>

</form>
<div id="fromresult"></div>
<div id="showall"></div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
	
	
	$("#form").hide();
	
	
	$("#addlocation").click(function(){
		
		
		$("#update").hide();
		$("#form").show(800);
		
		})
		$("#add").click(function(){
			
			var distname=$("#distname").val();
			var divid=$("#division_select").val();
			if(distname =="" || divid =="-1"){
				alert ("select division and fill district name");
				return;	
			}
			$.post("../classes/distcrud.php",{
				distnam:distname,
				divid:divid,
				action:"distadd",
				},function(data){
					alert(data);
					clearform();
				showtable(0);
				$("#division_select").val("-1");	
				}) 
			
			})
			function showtable(s){
			$.post("../classes/distcrud.php",{
				//action:"showdata",
				recordstart:s,
				
				},
				function(data){
					$("#showall").html(data);
					
				})
			} showtable(0);


//delete dist
			
			$("#showall").on("click","a.delbtn",function(){
				var ddd=confirm("are you sure,you want to delete?")
				if(!ddd){
					return;
					}
				
				var recorddel=($(this).attr('data-del'));
				$.post("../classes/Distcrud.php",
				{action:"delete",
				rdel:recorddel},
				function(data){
					$("#showall").html(data);
					
					showtable(0);
					})
					
					
				
				
				});
			
			
			
			
			
			
			
			//end delete
			//  startclear function
	function clearform(){
						$("#distname").val("");
						}
				//end clear function
				
				//closebutton start
				
				$("#close").click(function(){
					$("#form").hide(400);
					clearform()
					});
				
				
				
				
				//closebutton end
				
		//edit start
		
		$("#showall").on("click","a.editbtn",function(){
			$("#add").hide();
			$("#update").show();
			$("#form").show(100);
			var disrtid=$(this).attr('data-edit');
			var distname=$(this).parent().parent().find("td.dn").html();
			var divid=$(this).parent().parent().find("td.kk").html();
			//alert(divid);
			$("#division_select").val(divid);
			$("#distname").val(distname);
			$("#disid").val(disrtid);
			
					//var editdivname = $(this).parent().parent().find("td.clsdn").html();
			})
		
		
		
		
		 
		//edit close
		
		//update division start
		$("#update").click(function(){
			$("#form").show(100);
				var divisionid = $("#division_select").val();
				var distname = $("#distname").val();
				var distid = $("#disid").val();
		   
		   $.post("../classes/Distcrud.php",{
			   action:"update",
			   updivid:divisionid,
			   updistname:distname,
			   updistid:distid},function(data){
				  //alert(data);
				   showtable(ind);
				   clearform();
			   })
			
			})
		
		
		// update division end
		//pagination start
		$("#showall").on("click","ul.pagination a.page",function(){
			var record=$(this).attr('data-pagi');
			//alert(record);
			serchtable($("#serch").val(),record)
				//showtable(recordstart)

				});
			
			
		
		
		
		
		//pagination end
		
		//SERCH START
		
		
		
		$("#serch").keyup(function(){
			var userserch=$(this).val();
			serchtable(userserch,0)
			});
		function serchtable(us,ind){
			
			
			if(us==""){
				
				showtable(ind);
				}
			else{
				$.post("../classes/Distcrud.php",{
					serch:us,
					recordstart:ind
					
					},function(data){
						//alert(data);
					$("#showall").html(data);
					
					});
				}
			
			}
		
		
		
		//SERCH END
				
	})

</script>

</body>
</html>