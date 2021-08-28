<?php 
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=Customer Alacapa-".date('Y-m-d').".xls");
?>

<table>
	<thead>
		<tr class="border-0">
			<td><strong>No</strong></td>
			<td><strong>Customer Name</strong>
			<td><strong>Email</strong></td>
			<td><strong>Phone</strong></td>
			<td><strong>Join Date</strong></td>
			<td></td>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach($list as $data): ?>

		<tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data->customer_name; ?></td>
            <td><?php echo $data->customer_email; ?></td>
            <td>*<?php echo $data->customer_phone; ?></td>
            <td><?php echo dmy($data->customer_created_date); ?></td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
	</tbody>
</table>