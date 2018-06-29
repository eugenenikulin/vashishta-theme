<?php global $wpdb;
$emails = $wpdb->get_results("SELECT * FROM vashishta_newsletter WHERE 1");
 ?>
 <table cellspacing="0" border="1" cellpadding="5">
 	<thead>
 		<tr>
 			<td>id</td>
 			<td>email</td>
 			<td>date</td>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($emails as $email) { ?>
 			<tr>
 				<td><?php echo $email->id; ?></td>
 				<td><?php echo $email->email; ?></td>
 				<td><?php echo date('d/m/Y', strtotime($email->date)); ?></td>
 			</tr>
 		<?php } ?>
 	</tbody>
 </table>
</div>