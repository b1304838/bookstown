<!DOCTYPE html>
	<html>
	<head>
		<title>
			<?php echo $__env->yieldContent('title'); ?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php /* icon */ ?>
		<link rel="icon" type="image/gif" href="<?php echo e(asset('public/icon.gif')); ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/bootstrap.min.css')); ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/jRating/css/star-rating-svg.css')); ?>"/>
		<script type="text/javascript" src="<?php echo e(asset('public/js/jquery.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('public/js/bootstrap.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('public/jRating/jquery.star-rating-svg.js')); ?>"></script>
		<?php /* <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/main.css')); ?>"/> */ ?>
		<?php echo $__env->yieldContent('css'); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo e(url('public/css/homestyle.css')); ?>"/>
		<script type="text/javascript" src="<?php echo e(asset('public/js/bootbox.min.js')); ?>"></script>
	</head>
	<body>
		<?php /* Làm mờ nền */ ?>
		<div class="blur"></div>
		<div id="cover">
			<?php /* Phần header */ ?>
			<div id="header">
				<img class="" src="<?php echo e(url('public/logo2.png')); ?>" height="90%" />
			</div>
			<nav class="navbar navbar-inverse">
			  	<div class="container-fluid">
			  	  	<div class="navbar-header">
			  	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				  	   	  	<span class="icon-bar"></span>
				  	   	  	<span class="icon-bar"></span>
				  	   		<span class="icon-bar"></span>
				  	   	</button>
					</div>
		  	  		<div class="collapse navbar-collapse" id="myNavbar">
		  	   			<ul class="nav navbar-nav">
		      				<li><a href="<?php echo e(url('/')); ?>"><span class="glyphicon glyphicon-home"></span><b>  Trang chủ</b></a></li>
		     				<li class="dropdown">
		          				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list"></span><b>  Thể loại</b><span class="caret"></span></a>
		          			<ul class="dropdown-menu">
			           			<?php foreach($catlist as $cat): ?>
			           				<li><a href="<?php echo e(url("cat/$cat->cat_id")); ?>"><?php echo e($cat->name); ?></a></li>
			           				<li role="separator" class="divider"></li>
								<?php endforeach; ?>
			      			</ul>
			       		</li>
		  	      <?php /* <li><a href="#">Page 2</a></li>
		  	      <li><a href="#">Page 3</a></li> */ ?>
		  	   			</ul>

		  	   			<div class="col-lg-3">	
		       					<form class="navbar-form" action="<?php echo e(url('findbook')); ?>"  method="get">
        							<div class="input-group">
        								<span class = "input-group-btn">
        									<div class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></div>
        								</span>
 								        <input type="text" name="keyword" class="form-control" <?php /* placeholder="Tìm kiếm" */ ?>/>
 								        <span class="input-group-btn">
	        								<select class="form-control" name="cat">
	        									<option value="name">Tên sách</option>
	        									<option value="author">Tác giả</option>
	        									<?php /* <option value="publisher">Nhà xuất bản</option> */ ?>
	        								</select>
        								</span>
        								<span class = "input-group-btn">
        									<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
        								</span>
        							</div>
      							</form>
      							</div>	
		       			<ul class="nav navbar-nav navbar-right">
		       				<?php if(!Auth::check()): ?>
								<li><a href="<?php echo e(url('register')); ?>"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
							<?php else: ?>
								<li><a href="<?php echo e(url("users/".Auth::user()->username)); ?>"><?php /* <img class="thumbnail" src="<?php echo e(asset('public/img/avatars')); ?>/<?php echo e(Auth::user()->avatar); ?>" height="20" /> */ ?><span class="glyphicon glyphicon-user"></span> <b><?php echo e(Auth::user()->username); ?></b></a></li>
								<?php if(Auth::user()->level == 1): ?>
									<li><a href="<?php echo e(url('dashboard')); ?>"><span class="glyphicon glyphicon-list"></span> Dashboard</a></li>
								<?php endif; ?>
							<?php endif; ?>
				        	<?php if(!Auth::check()): ?>
				        		<li><a href="<?php echo e(url('login')); ?>"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
				        	<?php else: ?>
				        		<li><a href="<?php echo e(url('logout')); ?>"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
				        	<?php endif; ?>
				        	<li><a href="<?php echo e(url('shoppingcart/cartdetail')); ?>"><span class="glyphicon glyphicon-shopping-cart"></span>  Giỏ hàng (<?php echo e(Cart::count()); ?>)</a></li>
				        	<li><a href="<?php echo e(url('contact')); ?>"><span class="glyphicon glyphicon-comment"></span>  Góp ý</a></li>
		       			</ul>
		   			</div>
				</div>
			</nav>
			<?php /* </div> */ ?>

			<?php /* Phần body */ ?>
			<div id="body">
				<?php echo $__env->yieldContent('body'); ?>
				
			</div>
			<?php /* Phần footer */ ?>
			<div id="footer">
				<div class="container">
					<div class="col col-xs-12 col-sm-4">
						<h3>About Me</h3>
						&copy; Copyright 2016, pmtien
					</div>
					<div class="col col-xs-12 col-sm-8">
						<h3>Contact</h3>
						Hotline: 0962446402
						<br/>
						Email: phantien295@gmail.com
					</div>
				</div>
			</div>
		</div>
		<?php echo $__env->yieldContent('script'); ?>
	</body>
</html>