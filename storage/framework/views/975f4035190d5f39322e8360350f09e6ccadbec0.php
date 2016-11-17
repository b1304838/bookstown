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
						<b><?php echo e(number_format($book->price - $book->promotion->percent*$book->price/100)); ?>đ</b>
					<?php else: ?>
						<b><?php echo e(number_format($book->price)); ?>đ</b>
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
			<?php /* Số sao trung bình */ ?>
			<div class="rating-chart">
				<?php
					$avgRating = App\Comment::where('book_id', $book->book_id)->where('rating', '<>', 0)->get()->average('rating');
					// Định dạng lại số chữ số xuất hiện
					echo "<h3>Trung bình đánh giá: ".number_format($avgRating, 1)."</h3>";

				?>
				<?php /* <div class="well">
					<div id="avg-rating"></div>
				</div> */ ?>
				<table class="table" cellspacing="0px" cellpadding="0px">
					<tr>
						<td width="70px"><b>1 <span class="glyphicon glyphicon-star"></span></b></td>
						<td><div class="rating1"></div></td>
					</tr>
					<tr>
						<td width="70px"><b>2 <span class="glyphicon glyphicon-star"></span></b></td>
						<td><div class="rating2"></td>
					</tr>
					<tr>
						<td width="70px"><b>3 <span class="glyphicon glyphicon-star"></span></b></td>
						<td><div class="rating3"></td>
					</tr>
					<tr>
						<td width="70px"><b>4 <span class="glyphicon glyphicon-star"></span></b></td>
						<td><div class="rating4"></td>
					</tr>
					<tr>
						<td width="70px"><b>5 <span class="glyphicon glyphicon-star"></span></b></td>
						<td><div class="rating5"></td>
					</tr>
				</table>
			</div>
			<?php /* ///// */ ?>
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
	<div class="container">
		<?php if(App\Book::where('author', $book->author)->where('book_id', '<>',$book->book_id)->count() != 0): ?>
		<div>
			<h3>Sách cùng tác giả</h3>
		</div>
		
		<?php /* Kiểm tra không có sách liên quan */ ?>
		<div class="field">
			<div class="wrapper">
			<div class="jcarousel-wrapper">
				<div class="jcarousel" style="background: white; color: #222; opacity: 0.9;">
            	<ul>
					<?php
		    			$count = 0;
		    		?>
    				<?php foreach(App\Book::where('author', $book->author)->where('book_id', '<>',$book->book_id)->get() as $tam): ?>
    				<?php $count++; ?>
						<li>
						<?php /* <div class="one-picture"> */ ?>
						<div class="row card">
							<div class="col-xs-12">
							<a href="<?php echo e(url('books')); ?>/<?php echo e($tam->book_id); ?>"><img src="<?php echo e(url('public/uploads/images')); ?>/<?php echo e($tam->image); ?>" height="210px"/>
								<?php if(App\Promotion::where('book_id', $tam->book_id)->count() > 0): ?>
									<div class="saleoff">-<?php echo e(App\Promotion::where('book_id', $tam->book_id)->get()->first()->percent); ?>%</div>
								<?php endif; ?>
							</a>
							</div>
							<div class="col-xs-12">
								<b><?php echo e($tam->name); ?></b>
								<br/>
								Giá:
								<?php if(App\Promotion::where('book_id', $tam->book_id)->count() > 0): ?>
									<strike><?php echo e(number_format($tam->price)); ?>đ</strike>
									<?php echo e(number_format($tam->price - $tam->promotion->percent*$tam->price/100)); ?>đ
								<?php else: ?>
									<?php echo e(number_format($tam->price)); ?>đ
								<?php endif; ?>
								<br/>
								<?php /* Sao đánh giá */ ?>
								Đánh giá:
								<?php if(App\Comment::where('book_id', $tam->book_id)->get()->average('rating') == 0): ?>
									<?php echo e(0); ?> <span style="color: #9bc53d" class="glyphicon glyphicon-star"></span>
								<?php else: ?>
									<?php echo e(number_format(App\Comment::where('book_id', $tam->book_id)->get()->average('rating'), 1)); ?> <span style="color: #9bc53d" class="glyphicon glyphicon-star"></span>
								<?php endif; ?>
								<?php /* ///// */ ?>
								<?php $kt = false;  ?>
								<?php foreach(Cart::content() as $bk): ?>
									<?php if($bk->id == $tam->book_id): ?>
										<?php $kt = true; ?>
										<?php break; ?>
									<?php endif; ?>
								<?php endforeach; ?>
								<?php if($tam->quantity == 0): ?>
									<div class="btn btn-warning disabled">Hết hàng
								</div>
								<?php else: ?>
								<?php if(!$kt): ?>
								<a class="btn btn-info" href="<?php echo e(url('shoppingcart/cart')); ?>/<?php echo e($tam->book_id); ?>">
									<span class="glyphicon glyphicon-shopping-cart"></span> Thêm vào giỏ hàng
								</a>
								<?php else: ?>
									<div class="btn btn-warning disabled">Đã thêm vào giỏ hàng
								</div>
								<?php endif; ?>
								<?php endif; ?>
								</div>
								</div>
						</li>
					<?php if($count==10): ?>
						<?php break; ?>
					<?php endif; ?>
        		<?php endforeach; ?>
                </ul>
            	</div>
            <a href="#" class="jcarousel-control-prev" style="text-decoration: none;">&lsaquo;</a>
            <a href="#" class="jcarousel-control-next" style="text-decoration: none">&rsaquo;</a>
        	</div>
    		</div>
			
		</div>
		<?php endif; ?> <?php /* Kiểm tra không có sách liên quan */ ?>


	</div>
<?php $__env->stopSection(); ?>

		<?php
			$rating = collect();
			for($i=1; $i<=5; $i++){
				$rating[] = App\Comment::where('book_id', $book->book_id)->where('rating', $i)->count('rating');
			}
			if($rating->max() == 0){
				$maxChart = 1;
			}else{
				$maxChart = $rating->max();
			}
		?>

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
			// $("#avg-rating").jRating({
			// 	nbRates : 3
			// });
			// $("#avg-rating").click(function(){
			// 	alert();
			// });
		});

		// Xử lý rating-chart
		
		$('.rating1').css('width', '<?php echo e(App\Comment::where('book_id', $book->book_id)->where('rating', 1)->count('rating')*100/$maxChart); ?>'+'%');
		$('.rating2').css('width', '<?php echo e(App\Comment::where('book_id', $book->book_id)->where('rating', 2)->count('rating')*100/$maxChart); ?>'+'%');
		$('.rating3').css('width', '<?php echo e(App\Comment::where('book_id', $book->book_id)->where('rating', 3)->count('rating')*100/$maxChart); ?>'+'%');
		$('.rating4').css('width', '<?php echo e(App\Comment::where('book_id', $book->book_id)->where('rating', 4)->count('rating')*100/$maxChart); ?>'+'%');
		$('.rating5').css('width', '<?php echo e(App\Comment::where('book_id', $book->book_id)->where('rating', 5)->count('rating')*100/$maxChart); ?>'+'%');
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.main.homelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>