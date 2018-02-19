<!DOCTYPE html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet"/>
<link href="header.css" rel="stylesheet"/>
<link href="main.css" rel="stylesheet"/>

</head>
<body>
	<div class="header" >
		<?php require "header.php"; ?>
	</div>
<div class="section_first">
    <div class="container first">
       <div class="row">
       		<div class="col-xs-2">
           		<?php require "sidebar.php";?> 
		   	</div>
             <div class="col-xs-8"><?php require "maincontent.php";?>
             </div>
             <div class="col-xs-2">
             	 <?php require "rightsidebar.php"; ?>
             </div> 
       </div>
   </div>
</div>
<div class="section_second ">
   <div class="container">
      <div class="row">
        <div class="col-xs-12">
           <h1>hi anwar vai how r you?
               hi anwar vai how r you?
               hi anwar vai how r you?
               hi anwar vai how r you?
               hi anwar vai how r you?</h1>
               <h1>hi anwar vai how r you?
               hi anwar vai how r you?
               hi anwar vai how r you?
               hi anwar vai how r you?
               hi anwar vai how r you?</h1>
              <h1>hi anwar vai how r you?
               hi anwar vai how r you?
               hi anwar vai how r you?
               hi anwar vai how r you?
               i anwar vai how r you?
              </h1>
           </div>
       </div>
   </div>
</div>
    
    <div class="section_third">
    
    <p>
Q1.  Create a table named user: username(varchar(20)), password(varchar(30)).  
•	Add two or more data into the table.		   
•	Create a login form to take username and password and write php script to check the valid user. 

Q2.  Create two tables:
        Manufacturer (id (auto increment), name (varchar(50)), address (varchar(100)), contact_no (varchar(50)).
        Product (id (auto increment), name (varchar(50)), price (INT(5)), manufacturer_id (INT(10)).

        Add two or more data into the tables.
        Create an after delete trigger which will delete record(s) from the product table when any corresponding 
        manufacturer_id are deleted from the manufacturer table.  

        Create a form to select manufacturer id and write php 
</p>
    </div>
    
    <div class="footer">
    	<div class="container">
        	<div class="row">
            	<?php require "footer.php"; ?>
        	</div>
    	</div>
    </div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>