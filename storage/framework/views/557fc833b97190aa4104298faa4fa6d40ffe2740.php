<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Hóa đơn</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
		<style type="text/css">
			body{
				font-family: DejaVu Serif;
			}
		</style>
	</head>
	<body>
		<table class="table">
			<tr>
				<th>Tên sách</th>
				<th>Số lượng</th>
			</tr>
			<?php foreach(App\Book::all() as $book): ?>
			<tr>
				<td><?php echo e($book->name); ?></td>
				<td><?php echo e($book->quantity); ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</body>
</html>