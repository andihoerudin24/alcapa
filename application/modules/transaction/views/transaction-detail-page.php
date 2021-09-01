<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
	<div class="col-12 py-4 px-5">
		<div class="row">
			<div class="col-6">
				<div class="card shadow">
					<div class="card-body">
						<h6 class="text-uppercase element-header">
							<strong>Order Status</strong>
						</h6>
						<table class="table fontsize-smallest">
							<tbody>
								<tr>
									<td>Transaction Code</td>
									<td><strong>#<?php echo $orders_detail->orders_invoice_code; ?></strong></td>
								</tr>
								<tr>
									<td>Payment Status</td>
									<td>
										<?php if($orders_detail->orders_status == 'paid'): ?>
											<strong class="text-success">Paid</strong>
										<?php elseif($orders_detail->orders_status == 'confirmation'): ?>
											<strong class="text-danger">Check Confirmation</strong>
										<?php else: ?>
											<strong class="text-danger">Waiting Payment</strong>
										<?php endif; ?>
									</td>
								</tr>
								<tr>
									<td>Shipping Status</td>
									<?php if($orders_detail->orders_status == 'paid'): ?>
										<?php if($orders_detail->orders_resi != ''): ?>
											<td>Resi : <strong class="text-success"><?php echo $orders_detail->orders_resi; ?></strong></td>
										<?php else: ?>
										<td>
											<?php echo form_open('transaction/resi'); ?>
												<input type="hidden" name="orders_invoice_code" value="<?php echo $orders_detail->orders_invoice_code; ?>">
												<input type="hidden" name="customer_id" value="<?php echo $orders_detail->customer_id; ?>">
												<?php if($orders_detail->orders_shipping_method == 'Free Ongkir' && $orders_detail->orders_shipping_price == 0): ?>
													<input class="form-control shape fontsize-smaller mb-2" name="orders_shipping_method" placeholder="Shipping Vendor" required="required">
												<?php endif; ?>
												<?php if($orders_detail->orders_shipping_method == 'Free Ongkir' && $orders_detail->orders_shipping_price != 0): ?>
													<input class="form-control shape fontsize-smaller mb-2" name="orders_shipping_method" placeholder="Shipping Vendor" required="required">
												<?php endif; ?>
												<input type="text" name="orders_resi" placeholder="Input Resi" class="form-control d-inline shape" style="width: 150px; padding: 0 !important; position: relative; top: 1px; padding-left: 10px !important;" required="required">
												<button type="button" data-toggle="modal" data-target="#resi" class="btn fontsize-smaller btn-outline-danger btn-resi">Submit</button>
												<div class="modal fade" id="resi" tabindex="-1" role="dialog" aria-labelledby="resi" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-body text-center">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>
																<img src="<?php echo base_url(); ?>assets/icon/email-send.jpg" class="w-75">
																<h6>Is this correct courier number?</h6>
																<h5><span class="checked-vendor"></span> : <span class="checked-resi"></span></h5>
																<p>This action will send an email to the customer</p>
																<button class="btn btn-outline-danger btn-sm px-4 py-2 my-4">Send Now</button>
															</div>
														</div>
													</div>
												</div>
											</td>
											<?php echo form_close(); ?>
										</td>
										<?php endif; ?>
									<?php else: ?>
										<td>-</td>
									<?php endif; ?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>						
				<div class="card shadow mt-4">
					<div class="card-body">
						<h6 class="text-uppercase element-header mb-4">
							<strong>Order Item</strong>
						</h6>
						<hr>
						<?php foreach($orders_item_list as $item): ?>
		                <div class="py-2 mb-2 border-bottom">
	                        <h6 class="mb-2 fontsize-smallest">
	                            <?php echo $item->order_item_title; ?>
	                        </h6>
	                        <div class="row">
	                            <div class="col-6">
	                                <h6 class="fontsize-smallest">
	                                    x <?php echo $item->order_item_inquiry; ?>
	                                </h6>
									<?php if($item->order_item_size != null): ?>
										<small>Size: <?php echo $item->order_item_size; ?></small>
									<?php endif; ?>
									<?php if($item->order_item_size != null && $item->order_item_color != null): ?> | <?php endif; ?>
									<?php if($item->order_item_color != null): ?>
										<small>Color: <span class="dot-small rounded-circle ml-1 product-option" style="background: <?php echo $item->order_item_color; ?>"></span></small>
									<?php endif; ?>
	                            </div>
	                            <div class="col-6">
	                                <h6 class="text-right fontsize-smallest">
			                        	<?php echo rate_detail($orders_detail->orders_currency)->rate_code; ?>
										<?php echo number_format($item->order_item_price/rate_detail($orders_detail->orders_currency)->rate_value,0,'','.'); ?>
	                                </h6>
	                            </div>
	                        </div>
		                </div>
						<?php endforeach; ?>
		                <div class="row border-bottom py-2 mb-2">
		                    <div class="col-6">
		                        <h6 class="fontsize-smallest">Sub Total</h6>
		                    </div>
		                    <div class="col-6">
		                        <h6 class="text-right fontsize-smallest">
		                        	<?php echo rate_detail($orders_detail->orders_currency)->rate_code; ?>
									<?php echo number_format($orders_detail->orders_sub_total_price,0,'','.'); ?>
		                        </h6>
		                    </div>
		                </div>
		                <div class="row border-bottom py-2 mb-2">
		                    <div class="col-6">
		                        <h6 class="fontsize-smallest">Shipping Fee</h6>
		                    </div>
		                    <div class="col-6">
		                        <h6 class="text-right fontsize-smallest">
		                        	<?php echo rate_detail($orders_detail->orders_currency)->rate_code; ?>
									<?php if(rate_detail($orders_detail->orders_currency)->rate_code == 'Rp'): ?>
										<?php echo number_format($orders_detail->orders_shipping_price,0,'','.'); ?>
									<?php else: ?>
										<?php echo number_format($orders_detail->orders_shipping_price,2,'.','.'); ?>
									<?php endif; ?>
		                        </h6>
		                    </div>
		                </div>
		                <div class="row border-bottom py-2 mb-2">
		                    <div class="col-6">
		                        <h6 class="fontsize-smallest">Transaction Fee</h6>
		                    </div>
		                    <div class="col-6">
		                        <h6 class="text-right fontsize-smallest">
									<?php if($orders_detail->orders_payment_price == 0): ?>
									Free
									<?php else: ?>
									<?php echo rate_detail($orders_detail->orders_currency)->rate_code; ?> <?php echo number_format($orders_detail->orders_payment_price,0,'','.'); ?>
									<?php endif; ?>
								</h6>			                        	
		                    </div>
		                </div>
		                <div class="row py-2 mb-2">
		                    <div class="col-6">
		                        <h6 class="fontsize-smaller"><strong>Total</strong></h6>
		                    </div>
		                    <div class="col-6">
		                        <h6 class="text-right fontsize-smaller">
		                            <strong>
										<?php echo rate_detail($orders_detail->orders_currency)->rate_code; ?>
										<?php if(rate_detail($orders_detail->orders_currency)->rate_code == 'Rp'): ?>
											<?php echo number_format($orders_detail->orders_grand_total_price,0,'','.'); ?>
										<?php else: ?>
											<?php echo number_format($orders_detail->orders_grand_total_price,2,'.','.'); ?>
										<?php endif; ?>
		                            </strong>
		                        </h6>
		                    </div>
		                </div>
					</div>
				</div>
			</div>
			<div class="col-6">
				<?php if($orders_detail->orders_payment_method == 'direct_transfer'): ?>
				<div class="card shadow mb-4">
					<div class="card-body">
						<h6 class="text-uppercase element-header">
							<strong>Confirm Payment Info</strong>
						</h6>
						<?php if($confirm_detail): ?>
							<?php foreach($confirm_detail as $confirm): ?>
							<hr>
							<div class="row">
								<div class="col-4">
									<label class="fontsize-mini font-weight-bold mb-0">Nama Akun Bank</label>
				                    <p class="fontsize-smallest"><?php echo $confirm->bank_account_name; ?></p>
									<label class="fontsize-mini font-weight-bold mb-1">No.Akun</label>
				                    <h6 class="fontsize-smallest"><?php echo $confirm->bank_account_number; ?></h6>
				                </div>
								<div class="col-8 border-left">
									<label class="fontsize-mini font-weight-bold mb-1">Bank</label>
				                    <h6 class="fontsize-smallest"><?php echo $confirm->bank; ?></h6>
				                </div>
			                </div>
			            	<?php endforeach; ?>
			            <?php else: ?>
							<hr>
			            	<h6 class="text-danger fontsize-smaller">Waiting confirmation</h6>
		            	<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
				<div class="card shadow">
					<div class="card-body">
						<h6 class="text-uppercase element-header">
							<strong>Shipping Info</strong>
						</h6>
						<hr>
						<div class="row">
							<div class="col-4">
								<label class="fontsize-mini font-weight-bold mb-0">Receiver Name</label>
			                    <p class="fontsize-smallest"><?php echo $orders_detail->orders_receiver_name; ?></p>
								<label class="fontsize-mini font-weight-bold mb-1">Receiver Phone</label>
			                    <h6 class="fontsize-smallest"><?php echo $orders_detail->orders_receiver_phone; ?></h6>
			                </div>
							<div class="col-8 border-left">
								<label class="fontsize-mini font-weight-bold mb-1">Shipping Method</label>
			                    <div class="mb-2">
		                    		<img src="<?php echo base_url(); ?>assets/courier/<?php echo $orders_detail->orders_shipping_code; ?>.png" width="70" style="position: relative; top: 5px;">
		                    		<p class="fontsize-smallest mt-2">
		                    			<?php if($orders_detail->orders_shipping_method == 'Free Ongkir' && $orders_detail->orders_shipping_price != 0): ?>

		                    			<?php else: ?>
		                    				<?php echo $orders_detail->orders_shipping_method; ?>
		                    			<?php endif; ?>
		                    		</p>
			                    </div>
								<label class="fontsize-mini font-weight-bold mb-1">Alamat Pengiriman</label>
			                    <p class="fontsize-smallest"><?php echo $orders_detail->orders_shipping_address; ?></p>
			                </div>
		                </div>
		                <div class="border-top pt-2">
		                	<label class="fontsize-mini font-weight-bold mb-0">Notes</label>
			                <p class="fontsize-smallest">
			                	-
			                </p>
			            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
</div>