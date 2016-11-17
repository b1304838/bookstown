<?php $__env->startSection('title', 'Danh sách hóa đơn'); ?>
<?php $__env->startSection('header', 'Danh sách hóa đơn'); ?>

<?php $__env->startSection('content'); ?>
	<?php /* <?php echo Breadcrumbs::render('order'); ?> */ ?>
	<div class="header">Hóa đơn mới</div>
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-hover">
			<tr class="success">
				<th>Số hóa đơn</th>
				<th>Ngày hóa đơn</th>
				<th>Tên người dùng</th>
				<th>Địa chỉ gửi hàng</th>
				<th>Số điện thoại</th>
				<th>Tổng hóa đơn</th>
				<th></th>
			</tr>
				<?php foreach($newOrderlist as $order): ?>
				<tr>
					<td><?php echo e($order->orderid); ?></td>
					<td><?php echo e(date("d/m/Y", strtotime($order->created_at))); ?></td>
					<td><?php echo e($order->username); ?></td>
					<td><?php echo e($order->address); ?></td>
					<td><?php echo e($order->phone); ?></td>
					<td><?php echo e(number_format($order->total)); ?>đ</td>
					<td>
					<div class="btn-group btn-group-xs">
						<a class="btn btn-default" href="<?php echo e(url("admin/orderdetail/$order->orderid")); ?>"><span class="glyphicon glyphicon-list-alt"></span>Chi tiết</a>
						<a class="btn btn-default" href="<?php echo e(url("admin/check/$order->orderid")); ?>"><span class="glyphicon glyphicon-check"></span>Check</a>
					</div>
					</td>
				</tr>
				<?php endforeach; ?>
		</table>
	</div>
		<?php /* <?php echo e($newOrderlist->links()); ?> */ ?>
		<div class="header">Hóa đơn đã lưu</div>
		<?php /* Lịch */ ?>
		<div class="row">
			<div class="col col-xs-6">
				<button class="btn-block" data-toggle="collapse" data-target="#calendar"><span class="glyphicon glyphicon-calendar symbol"></span></button>
			</div>
			<div class="col col-xs-6">
				<button class="btn-block" data-toggle="collapse" data-target="#calendar2"><span class="glyphicon glyphicon-calendar symbol"></span><span class="glyphicon glyphicon-calendar symbol"></span></button>
			</div>
		</div>
		<br/>
		<div id="calendar" class="collapse container">
			<form >
				<div class="col col-sm-offset-4" id="datepicker"></div>
				<input id="date" type="hidden" />
			</form>
			<br/>
			<div class="table-responsive">
				<div class="neworder"></div>
			</div>
		</div>
		
		<div id="calendar2" class="collapse container">
			<label>Ngày bắt đầu:</label>
			<input type="text" id="datepicker1" />
			<label>Ngày kết thúc:</label>
			<input type="text" name="" id="datepicker2" />
			<button class="btn btn-default btn-sm" id="view">Xem</button>

			<br/>
			<div class="table-responsive">
				<div class="neworder2"></div>
			</div>
		</div>
		<br/>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover">
				<tr class="success">
					<th>Số hóa đơn</th>
					<th>Ngày hóa đơn</th>
					<th>Tên người dùng</th>
					<th>Địa chỉ gửi hàng</th>
					<th>Số điện thoại</th>
					<th>Tổng hóa đơn</th>
					<th></th>
				</tr>
					<?php foreach($orderlist as $order): ?>
					<tr>
						<td><?php echo e($order->orderid); ?></td>
						<td><?php echo e(date("d/m/Y", strtotime($order->created_at))); ?></td>
						<td><?php echo e($order->username); ?></td>
						<td><?php echo e($order->address); ?></td>
						<td><?php echo e($order->phone); ?></td>
						<td><?php echo e(number_format($order->total)); ?>đ</td>
						<td>
						<div class="btn-group btn-group-xs">
							<a class="btn btn-default btn-xs" href="<?php echo e(url("admin/orderdetail/$order->orderid")); ?>"><span class="glyphicon glyphicon-list-alt"></span>Chi tiết</a>
						</div>
						</td>
					</tr>
					<?php endforeach; ?>
			</table>
		</div>
		<?php echo e($orderlist->links()); ?>

		<script type="text/javascript">
			$('#datepicker').datepicker({
				altField: "#date",
				altFormat: "yy-mm-dd",
			});
			$('#datepicker').change(function(){
				ngay = $("#date").val();
				$.ajax({
					url: "orderRequest",
					data: {
						date: ngay
					},
					success: function(result){
						count = 0; //Đếm số hóa đơn tìm thấy
						table = '<table class="table neworder"><tr><th>Số hóa đơn</th><th>Ngày hóa đơn</th><th>Tên người dùng</th><th>Địa chỉ gửi hàng</th><th>Số điện thoại</th><th>Tổng hóa đơn</th><th></th></tr>';
						result.forEach(function(value){
							count++;
							table+="<tr><td>"+value.orderid+"</td><td>"+value.created_at+"</td>";
							table+="<td>"+value.username+"</td><td>"+value.address+"</td>";
							table+="<td>"+value.phone+"</td><td>"+value.total+"đ</td>";
							url = "orderdetail/"+value.orderid;
							table+='<td><div class="btn-group btn-group-xs"><a class="btn btn-default" href="'+url+'"><span class="glyphicon glyphicon-list-alt"></span>Chi tiết</a>  <a class="btn btn-default href="#"><span class="glyphicon glyphicon-check"></span>Check</a></div></td></tr>';
						});
						table+="</table>";
						if(count == 0){
							$('.neworder').html('<div class="alert alert-info">Không có hóa đơn</div>');
						}else{
							$('.neworder').html(table);
						}
					}
				});
			});

			$('#datepicker1').datepicker({
				altField: "#datepicker1",
				altFormat: "yy-mm-dd",
			});

			$('#datepicker2').datepicker({
				altField: "#datepicker2",
				altFormat: "yy-mm-dd",
			});

			$('#view').click(function(){
				// alert($('#datepicker1').val() + $('#datepicker2').val());
				date1 = $('#datepicker1').val();
				date2 = $('#datepicker2').val();
				$.ajax({
					url: "orderRequest2",
					data: {
						date1: date1,
						date2: date2
					},
					success: function(result){
						count = 0; //Đếm số hóa đơn tìm thấy
						table = '<table class="table neworder"><tr><th>Số hóa đơn</th><th>Ngày hóa đơn</th><th>Tên người dùng</th><th>Địa chỉ gửi hàng</th><th>Số điện thoại</th><th>Tổng hóa đơn</th><th></th></tr>';
						result.forEach(function(value){
							count++;
							table+="<tr><td>"+value.orderid+"</td><td>"+value.created_at+"</td>";
							table+="<td>"+value.username+"</td><td>"+value.address+"</td>";
							table+="<td>"+value.phone+"</td><td>"+value.total+"đ</td>";
							url = "orderdetail/"+value.orderid;
							table+='<td><div class="btn-group btn-group-xs"><a class="btn btn-default" href="'+url+'"><span class="glyphicon glyphicon-list-alt"></span>Chi tiết</a>  <a class="btn btn-default href="#"><span class="glyphicon glyphicon-check"></span>Check</a></div></td></tr>';
						});
						table+="</table>";
						if(count == 0){
							$('.neworder2').html('<div class="alert alert-info">Không có hóa đơn</div>');
						}else{
							$('.neworder2').html(table);
						}
					}
				});
			});
		</script>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>