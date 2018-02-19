<?php 
require "../checkj.php";
require "../include/commonfunction.php";
$upass= $_SESSION['admin_pass'];
?>
<!DOCTYPE html>
<?php require "template/header.php"; ?>

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
<div class="col-sm-12" style="margin-left:5px;">
<div class="row">
<div class="col-sm-6">
<h1>Product Management</h1>
</div>
<div class="col-sm-3" style="margin-top:15px;">
<button type="button" id="addlocation" class="btn btn-lg btn-primary"/>Add Product</button>
</div>
</div>
<form method="post" id="form"action=""  enctype="multipart/form-data">
<select id="division">
<option value="-1">Select Division</option>
<?php echo divisionlist();?>
</select>

<select id="district">
<option value="-1">Select District</option>
</select>

<select id="areaselect">
<option value="-1">Select Area</option>
</select><br>

<select id="productcatagory">
<option value="-1">Select catagory</option>
</select><br>
<select id="subcatagory">
<option value="-1">Select sub catagory</option>
</select><br>
<input type="hidden" id="pid">
<input type="text" id="productname" placeholder="write product name"> 
<div id="filediv"><input name="file[]" type="file" id="file"/></div>
<input type="button" id="add_more" class="upload" value="Add More Files"/>






<input type="submit" class="btn btn-success" id="add" value="add"/>
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
$(document).ready(function(){
	
	//file upload start
	var abc = 0;      // Declaring and defining global increment variable.

//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
$('#add_more').click(function() {
$(this).before($("<div/>", {
id: 'filediv'
}).fadeIn('slow').append($("<input/>", {
name: 'file[]',
type: 'file',
id: 'file'
}), $("<br/><br/>")));
});
// Following function will executes on change event of file input to select different file.
$('body').on('change', '#file', function() {
if (this.files && this.files[0]) {
abc += 1; // Incrementing global variable by 1.
var z = abc - 1;
var x = $(this).parent().find('#previewimg' + z).remove();
$(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
$("#abcd" + abc).append($("<img/>", {
id: 'img',
src: 'x.png',
alt: 'delete'
}).click(function() {
$(this).parent().parent().remove();
}));
}
});
// To Preview Image
function imageIsLoaded(e) {
$('#previewimg' + abc).attr('src', e.target.result);
};
$('#upload').click(function(e) {
var name = $(":file").val();
if (!name) {
alert("First Image Must Be Selected");
e.preventDefault();
}
});


	//file upload end
	
	$("#form").hide();
	
	
	$("#addlocation").click(function(){
		$("#update").hide();
		$("#form").show(800);
		
		})
		$("#add").click(function(){
			event.preventDefault() 
			
			var file=$("#file").val();
			//if(divname ==""){
				//alert ("fill up the  division value");
				//return;	
			//}
			$.post("../classes/upload.php",{
				file:file,
				action:"divadd",
				},function(data){
					alert(data);
					clearform();
				showtable();	
				}) 
			
			})
			function showtable(){
			$.post("../classes/divcrud.php",{
				action:"showdata"
				},
				function(data){
					$("#showall").html(data);
					
				})
			} showtable();
			//delete devision
			
			$("#showall").on("click","a.delbtn",function(){
				var ddd=confirm("are you sure,you want to delete?")
				if(!ddd){
					return;
					}
				
				var recorddel=($(this).attr('data-del'));
				
				$.post("../classes/divcrud.php",
				{action:'del',
				rdel:recorddel},
				function(data){
					//$("#fromresult").html(data);
					alert (data)
					showtable();
					})
					
					
				
				
				});
			
			
			
			
			
			
			
			
			//end delete
			//  startclear function
	function clearform(){
						$("#divname").val("");
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
			$("#form").show(100);
			var edit=$(this).attr("data-edit")
			var divname=$(this).parent().parent().find("td.dn").html();
			$("#lid").val(edit);
			$("#divname").val(divname);
			
					//var editdivname = $(this).parent().parent().find("td.clsdn").html();
			})
		
		
		
		
		 
		//edit close
		
		//update division start
		$("#update").click(function(){
			$("#form").show(100);
		   var upd=$("#divname").val();
		   var upid=$("#lid").val();
		   
		   $.post("../classes/divcrud.php",{
			   action:"update",
			   up:upd,
			   uid:upid},function(data){
				   alert(data);
				   showtable();
				   clearform();
			   })
			
			})
		
		
		// update division end
				
	})

</script>	
</body>

</html>
