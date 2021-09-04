<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

<div class="row">
	<div class="col-12 pb-4 px-4 mt-4 animate-up">
		<?php if ($total_data > 0) : ?>
			<div class="card">
				<div class="card-body mt-0 pt-3">
					<div class="px-3 pt-2 mb-4" style="background: #F9F9F9;">
						<div class="form-filter">
							<div class="row">
								<div class="col-12 col-sm-8">
									<?php echo anchor('Banner/add', 'Add Banner', array('class' => 'btn btn-success btn-sm"')) ?>
								</div>
							</div>
						</div>
					</div>
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php  $no = 1; ?>
							<?php foreach ($datas as $row) : ?>
								<tr>
									<td><?php echo $no ?></td>
									<td><img src="<?php echo $row->image ?>" width="50px" height="50px" alt="" srcset=""></td>
									<td><a href="<?php echo site_url(); ?>Banner/edit/<?php echo $row->id ?>" class="btn btn-warning">Edit</a> <a href="<?php echo site_url(); ?>Banner/delete/<?php echo $row->id ?>" class="btn btn-danger">Delete</a></td>
								</tr>
								<?php $no++; ?>
							<?php endforeach; ?>
						</tbody>
					</table>

					<div class="modal fade" id="delete-form" role="dialog" data-backdrop="static" data-keyboard="false">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body text-center">
									<h6 class="py-2 mb-0">Hapus data terpilih?</h6>
									<hr>
									<?php echo form_open('promo/action/delete'); ?>
									<input type="hidden" name="array_id">
									<button type="button" class="btn btn-outline-asgsagas fontsize-smaller" data-dismiss="modal">Batalkan</button>
									<button class="btn btn-outline-danger btn-sm fontsize-smaller px-4 py-2">Hapus</button>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php else : ?>
			<div class="text-center text-light">
				<img src="https://tokoadmin.tokotalk.com/images/empty_promos.svg" width="400">
				<h4>Kamu belum punya data produk</h4>
				<a href="<?php echo site_url(); ?>promo/form/create/manual">
					<button type="button" class="btn btn-outline-light mr-3 mt-4">
						<i class="os-icon os-icon-plus position-relative border-right mr-2 pr-2" style="top: 1px;"></i> Tambah Produk
					</button>
				</a>
			</div>
		<?php endif; ?>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
</div>
</div>
</div>