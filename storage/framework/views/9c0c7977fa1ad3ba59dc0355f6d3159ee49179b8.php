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
		
		<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/main.css')); ?>"/>

		<?php echo $__env->yieldContent('css'); ?>
	</head>
	<body class="body1">
	<div class="body">
	<div class="aaa"></div>
			
		<!-- Trigger the modal with a button -->
<?php /* <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> */ ?>

<!-- Modal -->
<?php /* <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
        <ul>
        	<li><a href="#">Google.com</a></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div> */ ?>

		

		
		<div class="header">
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
		  	      <li><a href="<?php echo e(url('/')); ?>"><span class="glyphicon glyphicon-home"></span><b>Trang chủ</b></a></li>
		  	      <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Thể loại <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Another action</a></li>
			            <li><a href="#">Something else here</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">One more separated link</a></li>
			          </ul>
			        </li>
		  	     <?php /*  <li><a href="#">Page 2</a></li>
		  	      <li><a href="#">Page 3</a></li> */ ?>
		  	    </ul>
		    	
		    	 
		        

		        <ul class="nav navbar-nav navbar-right">
		        <li>
		        	<form class="navbar-form">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Tìm kiếm">
        
        <div class = "input-group-btn">
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button></div>
        </div>
      </form>


		        </li>
		   <?php /*      <li>
		        			<form class="navbar-form">
			
			<div class="input-group">
               <input type = "text" class = "form-control">
               
               <span class = "input-group-btn">
                  <button class = "btn btn-success" type = "button">
                	<span class="glyphicon glyphicon-search"></span>
                  </button>
               </span>
               
            
</div>
            </form></li> */ ?>
            		<?php if(!Auth::check()): ?>
						<li><a href="<?php echo e(url('register')); ?>"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
					<?php else: ?>
						<li><a>Xin chào, <?php echo e(Auth::user()->username); ?></a></li>
					<?php endif; ?>


		        	<?php if(!Auth::check()): ?>
		        		<li><a href="<?php echo e(url('login')); ?>"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
		        	<?php else: ?>
		        		<li><a href="<?php echo e(url('logout')); ?>"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
		        	<?php endif; ?>
		        	
		      	</ul>
		    	</div>
		  </div>
		</nav>
		<?php /* <div class="container menu">
			<div class="col col-xs-12 col-sm-offset-4 col-sm-4">
			<form>
			
			<div class = "input-group">
               <input type = "text" class = "form-control">
               
               <span class = "input-group-btn">
                  <button class = "btn btn-default" type = "button">
                	<span class="glyphicon glyphicon-search"></span>Tìm kiếm
                  </button>
               </span>
               
            </div>

            </form>
			</div>
		</div> */ ?>
		<?php /* <div class="container main">
			

		</div> */ ?>
		<?php echo $__env->yieldContent('content'); ?>
		<div class="footer">
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
	</body>
</html>