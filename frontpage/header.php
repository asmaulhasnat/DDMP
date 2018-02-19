<!--<link href="header.css" rel="stylesheet"/>-->
<head>
<style>

.logo{
	color:white;
}

.menu{
	font-size:18px;
	text-transform:uppercase;
	color:white !important;
	margin-top:5px;
}
.menu li{
	padding:5px ;
}
.navbar-inverse .navbar-nav li a{
	color:yellow !important;}
.menu li a:hover{
	background-color:white;
	border-bottom:2px solid yellow;
	color:black;
}
.serch{
	margin-top:15px;
}


</style>
</head>
<div class="navbar navbar-inverse">
	<div class="container">
		<div class="row">
        	<div class="col-xs-5 ">
            	<div class="navbar-header">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=    			                    ".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<h1 class="logo">bikhatto_sob.com</h1>
				</div>	
            </div>
          <div class="col-xs-4 menu">
			<div class="navbar-collapse collapse" aria-expanded="false" style="height:1px;">
				<ul class="nav navbar-nav">
                	 <li><a href="#">dress</a></li>
                     <li><a href="#">sweet</a></li>
                     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Other<span class="caret"></span></a>
                     	<ul class="dropdown-menu">
                      		<li><a href="#">Emon</a></li>
                        	<li><a href="#">Sweet</a></li>
                        	<li><a href="#">Musabber</a></li>
                     	</ul>
                     </li>  
               </ul>
            </div>
          </div>
                 <div class="col-xs-3 pull-right serch">
                    	<form role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search">
							</div>
						</form>
                        <!--<span class="glyphicon glyphicon-search"></span>-->
                 </div>
            	<!--</div>
    		</div>-->
         </div>
	</div>
</div>