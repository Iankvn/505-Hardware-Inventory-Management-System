<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<h1 class="page-header text-center">ORDER</h1>
	    <link rel="icon" type="image/x-icon" href="/WEBSYSTEM/images/icon.png">
	<form method="POST" action="purchase.php">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll" ></th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
			</thead>
			<tbody>
				<?php 
					$sql="select * from product left join category on category.categoryid=product.categoryid order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
							
							<td><?php echo $row['productname']; ?></td>
							<td class="text-right">&#8369; <?php echo number_format($row['price'], 2); ?></td>
							<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
		</table>
		<div class="row">
			<div class="col-md-2" style="margin-left:-20px;">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>
</body>
</html>