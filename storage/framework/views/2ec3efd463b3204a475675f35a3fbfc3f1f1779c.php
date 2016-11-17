<?php $__env->startSection('title', 'Hóa đơn người dùng'); ?>
<?php $__env->startSection('header', 'Hóa đơn người dùng'); ?>

<?php $__env->startSection('content'); ?>
	<?php echo Breadcrumbs::render('userorder'); ?>

	<?php if($list->count() == 0): ?>
		<div class="alert alert-info"><ul><li>Không có hóa đơn</li></ul></div>
	<?php else: ?>
	<table class="table table-bordered">
		<tr class="success">
			<th>Số hóa đơn</th>
			<th>Ngày hóa đơn</th>
			<th>Địa chỉ giao hàng</th>
			<th>Số điện thoại</th>
			<th>Tổng hóa đơn</th>
		</tr>
	<?php foreach($list as $order): ?>
		<tr>
			<td><?php echo e($order->orderid); ?></td>
			<td><?php echo e($order->created_at); ?></td>
			<td><?php echo e($order->address); ?></td>
			<td><?php echo e($order->phone); ?></td>
			<td><?php echo e(number_format($order->total)); ?>đ</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>