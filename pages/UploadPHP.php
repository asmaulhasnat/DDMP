
<!DOCTYPE html>
<html>
<head>
<title>Upload Multiple Images Using jquery and PHP</title>
<!-------Including jQuery from Google ------>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="script.js"></script>
<!------- Including CSS File ------>
<?php
include "upload.php";
?>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<div id="maindiv">
<div id="formdiv">
<h2>Multiple Image Upload Form</h2>
<form enctype="multipart/form-data" action="" method="post">
First Field is Compulsory. Only JPEG,PNG,JPG 
<div id="filediv"><input name="file[]" type="file" id="file"/></div>
<input type="button" id="add_more" class="upload" value="Add More Files"/>
<input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
</form>


</div>
</div>
</body>
</html>