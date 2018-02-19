<?php 
require "../checkj.php";
require "../include/commonfunction.php";
$upass= $_SESSION['admin_pass'];
?>
<!DOCTYPE html>
<?php require "template/header.php"; ?>
<style>
input[placeholder="serch"]{
	color:red;}
</style>

</head>

<body>
<?php require "template/navbar.php"; ?>
<?php require "template/sidebar.php"; ?>	

		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
<div class="row">
<div class="col-sm-12">
<div class="row">
<div class="col-sm-5" >
<h1>Area divisionwise</h1>
</div>

<div class="col-sm-3" style="margin-top:15px;">
<button type="button" id="addlocation" class="btn btn-lg btn-primary"/>Add Area</button>
</div>
<div class="col-sm-4" style="margin-top:15px;">
<form role="search">
<input type="text" class="pull-right form-control" id="serch" placeholder="search" style="width:300px; margin-right:10px; border:1px solid #CCC;">
</form>
</div>
</div>
<form method="post" id="form"action="" >

<select id="division_select" class="form-control" style="border:1px solid #CCC; margin-top:5px;">
<option value="-1">select division</option>
<?php
echo divisionlist();
?>
</select></br>
<select id="district_select"class="form-control" style="border:1px solid #CCC;">
<option value='-1'> select district</option>

</select></br>
<input type="hidden" id="areaid">
<input type="text" id="areaname" placeholder="add area name" class="form-control" style="border:1px solid #CCC;"/></br>
<input type="text" id="areades" placeholder="add area description" class="form-control" style="border:1px solid #CCC;"/></br>

<input type="button" class="btn btn-success" id="add" value="add"/>
<input type="reset" class="btn btn-warning" id="clear" value="clear"/>
<input type="button" class="btn btn-primary" id="update" value="update"/>
<input type="button" class="btn btn-danger" id="close" value="close"/>

</form>
<div id="fromresult"></div>
<div id="showall"></div>
</div>
</div>
	</div>	<!--/.main-->
	</div><!--/.main row-->
<?php require "template/scripts.php"; ?>
	<script>
	$(document).ready(function(e) {
	$("#form").hide();
	$("#addlocation").click(function(){
		$("#form").show(800);
		$("#update").hide();
		$("#add").show();
		
		})
		
		$("#close").click(function(){
		$("#form").hide(800);
		
		
		})
		
 //area change start
  $("#division_select").change(function(e) {
        var divitiond = $(this).val();
		districtpass(divitiond,false);		
    });
	
	function districtpass(divid,dist){
		$.post("../classes/areacruddiwise.php",{
			action:"changedist",
			did:divid
			},function(data){
			$("#district_select").html(data);
			if(dist){
				$("#district_select").val(dist)
				}
			
			});
		}


//area change end	 

//add area	  
	  
$("#add").click(function(){
	
	var divid= $("#division_select").val();
	var disttrictid= $("#district_select").val();
	var area= $("#areaname").val();
	var areades= $("#areades").val();
	
	if(divid=='-1'|| disttrictid=='-1'|| area==''||areades==''){
		alert("required all field")
		return; 
		}
	
	$.post("../classes/areacruddiwise.php",{
		action:"inarea",
		dii:divid,
		disii:disttrictid,
		aren:area,
		aredes:areades
		},function(data){
			
			$("#areaname").val("");
			$("#areades").val("");
				$("#division_select").val("-1");
				$("#district_select").val("-1");
			showtable(0)
			alert(data)
		})
		
	
	})
	//add area	  

	
	// start show table
	
	
	function showtable(pag){
		
		$.post("../classes/areacruddiwise.php",{action:"show",
		recordstart:pag},function(d){
			$("#showall").html(d);
			
			})
		}
		showtable(0)
	
	
	//end show table
	
	// delete start
	
	$("#showall").on("click","a.deltbnt",function(){
				var ddd=confirm("are you sure,you want to delete?")
				if(!ddd){
					return;
					}
					else{
					var check=prompt("enter your password")
					
					var upass='<?php echo$upass;?>'
					
					//alert(upass);
					}
				
				var recorddel=($(this).attr('data-delt'));
				$.post("../classes/areacruddiwise.php",
				{action:"delete",
				check:check,
				upass:upass,
				rdel:recorddel},
				function(data){
					$("#fromresult").html(data);
					showtable(0);
					})
				})
//delete end
				

//edit area start
			$("#showall").on("click","a.editbnt",function(){
				$("#form").show(600);
				$("#update").show()
				$("#add").hide();
				var recordedit=($(this).attr('data-edit'));
				//alert(recorddel)
			var editareaname=$(this).parent().parent().find("td.aname").html();
			var editaredes=$(this).parent().parent().find("td.arede").html();
			//alert(editareaname)
			var editdivid=$(this).parent().parent().find("td.divid").html();
			var editdistid=$(this).parent().parent().find("td.distid").html();
			$("#areaid").val(recordedit);
			$("#areaname").val(editareaname);
			$("#areades").val(editaredes);
			$("#division_select").val(editdivid);
			$("#district_select").val(editdistid);
				districtpass(editdivid,editdistid);
				})
	
	 
//edit area end	

			

//update area start
	$("#update").click(function(){
		var areaupname=$("#areaname").val();
		var areaupid=$("#areaid").val();
		var areadescrip=$("#areades").val();
		var areadivup=$("#division_select").val();
		var areadistup=$("#district_select").val();
		
		$.post("../classes/areacruddiwise.php",{
			action:"uparea",
			uparenam:areaupname,
			uparedes:areadescrip,
			upareaid:areaupid,
			upareadiv:areadivup,
			uparedistid:areadistup
			
			
			},function(up){
				alert(up)})
				$("#areaname").val("");
				$("#areades").val("");
				$("#areaid").val("");
				$("#division_select").val("-1");
				$("#district_select").val("-1");
				showtable(0);
				$("#form").hide();
		})
	 
//update area end
$("#serch").keyup(function(){
			
			var usearch=$(this).val();
			//alert(usearch);
			searchbox(usearch,0)
			})
			function searchbox(us,ind){
				if (us==""){
					showtable(ind)
					
					}
					else{
						userarch=us;
						pagin=ind;
						
						$.post("../classes/areacruddiwise.php",{
							
							uss:userarch,
							recordstart:pagin,
							action:"show"
							},function(d){
							$("#showall").html(d)
							
							})
						}
				
				}
		

//pagination start
$("#showall").on("click","ul.pagination a.pagi",function(){
	var pa=$(this).attr('data-rec')
	searchbox($("#serch").val(),pa)
	
	})

//pagination end
		    
});
	
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
