<?php $__env->startSection('title', 'Giỏ hàng'); ?>

<?php $__env->startSection('body'); ?>
	<div class="container cartdetail">
		<?php if(Cart::count()==0): ?>
				<div class="alert alert-info"><?php echo e("Không có sản phẩm trong giỏ hàng"); ?></div>
			<?php else: ?>
		<div class="table-responsive">
		<table class="table">
			<tr>
				<th></th>
				<th>Tên sách</th>
				<th>Số lượng</th>
				<th>Giảm giá</th>
				<th>Thành tiền</th>
				<th></th>
			</tr>
			<?php
				$id = 0;
				$promotion = 0; //Biến dùng để đếm tổng giảm giá
			?>
			<?php foreach(Cart::content() as $book): ?>
				<?php $id++; ?>
				<tr>
					<?php /* Lưu rowId và quantity để gửi đi */ ?>
					<input type="hidden" class="row<?php echo e($id); ?>" value="<?php echo e($book->rowId); ?>"/>
					<input type="hidden" class="price<?php echo e($id); ?>" value=""/>
					<td>
						<a href="<?php echo e(url('books')); ?>/<?php echo e($book->id); ?>"><div class="one-picture"><img src="<?php echo e(url('public/uploads/images')); ?>/<?php echo e($book->options->img); ?>" height="120px" /></div></a>
					</td>
					<td><p><?php echo e($book->name); ?></p></td>
					<td>
						<p style="padding-top: 40px; width: 100px;">
							<input name="<?php echo e($id); ?>" id="qty" class="form-control" value="<?php echo e($book->qty); ?>" />
						<?php /* <select class="form" name="<?php echo e($id); ?>" id="qty">
							<?php for($i=1; $i<=App\Book::where('book_id', $book->id)->get()->first()->quantity; $i++): ?>
								<?php if($i == $book->qty): ?>
									<option class="qty" value="<?php echo e($i); ?>" selected="true"><?php echo e($i); ?></option>
								<?php else: ?>
									<option class="qty" value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
								<?php endif; ?>
							<?php endfor; ?>
						</select> */ ?>
						</p>
					</td>
					<?php /* Giảm giá */ ?>
					<td>
						<p><?php echo e($book->options->percent); ?>%</p>
						<?php /* Đếm tổng giảm giá */ ?>
						<?php
							$promotion += $book->price*$book->qty - $book->price*$book->qty*$book->options->percent/100;
						?>
					</td>
					<td><p><?php echo e(number_format($book->price*$book->qty - $book->price*$book->qty*$book->options->percent/100)); ?>đ</p></td>
					<td><p><button class="btn btn-info removeCart<?php echo e($id); ?>">Xóa khỏi giỏ hàng</button></p></td>
				</tr>
			<?php endforeach; ?>
			
			</table>
			</div>
		<div>Tổng hóa đơn: <?php echo number_format($promotion); /*Cart::total(0) -*/  ?>đ</div>
		<br/>
		<div>
		<?php if(Cart::count() == 0): ?>
			<div class="btn-group">
				<a href="#" class="btn btn-success disabled">Đặt hàng</a>
				<a href="<?php echo e(url('shoppingcart/destroy')); ?>" class="btn btn-danger disabled">Xóa giỏ hàng</a>
			</div>
		<?php else: ?>
			<div class="btn-group">
				<a href="<?php echo e(url('shoppingcart/checkout')); ?>" class="btn btn-success">Đặt hàng</a>
				<a href="<?php echo e(url('shoppingcart/destroy')); ?>" class="btn btn-danger">Xóa giỏ hàng</a>
			</div>
		<?php endif; ?>
		</div>

			<?php endif; ?>

		
	</div>
	<?php /* <script type="text/javascript" src="<?php echo e(asset('public/js/jquery.min.js')); ?>"></script> */ ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('input').change(function(){
				id = $(this).attr('name');
				value = $(this).val();
				$(".price"+id).val(value);

				$.ajax({url: "getRequest",
					data: {
						row: $(".row"+id).val(),
						price: $(".price"+id).val()
						// id: $('#qty').val(),
					}, 
					success: function(result){
						if(result == "success"){
							$(location).attr('href', '<?php echo e(url('shoppingcart/cartdetail')); ?>');
							// bootbox.alert(result);
							
						}else{
							bootbox.alert('Bạn đã nhập quá số lượng<br/>Số lượng sách chỉ còn: '+result);
							// $(location).attr('href', result);
						}
    				}
    			});
			});

			$("[class*='removeCart']").click(function(){
				classattr = $(this).attr('class');
				id = classattr.substr(-1, 1);
				// alert(id);
				$.ajax({url: "remove",
					data: {
						row: $(".row"+id).val(),
						// id: $('#qty').val(),
					}, 
					success: function(result){
        				$(location).attr('href', result);
    				}
    			});

			});

			$("[class*='addCart']").click(function(){
				classattr = $(this).attr('class');
				id = classattr.substr(-1, 1);

				
				// alert($(".row"+id).val());
				// $.ajax({url: "remove",
				// 	data: {
				// 		row: $(".row"+id).val(),
				// 		// id: $('#qty').val(),
				// 	}, 
				// 	success: function(result){
    //     				$(location).attr('href', result);
    // 				}
    // 			});				
			});
		});
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.main.homelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>