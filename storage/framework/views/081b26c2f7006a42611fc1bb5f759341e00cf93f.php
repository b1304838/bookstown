<?php $__env->startSection('title'); ?>
	<?php echo e($book->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
	
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/custom.css')); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
	<div class="container">
		<div class="col col-xs-12 col-sm-4">
			<div class="image">
				<img src="<?php echo e(url('public/uploads/images')); ?>/<?php echo e($book->image); ?>" height="100%" />
				<?php
					$percent = App\Promotion::where('book_id', $book->book_id)->get()->first();
					if($percent) echo '<div class="saleoff">'.-$percent->percent.'%</div>';
				?>
			</div>
			<div style="text-align: center; margin-bottom: 5px;">
				<?php $kt = false;  ?>
				<?php foreach(Cart::content() as $bk): ?>
					<?php if($bk->id == $book->book_id): ?>
						<?php $kt = true; ?>
						<?php break; ?>
					<?php endif; ?>
				<?php endforeach; ?>
				<?php if($book->quantity == 0): ?>
					<div class="btn btn-warning disabled">Hết hàng</div>
				<?php else: ?>
				<?php if(!$kt): ?>
					<a class="btn btn-info" href="<?php echo e(url('shoppingcart/cart')); ?>/<?php echo e($book['book_id']); ?>">
						<span class="glyphicon glyphicon-shopping-cart"></span> Thêm vào giỏ hàng
					</a>
					<?php else: ?>
					<div class="btn btn-warning disabled" >Đã thêm vào giỏ hàng</div>
				<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="col col-xs-12 col-sm-8 detail">
			<div class="book-name"><?php echo e($book->name); ?></div>
			<ul>
				<li>Thể loại: <?php echo e($book->category->name); ?></li>
				<li>Tác giả: <?php echo e($book->author); ?></li>
				<li>Nhà xuất bản: <?php echo e($book->publisher); ?></li>
				<li>Số trang: <?php echo e($book->pages); ?></li>
				<li>Giá: <?php /* <?php echo e(number_format($book->price)); ?>đ */ ?>
					<?php if(App\Promotion::where('book_id', $book->book_id)->count() > 0): ?>
						<strike><?php echo e(number_format($book->price)); ?>đ</strike>
						<?php echo e(number_format($book->price - $book->promotion->percent*$book->price/100)); ?>đ
					<?php else: ?>
						<?php echo e(number_format($book->price)); ?>đ
					<?php endif; ?>
				</li>
				<li>Số lượng: <?php echo e($book->quantity); ?></li>
				<li>Mô tả: <?php echo e($book->description); ?></li>
			</ul>
		</div>	
	</div>
	<div class="container"> <?php /* class comment */ ?>
		<?php if(Auth::guest()): ?>
			<div class="col-xs-12">(Vui lòng đăng nhập để đánh giá và bình luận <?php /* <a href="{ url('login') }">Đăng nhập</a> */ ?>)
			</div>
		<?php endif; ?>
		<?php /* Phần hiển thị bình luận và đánh giá */ ?>
		<?php $status = false; ?>
		<div class="col-xs-12 col-sm-7">
			<b>Đánh giá và bình luận</b>	
			<?php foreach($comment as $comment): ?>
			<div class="row comment">
				<div class="col-xs-2">
					<img class="img-thumbnail" src="<?php echo e(asset('public/img/avatars')); ?>/<?php echo e($comment->user->avatar); ?>" height="55px" />
				</div>

				<div div class="col-xs-9">
					<b><?php echo e($comment->username); ?></b>
					<div>
						<?php for($i=0; $i<$comment->rating; $i++): ?>
							<span class="glyphicon glyphicon-star"></span>
						<?php endfor; ?>
					</div>
					<div><?php echo e($comment->comment); ?></div>
				</div>
				<div div class="col-xs-1">
					<?php if(Auth::check()): ?>
						<?php if(Auth::user()->level == 1): ?>
							<a class="btn btn-default btn-sm" href="<?php echo e(url("delcomment/$comment->id")); ?>">Xóa</a>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
				
				<?php
					if(isset(Auth::user()->username) && !Auth::guest())
						if($comment->username == Auth::user()->username) {
							$status = true;
						}
				?>
			<?php endforeach; ?>
		</div>
		<?php /* Form đánh giá và bình luận */ ?>
		<div class="col-xs-12 col-sm-5">
			<?php if(Auth::check()): ?>
			<?php /* <?php if(Auth::user()->level != 1): ?> */ ?>
				<?php /* <?php if($status == false): ?> */ ?>
					<form class="form-horizontal" action="<?php echo e(route('postComment')); ?>" method="post">
						<div>
							<label>1. Đánh giá của bạn</label>
							<div id="my-rating"></div>
						</div>
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
						<input type="hidden" name="account" value="<?php echo e(Auth::user()->username); ?>" />
						<input type="hidden" name="book_id" value="<?php echo e($book->book_id); ?>" />
						<input type="hidden" name="rating" id="rating" />
						<div class="form-group col-xs-12">
							<label>2. Nhận xét của bạn</label>
							<textarea name="comment" class="form-control" rows="3" placeholder="Nhận xét" /></textarea>
							<?php if($errors->has('comment')): ?>
								<div class="error">
									<span class="glyphicon glyphicon-exclamation-sign"></span>  <?php echo e($errors->first('comment')); ?>

								</div>
							<?php endif; ?>
						</div>
						<div class="form-group col-xs-12">
	    					<div>
								<button class="btn btn-success" type="submit">Đăng</button>
							</div>
						</div>
					</form>
				<?php /* <?php else: ?> */ ?>
					<?php /* <form class="form-horizontal" action="<?php echo e(route('postEditComment')); ?>" method="post">
						<div>
							<label>1. Đánh giá của bạn</label>
							<div id="my-rating"></div>
						</div>
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
						<input type="hidden" name="account" value="<?php echo e(Auth::user()->username); ?>" />
						<input type="hidden" name="book_id" value="<?php echo e($book->book_id); ?>" />
						<input type="hidden" name="rating" id="rating" />
						<div class="form-group col-xs-12">
							<label>2. Nhận xét của bạn</label>
							<textarea name="comment" class="form-control" rows="3" placeholder="Nhận xét" ></textarea>
							<?php if($errors->has('comment')): ?>
								<div class="error">
									<span class="glyphicon glyphicon-exclamation-sign"></span>  <?php echo e($errors->first('comment')); ?>

								</div>
							<?php endif; ?>
						</div>
						<div class="form-group col-xs-12">
	    					<div>
								<button class="btn btn-success" type="submit">Chỉnh sửa</button>
							</div>
						</div>
					</form>
				<?php endif; ?> */ ?>
			<?php /* <?php endif; ?> */ ?>
			<?php endif; ?>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#my-rating").starRating({
				totalStars: 5,
				starSize: 25,
				emptyColor: 'lightgray',
				hoverColor: '#9bc53d',
				activeColor: '#9bc53d',
				initialRating: 0,
				strokeWidth: 0,
				useGradient: false,
				// starShape: 'rounded',
				useFullStars: true,
			  	disableAfterRate: false,
			  	callback: function(currentRating, $el){
			    	$("#rating").val(currentRating);
				}
			});
		});	
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.main.homelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>