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
<h1>Catagory management</h1>
</div>

<div class="col-sm-3" style="margin-top:15px;">
<button type="button" id="addcatagory" class="btn btn-lg btn-primary"/>Add product catagory</button>
</div>
<div class="col-sm-4" style="margin-top:15px;">
<form role="search">
<input type="text" class="pull-right form-control" id="serch" placeholder="search" style="width:300px; margin-right:10px; border:1px solid #CCC;">
</form>
</div>
</div>
<form method="post" id="form"action="" >


<input type="hidden" id="catagoryid">
<input type="text" id="catagoryname" placeholder="add catagory name" class="form-control" style="border:1px solid #CCC;"/></br>


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
	$("#addcatagory").click(function(){
		$("#form").show(800);
		$("#update").hide();
		$("#add").show();
		
		})
		
		$("#close").click(function(){
		$("#form").hide(800);
		
		
		})
		
  

//add catagory start	  
	  
$("#add").click(function(){
	
	
	
	var catagoryname= $("#catagoryname").val();
	
	
	if(catagoryname==''){
		alert("fill catagory")
		return; 
		}
	
	$.post("../classes/catagorycrud.php",{
		action:"incatagory",
		catname:catagoryname
		},function(data){
			
			$("#catagoryname").val("");
			showtable(0)
			alert(data)
		})
		
	
	})
	////add catagory end	  

	
	// start show table
	
	
	function showtable(pag){
		
		$.post("../classes/catagorycrud.php",{action:"show",
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
				$.post("../classes/catagorycrud.php",
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
				

//edit catagory start
			$("#showall").on("click","a.editbnt",function(){
				$("#form").show(600);
				$("#update").show()
				$("#add").hide();
				var recordedit=($(this).attr('data-edit'));
				//alert(recorddel)
			var editcatagory=$(this).parent().parent().find("td.catnam").html();
			
			//alert(editcatagory);
			$("#catagoryid").val(recordedit);
			$("#catagoryname").val(editcatagory);
			
			
			
				})
	
	 
//edit catagory end	

			

//update catagory start
	$("#update").click(function(){
		var upcatagoryname=$("#catagoryname").val();
		var upcatagoryid=$("#catagoryid").val();
		
		
		$.post("../classes/catagorycrud.php",{
			action:"upcatagory",
			upcatnam:upcatagoryname,
			upcatid:upcatagoryid
			
			
			},function(up){
				alert(up)
				showtable(0);})
				
				
			$("#catagoryid").val("");
			$("#catagoryname").val("");
			
				
				$("#form").hide();
		})
	 
//update catagory end
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
						
						$.post("../classes/catagorycrud.php",{
							
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
