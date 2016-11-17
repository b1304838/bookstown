<?php $__env->startSection('title', 'Đặt hàng'); ?>

<?php $__env->startSection('body'); ?>
	<?php if($errors->count() > 0): ?>
		<script>
			bootbox.alert('Vui lòng điền đầy đủ thông tin!');
		</script>
	<?php endif; ?>
	<div class="container cartdetail">
		<form action="<?php echo e(route('postCheckout')); ?>" method="post">
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
		<h3>Địa chỉ giao hàng</h3>
		Tên: <?php echo e($customer->fullname); ?>

		<br/>
		Địa chỉ:
		<br/>
		<input class="form-group" type="text" value="<?php echo e($customer->address); ?>" name="address" />
		<br/>
		Số điện thoại:
		<br/>
		<input class="form-group" type="text" value="<?php echo e($customer->phone); ?>" name="phone" />
		<br/>
		<i>Khách hàng có thể thay đổi địa chỉ và số điện thoại nhận hàng</i>
		<h3>Hình thức thanh toán</h3>
		Thanh toán trực tiếp cho người giao hàng
		<h3>Hình thức vận chuyển</h3>
		Vận chuyển tận nhà
		<br/>
		<br/>
		<button class="btn btn-success" type="submit">Tiến hành đặt hàng</button>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.main.homelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>