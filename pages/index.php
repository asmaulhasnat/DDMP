<?php require "../checkj.php"?>
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
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">120</div>
							<div class="text-muted">New Orders</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">52</div>
							<div class="text-muted">Comments</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">24</div>
							<div class="text-muted">New Users</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">25.2k</div>
							<div class="text-muted">Page Views</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Site Traffic Overview</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>New Orders</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent">92%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Comments</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent">65%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>New Users</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent">56%</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Visitors</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent">27%</span>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
								
		<div class="row">
			<div class="col-md-5">
			
				<div class="panel panel-default chat">
					<div class="panel-heading" id="accordion"><svg class="glyph stroked two-messages"><use xlink:href="#stroked-two-messages"></use></svg> Chat</div>
					<div class="panel-body">
						<ul>
							<li class="left clearfix">
								<span class="chat-img pull-left">
									<img src="http://placehold.it/80/30a5ff/fff" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header">
										<strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc. Vivamus luctus convallis mauris, eu gravida tortor aliquam ultricies. 
									</p>
								</div>
							</li>
							<li class="right clearfix">
								<span class="chat-img pull-right">
									<img src="http://placehold.it/80/dde0e6/5f6468" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header">
										<strong class="pull-left primary-font">Jane Doe</strong> <small class="text-muted">6 mins ago</small>
									</div>
									<p>
										Mauris dignissim porta enim, sed commodo sem blandit non. Ut scelerisque sapien eu mauris faucibus ultrices. Nulla ac odio nisl. Proin est metus, interdum scelerisque quam eu, eleifend pretium nunc. Suspendisse finibus auctor lectus, eu interdum sapien.
									</p>
								</div>
							</li>
							<li class="left clearfix">
								<span class="chat-img pull-left">
									<img src="http://placehold.it/80/30a5ff/fff" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header">
										<strong class="primary-font">John Doe</strong> <small class="text-muted">32 mins ago</small>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante turpis, rutrum ut ullamcorper sed, dapibus ac nunc. Vivamus luctus convallis mauris, eu gravida tortor aliquam ultricies. 
									</p>
								</div>
							</li>
						</ul>
					</div>
					
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" type="text" class="form-control input-md" placeholder="Type your message here..." />
							<span class="input-group-btn">
								<button class="btn btn-success btn-md" id="btn-chat">Send</button>
							</span>
						</div>
					</div>
				</div>
				
			</div><!--/.col-->
<!--todo start-->
			
			<div class="col-md-7">
			<script>
var model = {
user: "BIkhatto"
};
//define module
var todoApp = angular.module("todoApp", []);
//
todoApp.run(function ($http) {
	
});

//filter
todoApp.filter("checkedItems", function () {
return function (items, showComplete) {
var resultArr = [];
angular.forEach(items, function (item) {
if (item.done == false || showComplete == true) {
resultArr.push(item);
}
});
return resultArr;
}
});


//define controller
//ToDoCtrl's addNewItem method will use $http service. so this controller is dependant on $http.
todoApp.controller("ToDoCtrl", function ($scope,$http) {

$scope.getitems = function(){
	$http.get("../data/get_todo.php").
	then(function (data) {
		console.log(data);
		model.items = data.data;
		});
	}
$scope.getitems();	
$scope.todo = model;
$scope.myWelcome = "todo form";
//console.log($scope.todo);
$scope.incompleteCount = function () {
var count = 0;
angular.forEach($scope.todo.items, function (item) {
if (!item.done) { count++ ;}
});
//alert(count);
return count;
}
$scope.warningLevel = function () {
return $scope.incompleteCount() < 3 ? "label-success" : "label-warning";
}

$scope.deletetodo = function(id){
		$http.post('../data/delete_Todo.php', {id:id}).then(function(res){
		if(res.data == "Deleted"){
			$scope.getitems();
			}
		else alert(res.data);	
		}, function(res){
		alert(res.data);	
			});
	}
$scope.changee = function(t,done){
	//alert(done);
	$http.post('../data/doneTodo.php', {id:t, doneval:done}).then(function(res){
		if(res.data == "Updated"){
			$scope.getitems();
			}
		else alert(res.data);	
		}, function(res){
		alert(res.data);	
			});
	}
$scope.addNewItem = function (actionText) {
	//alert(actionText);
//
//angular js send form data in JSON format. So in server we have to write:
// $_POST = json_decode(file_get_contents('php://input'),true);
$http({
        method : "POST",
        url : "../data/set_todo.php",
		headers: {'Content-Type':'application/x-www-form-urlencoded'},
		data: {act:actionText}
    }).then(function mySucces(response) {
		//alert(response.data);
        $scope.myWelcome = response.data;
		$scope.actionText = '';
		$scope.getitems();
    }, function myError(response) {
		alert(response.data);
        $scope.myWelcome = response.statusText;
    });
	
//$scope.todo.items.push({ action: actionText, done: false });

}
});

</script>

<div ng-controller="ToDoCtrl">
<h1>{{myWelcome}}</h1>
<div class="page-header">
<h1>{{todo.user}}'s To Do List
<span class="" ng-class="warningLevel()" ng-hide="incompleteCount() == 0">
{{incompleteCount()}}
</span>
</h1>

</div>

<div class="panel">
<div class="input-group">
<input type="hidden" ng-model="hiddenvalue">
<input class="form-control" ng-model="actionText" />
<span class="input-group-btn">
<button class="btn btn-default" ng-click="addNewItem(actionText)">Add</button>
<button class="btn btn-default" ng-click="updateTodo(actionText,hiddenvalue)">Update</button>
</span>
</div>
<table class="table table-striped">
<thead>
<tr>
<th>Description</th>
<th>Done</th>
<th>Done</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr ng-repeat="item in todo.items | orderBy:'action' | checkedItems:showComplete">
<td>{{item.action}}</td>
<td><input type="checkbox" ng-change="changee(item.id, item.done)" ng-model="item.done" /> </td>
<td>{{item.done}}</td>
<td>
<button class="btn btn-danger" ng-click="deletetodo(item.id)">Delete</button>
<button class="btn btn-danger" ng-click="edittodo(item.id)">Edit</button>
</td>
</tr>
</tbody>
</table>
<div class="checkbox-inline">
<label><input type="checkbox" ng_model="showComplete"> Show Complete</label>
</div>
</div>
</div>

								
			</div>
            <!--todo end-->
            <!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->

<?php require "template/scripts.php"; ?>
	<script>
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
