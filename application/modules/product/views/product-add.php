<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<div class="row">
	<div class="col-12 py-4 px-5">
		<div class="row">
			<div class="col-12">
				<div class="card shadow">
					<div class="card-body">
						<h6 class="text-uppercase element-header">
							<strong>Add Product</strong>
						</h6>

						<form  action="<?php echo site_url();?>product/add/" method="post" enctype="multipart/form-data">
						    <div class="form-group">
								<label for="exampleInputEmail1">Name Product</label>
								<input type="text" name="product_title" class="form-control"  placeholder="Name Product">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Price</label>
								<input type="number" name="product_price" class="form-control"  placeholder="Price">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Stock</label>
								<input type="number" name="product_stock" class="form-control"  placeholder="Price">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Description</label>
								<textarea name="product_description" id="editor1">
									
								</textarea>
							</div>
							<div>
								<label for="exampleInputEmail1">Product Image</label>
								<input type="file" name="userfile" class="form-control" placeholder="Price">
							</div>
							<div>
								<label for="exampleInputEmail1">Product Size</label>
								<select class="form-control" name="product_size[]" multiple="multiple">
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
									<option value="XXL">XXL</option>
								</select>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Procut Category</label>
								<?php echo cmb_dinamis('category_id', 'category', 'category_name', 'category_id', null); ?>
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Product Sub Category</label>
								<input type="text"  name="product_subcategory" class="form-control" placeholder="Product">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Product Sub Child</label>
								<input type="text"  name="product_subchild" class="form-control" placeholder="Product">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">weight</label>
								<input type="number" name="product_weight" class="form-control" placeholder="weight">
							</div>


							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							<a href="<?php echo site_url("product") ?>" class="btn btn-primary">Cancel</a>
						</form>


					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		CKEDITOR.replace('editor1');
	</script>

</div>
</div>