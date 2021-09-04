<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<div class="row">
	<div class="col-12 py-4 px-5">
		<div class="row">
			<div class="col-12">
				<div class="card shadow">
					<div class="card-body">
						<h6 class="text-uppercase element-header">
							<strong>Add Banner</strong>
						</h6>

						<form action="<?php echo site_url(); ?>banner/edit/" method="post" enctype="multipart/form-data">
						 	 <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
						    <div class="form-group">
								<label for="exampleInputEmail1">Image Banner</label>
								<input type="file" required name="userfile" class="form-control">
							</div>

							<div>
							<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							<a href="<?php echo site_url("banner") ?>" class="btn btn-primary">Cancel</a>
							</div>
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