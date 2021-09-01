<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-12 pb-4 px-4 mt-4 animate-up">
		<?php if($total_data > 0): ?>
		<div class="card">
			<div class="card-body mt-0 pt-3">
				<div class="px-3 pt-2 mb-4" style="background: #F9F9F9;">
					<div class="form-filter">
						<div class="row">
							<div class="col-12 col-sm-4">
								<div class="form-group">
									<h6 class="fontsize-smallest my-2">Filter Transaction Code</h6>
									<input type="text" class="form-control shape table-like input-filter-text fontsize-smaller" name="orders_transaction_code">
								</div>
							</div>
							<div class="col-12 col-sm-8">
								<div class="float-right mt-1">
									<a href="<?php echo site_url(); ?>transaction/export" target="_blank">
										<button class="btn btn-dark mt-4 fontsize-smaller">
											Export Data <i class="fas fa-chevron-right ml-2"></i>
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<table class="table display nowrap table-hover fontsize-smallest" id="table-data" data-order="[0,1,2]" data-text-center="[0]" data-text-right="[]" data-link="transaction/data">
					<thead>
						<tr>
							<td><input name="select_all" value="1" type="checkbox"></td>
							<td><strong>Transaction Code</strong></td>						
							<td><strong>Receiver</strong></td>
							<td><strong>Transaction Total <i class="fas fa-sort"></i></strong></td>
							<td><strong>Shipping Method</strong></td>
							<td><strong>Payment Status</strong></td>
							<td><strong>Shipping Status</strong></td>
							<td><strong>Created Date <i class="fas fa-sort"></i></strong></td>
							<td></td>
						</tr>
					</thead>
					<tbody></tbody>
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
		<?php else: ?>
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

</div>
</div>
</div>