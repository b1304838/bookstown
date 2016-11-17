<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('header', 'Thống kê trang'); ?>

<?php $__env->startSection('content'); ?>
	<?php /* <div class=" col-xs-10 col-sm-3"> */ ?>
		<?php /* <div class="alert alert-info">ad</div> */ ?>
		<div class="container">
			<?php /* <?php echo Breadcrumbs::render('dashboard'); ?> */ ?>
			<div class="well">
				Tổng số sách: 
				<?php
						echo App\Book::all()->count();
					?>
			</div>
			<div class="well">
				Tổng số người dùng:
				<?php
						echo App\User::where('level', 2)->count();
					?>
			</div>
			<div class="well">
				Tổng số hóa đơn:
				<?php
						echo App\Order::all()->count();
					?>
			</div>
		</div>
<?php $__env->stopSection(); ?>

		
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>