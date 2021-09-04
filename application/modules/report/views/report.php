<?php 
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=Report Stock Alacapa-".date('Y-m-d').".xls");
?>

<div class="row">
	<div class="col-12 pb-4 px-4 mt-4 animate-up">
			<div class="card">
				<div class="card-body mt-0 pt-3">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Name Product</th>
								<th>Category</th>
								<th>Stock</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($datas as $row) : ?>
								<tr>
									<td><?php echo $row->product_title; ?></td>
									<td><?php echo $row->category_name; ?></td>
									<td><?php echo $row->product_stock; ?></td>
									<td><?php echo $row->product_price; ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
	</div>
</div>
</div>
</div>
</div>