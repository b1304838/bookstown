<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $__env->yieldContent('title'); ?></title>
	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php /* icon */ ?>
		<link rel="icon" type="image/gif" href="<?php echo e(asset('public/icon.gif')); ?>"/>

		<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>"/>
		<script type="text/javascript" src="<?php echo e(asset('public/js/jquery.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>"></script>

		<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/admin.css')); ?>"/>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
		    	<div class="navbar-header">
					<button type ="button" class ="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
         				<span class = "sr-only">Toggle navigation</span>
         				<span class = "icon-bar"></span>
         				<span class = "icon-bar"></span>
         				<span class = "icon-bar"></span>
      				</button>
					<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span><b>Trang chủ</b></a>
				</div>
		    	<div class="container-fluid">
					<div class="collapse navbar-collapse" id="app-navbar-collapse">
						<ul class="nav navbar-nav">
	      					<li class="cellnavbar"><a href="#">Page 1</a></li>
	      					<li class="cellnavbar"><a href="#">Page 2</a></li>
	      					<li class="cellnavbar"><a href="#">Page 3</a></li>
	    				</ul>
	    			</div>
				</div>
		  	</div>
		</nav>
		<?php /* Menu trái */ ?>
		
			<div class="leftmenu">
				<ul>
					<li id="dashboard">Dashboard</li>
					<?php /* Quản lý sách */ ?>
					<li>
						<div class="menu" data-toggle="collapse" data-target="#menu1"><span class="glyphicon glyphicon-book"></span>Quản lý sách</div>
					</li>
					<div id="menu1" class="collapse">
						<li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span>Hhah</a></li>
						<li><a href="#">Hhah</a></li>
  					</div>
					<?php /* Quản lý thể loại */ ?>
					<li>
						<div class="menu" data-toggle="collapse" data-target="#menu2"><span class="glyphicon glyphicon-list"></span>Quản lý thể loại</div>
					</li>
					<div id="menu2" class="collapse">
						<li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span>Hhah</a></li>
						<li><a href="#">Hhah</a></li>
  					</div>
					<?php /* Quản lý người dùng */ ?>
					<li>
						<div class="menu" data-toggle="collapse" data-target="#menu3"><span class="glyphicon glyphicon-user"></span>Quản lý người dùng</div>
					</li>
					<div id="menu3" class="collapse">
						<li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span>Hhah</a></li>
						<li><a href="#">Hhah</a></li>
  					</div>
					<li></li>
				</ul>
			</div>
		
		<?php /* Phần nội dung */ ?>
		<div id="content">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php echo $__env->yieldContent('content'); ?>
				</div>
			</div>
		</div>
		
	</body>
</html>