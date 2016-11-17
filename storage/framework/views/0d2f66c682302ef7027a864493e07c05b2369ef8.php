<?php $__env->startSection('title', 'Thêm sách'); ?>
<?php $__env->startSection('header', 'Thêm sách'); ?>

<?php $__env->startSection('content'); ?>
	<?php /* Thông báo khi thêm sách thành công */ ?>
	<?php if(session('result')): ?>
		<div class="alert alert-success">
			<ul>
				<li><?php echo e(session('result')); ?></li>
			</ul>
		</div>
	<?php endif; ?>
	<div class="col-sm-offset-1 col-sm-10">
		<?php /* <?php if(count($errors)>0): ?>

			<div class="alert alert-danger">
				<ul>
					<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?> */ ?>
		<form class="form-horizontal" action="<?php echo e(route('postBook')); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
			<div class="form-group">
				<label class="control-label col-sm-2">Mã sách</label>
				<div class="col-sm-6"><input class="form-control" type="text" name="book_id" value="<?php echo e(old('book_id')); ?>"/></div>
				<div class="col-sm-4 error">
					<?php if($errors->has('book_id')): ?>
						<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('book_id')); ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Tên sách</label>
				<div class="col-sm-6"><input class="form-control" type="text" name="name" value="<?php echo e(old('name')); ?>"/></div>
				<div class="col-sm-4 error">
					<?php if($errors->has('name')): ?>
						<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('name')); ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Tác giả</label>
				<div class="col-sm-6"><input class="form-control" type="text" name="author" value="<?php echo e(old('author')); ?>"/></div>
				<div class="col-sm-4 error">
					<?php if($errors->has('author')): ?>
						<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('author')); ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Nhà xuất bản</label>
				<div class="col-sm-6"><input class="form-control" type="text" name="publisher" value="<?php echo e(old('publisher')); ?>"/></div>
				<div class="col-sm-4 error">
					<?php if($errors->has('publisher')): ?>
						<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('publisher')); ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Thể loại</label>
				<div class="col-sm-4"><select class="form-control" name="cat_id">
					<?php foreach($cat as $a): ?>
						<option value="<?php echo e($a['cat_id']); ?>"><?php echo e($a['name']); ?></option>
					<?php endforeach; ?>
				</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Ảnh</label>
				<div class="col-sm-6"><input type="file" name="image"/></div>
				<div class="col-sm-4 error">
					<?php if($errors->has('image')): ?>
						<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('image')); ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Số trang</label>
				<div class="col-sm-6"><input class="form-control" type="text" name="pages" value="<?php echo e(old('pages')); ?>"/></div>
				<div class="col-sm-4 error">
					<?php if($errors->has('pages')): ?>
						<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('pages')); ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Mô tả</label>
				<div class="col-sm-6"><textarea class="form-control" rows="10" name="description"></textarea></div>
				<div class="col-sm-4 error">
					<?php if($errors->has('description')): ?>
						<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('description')); ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Giá</label>
				<div class="col-sm-6"><input class="form-control" type="text" name="price" value="<?php echo e(old('price')); ?>"/></div>
				<div class="col-sm-4 error">
					<?php if($errors->has('price')): ?>
						<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('price')); ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Số lượng</label>
				<div class="col-sm-6"><input class="form-control" type="text" name="quantity" value="<?php echo e(old('quantity')); ?>"/></div>
				<div class="col-sm-4 error">
					<?php if($errors->has('price')): ?>
						<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('price')); ?>

					<?php endif; ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-9"><button class="btn btn-success" type="submit" name="addbook">Thêm sách</button></div>
			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>