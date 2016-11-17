<?php $__env->startSection('title', 'Quản lý người dùng'); ?>
<?php $__env->startSection('header', 'Danh sách users'); ?>

<?php $__env->startSection('content'); ?>
	<?php /* <?php echo Breadcrumbs::render('userlist'); ?> */ ?>
	<div class="container">
		<form action="<?php echo e(url('admin/finduser')); ?>" method="get">
			<div class="row">
				<div class="col col-xs-8 col-sm-4"><input class="form-control" type="text" name="keyword" placeholder="Nhập username" /></div>
				<button class="btn btn-success">Tìm kiếm</button>
			</div>
		</form>
	</div>
	<br/>
<?php /* 	<div class="container table-responsive">
		<table class="table">
			<tr class="success">
				<th>Username</th>
				<th>Họ tên</th>
				<th>Giới tính</th>
				<th>Địa chỉ</th>
				<th>Email</th>
				<th>Số điện thoại</th>
				<th>Tình trạng</th>
				<th></th>
			</tr>
			<?php foreach($users as $user): ?>
			<tr>
				<td><a href="<?php echo e(url("admin/userorder/$user->username")); ?>"><?php echo e($user->username); ?></a></td>
				<td><?php echo e($user->fullname); ?></td>
				<td><?php echo e($user->gender); ?></td>
				<td><?php echo e($user->address); ?></td>
				<td><?php echo e($user->email); ?></td>
				<td><?php echo e($user->phone); ?></td>
				<td>
					<?php if($user->status): ?>
						<span class="glyphicon glyphicon-time"></span> Hoạt động
					<?php else: ?>
						<span class="glyphicon glyphicon-lock"></span> Khóa
					<?php endif; ?>
				</td>
				<td>
					<?php if($user->status): ?>
					<a href="<?php echo e(url("admin/lock/$user->id")); ?>"><span class="glyphicon glyphicon-ban-circle"></span></a></td>
					<?php else: ?>
					<a href="<?php echo e(url("admin/unlock/$user->id")); ?>"><span class="glyphicon glyphicon-ok-circle"></span></a></td>
					<?php endif; ?>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<?php echo e($users->links()); ?>

	<br/> */ ?>
	<div class="table-responsive">
	   		<div id="OrderTableContainer"></div>
    	</div>
	<br/>
	<br/>
	<div>
		<i>"Click vào username để xem hóa đơn của người dùng"</i>
	</div>

	<script type="text/javascript">
			// Danh sách hóa đơn jtable
			$('#OrderTableContainer').jtable({
	            title: 'Danh sách người dùng',
	            paging: true, //Enable paging
	            sorting: true, //Enable sorting
	            defaultSorting: 'id asc', //Set default sorting
	            // openChildAsAccordion: true,
	            actions: {
					listAction: function (postData, jtParams) {
		            	return $.Deferred(function ($dfd) {
							$.ajax({
					            url: 'listUser',
					            dataType: 'json',
					            data: {
					            	size: jtParams.jtPageSize,
				            		skip: jtParams.jtStartIndex,
				            		sort: jtParams.jtSorting
				            	},
					            success: function (data) {
					                $dfd.resolve(data);
					            },
					            error: function () {
									$dfd.reject();
					            }
					        });
   						});
					}
	            },
	            fields: {
	            	id: {
	                    key: true,
	                    // title: 'Mã sách',
	                    create: false,
	                    edit: false,
	                    list: false,
	                },
	                username: {
	                    title: 'Username',
	                    sorting: true,
	                    // width: '23%'
	                },
	                fullname: {
	                    title: 'Họ tên',
	                    sorting: true,
	                    // width: '23%'
	                },
	                gender: {
	                    title: 'Giới tính',
	                    // width: '23%'
	                },
	                address: {
	                    title: 'Địa chỉ',
	                    // width: '23%'
	                },
	                email: {
	                    title: 'Email',
	                    // width: '23%'
	                },
	                phone: {
	                    title: 'Số điện thoại',
	                    // width: '23%'
	                },
	                status: {
	                    title: 'Tình trạng',
	                    // width: '23%'
	                },
	                edit:{
	                	title: 'Thao tác',
	                	sorting: false
	                }
	            }
	            //Event handlers...
	        }); 
	        $('#OrderTableContainer').jtable('load');

		</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>