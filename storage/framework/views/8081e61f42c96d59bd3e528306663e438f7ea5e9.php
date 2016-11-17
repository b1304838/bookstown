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
		<?php /* jcarousel */ ?>
		<script type="text/javascript" src="<?php echo e(asset('public/jcarousel/dist/jquery.jcarousel.min.js')); ?>"></script>
		<script type="text/javascript" src="<?php echo e(asset('public/jcarousel.responsive.js')); ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/jcarousel.responsive.css')); ?>" />
		<link rel="stylesheet" type="<?php echo e(asset('public/jcarousel/examples/_shared/css/style.css')); ?>" />
		<?php /* //// */ ?>

		<script type="text/javascript" src="<?php echo e(asset('public/jRating2/jquery/jRating.jquery.js')); ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/jRating2/jquery/jRating.jquery.css')); ?>" />

		<?php /* animsition */ ?>
		<script type="text/javascript" src="<?php echo e(asset('public/animsition/dist/js/animsition.min.js')); ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/animsition/dist/css/animsition.min.css')); ?>"/>
		<?php /* jquery.particleground.js */ ?>
		<script type="text/javascript" src="<?php echo e(asset('public/js/jquery.particleground.js')); ?>"></script>

	</head>
	<body>
		
		<div class="animsition" style="height: 100%; width: 100%;">
			
		
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
		       					<!--<form class="navbar-form" action="<?php echo e(url('findbook')); ?>"  method="get">
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
      							</form> -->
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
		<div class="find">
			<br/>
			<?php /* <br/> */ ?>
			<br/>
			<div class="container">
				<form class="form-horizontal col-sm-4 col-sm-offset-4" action="<?php echo e(url('findbook')); ?>"  method="get">
       				<div class="col-xs-12 form-group">
       					<?php /* <label>Từ khóa</label> */ ?>
        				<input class="form-control" type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" />
        			</div>
 			        <div class="col-xs-12 form-group">
	        			<select class="form-control" name="cat">
							<option value="name">Tên sách</option>
  							<option value="author">Tác giả</option>
	       					<option value="publisher">Nhà xuất bản</option>
	       				</select>
   					</div>
					<div class="col-xs-12 form-group">
        				<button type="submit" class="btn btn-info btn-block"><span class="glyphicon glyphicon-search"></span></button>		
       				</div>
      			</form>
      		</div>
		</div>
		<div class="btn-find down">
			<span style="color: white;"><b>Tìm Kiếm</b></span>
			<img src="<?php echo e(asset('public/conan.png')); ?>" width="70px" />
			<?php /* <button id="find" class="down">Click me!!!</button> */ ?>
		</div>
		<script type="text/javascript">
			$('.find').css('height', '0px');
			$('.btn-find').css('bottom', '0px');

			$(document).ready(function(){
				var count = 1;

				
				$('.down').click(function(){
					if(count == 0){
						$('.find').animate({
							opacity: '0.5',
							height: '0px'
						}, "slow");
						$('.btn-find').animate({
							bottom: '0px',
							// width: '170px',
						}, "slow");
						count = 1;
					}else{
						$('.find').animate({
							opacity: '1',
							height: '235px',
							width: '100%'
						}, "slow");
						$('.btn-find').animate({
							bottom: '200px',
							// width: '20%',
						}, "slow");
						count = 0;
					}
				});
				// $('.btn-find').hover(function(){
				// 	$('.btn-find').animate({
				// 			left: '0px'
				// 			// width: '200px',
				// 		}, "slow");
				// });
			});
		</script>

		<script type="text/javascript">
			// $(document).ready(function(){
				$(".animsition").animsition({
					inClass: 'fade-in-up',
					outClass: 'fade-out-up',
					inDuration: 1500,
					outDuration: 800,
					// linkElement: '.animsition-link',
					linkElement: 'a:not([target="_blank"]):not([href^="#"])',

					loading: false,
					loadingParentElement: 'body',
					loadingClass: 'animsition-loading',
					loadingInner: '',
					timeout: false,
					timeoutCountdown: 5000,
					onLoadEvent: true,
					browser: ['animation-duration', '-webkit-animation-duration'],

					overlay: false,
					overlayClass: 'animation-overlay-slide',
					overlayParentElement: 'body',
					transition: function(url){
						window.location.href = url;
					}
				// });
			});
		</script>
		<?php echo $__env->yieldContent('script'); ?>



		</div>
	</body>
</html>