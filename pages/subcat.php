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
<h1>subcatagory management</h1>
</div>

<div class="col-sm-3" style="margin-top:15px;">
<button type="button" id="addsubcatagory" class="btn btn-lg btn-primary"/>Add subcatagory</button>
</div>
<div class="col-sm-4" style="margin-top:15px;">
<form role="search">
<input type="text" class="pull-right form-control" id="serch" placeholder="search" style="width:300px; margin-right:10px; border:1px solid #CCC;">
</form>
</div>
</div>
<form method="post" id="form"action="" >

<select id="catagory_select" class="form-control" style="border:1px solid #CCC; margin-top:5px;">
<option value="-1">select catagory</option>
<?php
echo catagorylist();
?>
</select></br>

<input type="hidden" id="subcatid">
<input type="text" id="subcatname" placeholder="add subcatagory name" class="form-control" style="border:1px solid #CCC;"/></br>


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
	$("#addsubcatagory").click(function(){
		$("#form").show(800);
		$("#update").hide();
		$("#add").show();
		
		})
		
		$("#close").click(function(){
		$("#form").hide(800);
		
		
		})
		
	 

//add subcatagory	  
	  
$("#add").click(function(){
	
	var catid= $("#catagory_select").val();
	var subcatname= $("#subcatname").val();
	
	if(catid=='-1'||subcatname==''){
		alert("required all field")
		return; 
		}
	
	$.post("../classes/subcatcrud.php",{
		action:"inscat",
		cati:catid,
		subcatna:subcatname
		
		},function(data){
			
			$("#subcatname").val("");
				$("#catagory_select").val("-1");
				
			showtable(0)
			alert(data)
		})
		
	
	})
	//add subcatagoryend	  

	
	// start show table
	
	
	function showtable(pag){
		
		$.post("../classes/subcatcrud.php",{action:"show",
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
				$.post("../classes/subcatcrud.php",
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
				

//edit subcatagory start
			$("#showall").on("click","a.editbnt",function(){
				$("#form").show(600);
				$("#update").show()
				$("#add").hide();
				var recordedit=($(this).attr('data-edit'));
				//alert(recorddel)
			var editsubcatname=$(this).parent().parent().find("td.subcme").html();
			
			var editcatid=$(this).parent().parent().find("td.catid").html();
			
			$("#subcatid").val(recordedit);
			$("#subcatname").val(editsubcatname);
			
			$("#catagory_select").val(editcatid);
			
				
				})
	
	 
//edit subcatagory end	

			

//update area start
	$("#update").click(function(){
		var subcatna=$("#subcatname").val();
		var subcatnaid=$("#subcatid").val();
		var catagoid=$("#catagory_select").val();
		
		
		$.post("../classes/subcatcrud.php",{
			action:"upsubcat",
			upsucatnam:subcatna,
			upsucatid:subcatnaid,
			upcatid:catagoid,
			
			
			
			},function(up){
				alert(up)
				showtable(0);})
				$("#subcatname").val("");
				$("#subcatid").val("");
				$("#catagory_select").val("-1");
				
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
						
						$.post("../classes/subcatcrud.php",{
							
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
	
		/*$('#calendar').datepicker({
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
		})*/
	</script>	
</body>

</html>
