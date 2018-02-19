	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script>
	$(document).ready(function(){
		var path = location.pathname;
		var ind = path.lastIndexOf("/");
		var filename = path.substring(ind+1);
		//alert(filename);
		$('ul.nav li ul.dropdown-menu li a[href^="' + filename + '"]').parent().parent().parent().addClass('active');
		
		$('ul.nav  a[href^="' + filename + '"]').parent().addClass('active');
		
	});
	</script>