<button type="button" id="addlocation" class="btn btn-lg btn-primary"/>Add Division</button>
<form method="post" id="form"action="" >
<input type="hidden" id="lid" placeholder="division id">
<input type="text" style="width:250px;" id="divname" placeholder="add division name"/></br>
<input type="button" class="btn btn-success" id="add" value="add"/>
<input type="reset" class="btn btn-warning" id="clear" value="clear"/>
<input type="button" class="btn btn-primary" id="update" value="update"/>
<input type="button" class="btn btn-danger" id="close" value="close"/>

</form>
<div id="fromresult">
</div>
<div id="showall">
</div>


<script>
$(document).ready(function(){
	$("#form").hide();
	
	
	$("#addlocation").click(function(){
		$("#update").hide();
		$("#form").show(800);
		
		})
		$("#add").click(function(){
			
			var divname=$("#divname").val();
			if(divname ==""){
				alert ("fill up the  division value");
				return;	
			}
			$.post("../classes/divcrud.php",{
				dinam:divname,
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