<?php $__env->startSection('title', 'Hóa đơn'); ?>
<?php $__env->startSection('header', 'Hóa đơn'); ?>

<?php $__env->startSection('content'); ?>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>Số hóa đơn</th>
				<th>Ngày hóa đơn</th>
				<th>Tên người dùng</th>
				<th>Địa chỉ gửi hàng</th>
				<th>Số điện thoại</th>
				<th>Số lượng</th>
				<th>Giảm giá</th>
				<th>Giá</th>
			</tr>
				<?php foreach($orderlist as $order): ?>
				<tr>
					<td><a href="<?php echo e(url("admin/orderdetail/$order->orderid")); ?>"><span class="glyphicon glyphicon-list-alt"></span>  <?php echo e($order->orderid); ?></a></td>
					<td><?php echo e($order->order->created_at); ?></td>
					<td><?php echo e($order->order->username); ?></td>
					<td><?php echo e($order->order->address); ?></td>
					<td><?php echo e($order->order->phone); ?></td>
					<td><?php echo e($order->quantity); ?></td>
					<td><?php echo e($order->percent); ?>%</td>
					<td><?php echo e(number_format($order->price)); ?>đ</td>
				</tr>
				


				<?php /* <tr id="<?php echo e($order->orderid); ?>"  class="collapse success">
					
					<td></td>
					<td><?php echo e($order->orderid); ?></td>
					<td><?php echo e($order->orderid); ?></td>
					<td><?php echo e($order->orderid); ?></td>
					<td><?php echo e($order->orderid); ?></td>
					<td><?php echo e($order->orderid); ?></td>
					<td><?php echo e($order->orderid); ?></td>
				</tr> */ ?>
				<?php endforeach; ?>
		</table>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>