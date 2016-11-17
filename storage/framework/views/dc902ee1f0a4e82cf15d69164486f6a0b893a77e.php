<?php $__env->startSection('title', 'Chi tiết hóa đơn'); ?>
<?php $__env->startSection('header', 'Chi tiết hóa đơn'); ?>

<?php $__env->startSection('content'); ?>
	<?php echo Breadcrumbs::render('orderdetail'); ?>

	<div class="table-responsive">
		<table class="table table-bordered">
			<tr class="success">
				<th>Số hóa đơn</th>
				<th>Tên sách</th>
				<th>Số lượng</th>
				<th>Giảm giá</th>
				<th>Tổng</th>
			</tr>
				<?php foreach($orderdetail as $order): ?>
				<tr>
					<td><?php echo e($order->orderid); ?></td>
					<td><?php echo e($order->book->name); ?></td>
					<td><?php echo e($order->quantity); ?></td>
					<td><?php echo e($order->percent); ?>%</td>
					<td><?php echo e(number_format($order->price)); ?>đ</td>
				</tr>
				<?php endforeach; ?>
		</table>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>