<?php 
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=Transaction Alacapa-".date('Y-m-d').".xls");
?>

<table>
	<thead>
		<tr class="border-0">
			<td><strong>No</strong></td>
			<td><strong>Transaction Code</strong>
			<td><strong>Receiver Name</strong></td>
			<td><strong>Transaction Total</strong></td>
			<td><strong>Payment Method</strong></td>
			<td><strong>Payment Status</strong></td>
			<td><strong>Shipping Method</strong></td>
			<td><strong>Shipping Address</strong></td>
			<td><strong>Shipping Status</strong></td>
			<td><strong>Created Date</strong></td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach($list as $data): ?>

		<?php
            switch ($data->orders_payment_method) {
                case "bank_transfer":
                $payment_method = 'Virtual Account';
                break;
                case "direct_transfer":
                $payment_method = 'Direct Transfer';
                break;
                case "gopay":
                $payment_method = 'Go-Pay';
                break;
                default:
                $payment_method = 'Paypal';
                break;
            }

            switch ($data->orders_status) {
                case "pending":
                $order_status = '<span class="text-danger">Waiting Payment</span>';
                break;
                case "confirmation":
                $order_status = '<span class="text-danger">Waiting Confirmation</span>';
                break;
                case "paid":
                $order_status = '<span class="text-success">Paid</span>';
                break;
            }

            if($data->orders_status == 'paid') {
                if($data->orders_resi){
                    $shipping_status = '<span class="text-success">On Shipping</span>';
                }
                else{
                    $shipping_status = '<span class="text-danger">Waiting Resi</span>';
                }
            }
            else{
                $shipping_status = '-';
            }
        ?>

		<tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data->orders_transaction_code; ?></td>
            <td><?php echo $data->orders_receiver_name; ?></td>
            <td><?php echo rate_detail($data->orders_currency)->rate_code.'
             '.number_format($data->orders_grand_total_price,0,'','.'); ?></td>
            <td><?php echo $payment_method; ?></td>
            <td><?php echo $order_status; ?></td>
            <td><?php echo $data->orders_shipping_method; ?></td>
            <td><?php echo $data->orders_shipping_address; ?></td>
            <td><?php echo $shipping_status; ?></td>
            <td><?php echo dmy($data->orders_created_date).' '.date('H:i', strtotime($data->orders_created_date)).' WIB'; ?></td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
	</tbody>
</table>