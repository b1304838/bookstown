<?php $__env->startSection('title', 'Chỉnh sửa sách'); ?>
<?php $__env->startSection('header', 'Chỉnh sửa sách'); ?>

<?php $__env->startSection('content'); ?>
	<?php if(session('result')): ?>
		<div class="alert alert-success">
			<ul>
				<li><?php echo e(session('result')); ?></li>
			</ul>
		</div>
	<?php endif; ?>
	<div class="col-sm-offset-2 col-sm-9">
		<form class="form-horizontal" action="<?php echo e(route('postEditBook')); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
			<div class="col-sm-9"><input type="hidden" name="book_id" value="<?php echo e($book['book_id']); ?>"/>
			<div class="form-group">
				<label class="control-label col-sm-3">Tên sách</label>
				<div class="col-sm-9"><input class="form-control" type="text" name="name" value="<?php echo e($book['name']); ?>"/></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Tác giả</label>
				<div class="col-sm-9"><input class="form-control" type="text" name="author" value="<?php echo e($book['author']); ?>"/></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Nhà xuất bản</label>
				<div class="col-sm-9"><input class="form-control" type="text" name="publisher" value="<?php echo e($book['publisher']); ?>"/></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Thể loại</label>
				<div class="col-sm-4"><select class="form-control" name="cat_id">
					<?php foreach($cat as $a): ?>
						<?php if($a['cat_id'] == $book['cat_id']): ?>
							<option value="<?php echo e($a['cat_id']); ?>" selected="true"><?php echo e($a['name']); ?></option>
						<?php else: ?>
							<option value="<?php echo e($a['cat_id']); ?>"><?php echo e($a['name']); ?></option>
						<?php endif; ?>
					<?php endforeach; ?>
				</select>
				</div>
			</div>
			<div class="form-group"><img class="col col-xs-offset-4" src="<?php echo e(asset('public/uploads/images')); ?>/<?php echo e($book['image']); ?>" width="25%" height="25%" /></div>
			<?php /* Hình ảnh hiện tại */ ?>
			<input type="hidden" name="current_image" value="<?php echo e($book['image']); ?>"/>
			<?php /* Hình ảnh mới */ ?>
			<div class="form-group">
				<label class="control-label col-sm-3">Ảnh mới</label>
				<div class="col-sm-9"><input type="file" name="new_image"/></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Số trang</label>
				<div class="col-sm-9"><input class="form-control" type="text" name="pages" value="<?php echo e($book['pages']); ?>"/></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Mô tả</label>
				<div class="col-sm-9"><textarea class="form-control" name="description"><?php echo e($book['description']); ?></textarea></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Giá</label>
				<div class="col-sm-9"><input class="form-control" type="text" name="price" value="<?php echo e($book['price']); ?>"/></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Số lượng</label>
				<div class="col-sm-9"><input class="form-control" type="text" name="quantity" value="<?php echo e($book['quantity']); ?>"/></div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9"><button class="btn btn-success" type="submit" name="editbook">Cập nhật</button></div>
			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>