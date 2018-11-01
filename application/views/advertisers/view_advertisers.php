<div class="page-content-col">
	<div class="row">
		<?php

		if ($this->session->flashdata("success_msg") != "") {
			?>
			<div class="alert alert-success">
				<?php echo $this->session->flashdata("success_msg"); ?>
			</div>

			<?php
		}

		?>

	</div>	


	<table class="table table-bordered table-stripped datatable">
		<thead>
			<tr>
				<th>Sr.</th>
				<th>Advertiser's Name</th>
				<th>Advertiser's Email</th>
				<th>Advertiser's Phone</th>
				<th>Status</th>

				<?php
				if ($user_role == 1) {
					?>
					<th width="120px">Action</th>
					<?php
				}
				?>
				
				
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			foreach ($advertisers as $key => $value) {
				echo "<tr>
				<td>".$i."</td>
				<td>".$value->advertiser_first_name.' '.$value->advertiser_last_name."</td>
				<td>".$value->advertiser_email."</td>
				<td>".$value->advertiser_phone_number."</td>";

				if ($user_role == 1) {

					echo "<td>  <input type='checkbox' ". ($value->status != 0 ? 'checked' : '') ."  data-record_id='{$value->advertiser_id}' data-table='advertisers' data-where='advertiser_id' class='make-switch change_record_status' data-on-text='Active' data-off-text='Deactive'> </td>";
				}else{

					echo "<td>".get_status($value->status)."</td>";
				}

				if ($user_role == 1) {

					echo "<td> <a class='btn btn-primary round-btn' href='".base_url()."advertisers/manage_advertisers/".$value->advertiser_id."'>Edit</a> &nbsp; <a href='".base_url()."advertisers/delete_advertiser/".$value->advertiser_id."' class='btn btn-danger round-btn delete-btn'>Delete</a></td>
				</tr>";

				}
				
				

				$i++;
			}

			?>
		</tbody>
	</table>

</div>

