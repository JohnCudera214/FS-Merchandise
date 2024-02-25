<?php include 'db_connect.php' ?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
				    <div class="card-header" style="background-color: #98ba7d; display:flex;">
						<h4><b>Receiving History</b></h4>
					    <button class="col-md-2 float-right btn btn-dark btn-sm" id="new_receiving" style="margin-left: 38rem"><i class="fa fa-plus-square"></i> New Receiving</button>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Date</th>
								<th class="text-center">Reference #</th>
								<th class="text-center">Supplier</th>
								<th class="text-center">Action</th>
							</thead>
							<tbody>
							<?php 
								$supplier = $conn->query("SELECT * FROM supplier_list order by supplier_name asc");
								while($row=$supplier->fetch_assoc()):
									$sup_arr[$row['id']] = $row['supplier_name'];
								endwhile;
								$i = 1;
								$receiving = $conn->query("SELECT * FROM receiving_list r order by date(date_added) desc");
								while($row=$receiving->fetch_assoc()):
							?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class=""><?php echo date("M d, Y",strtotime($row['date_added'])) ?></td>
									<td class=""><?php echo $row['ref_no'] ?></td>
									<td class=""><?php echo isset($sup_arr[$row['supplier_id']])? $sup_arr[$row['supplier_id']] :'N/A' ?></td>
									<td class="text-center">
										<a class="btn btn-sm btn-primary" href="index.php?page=manage_receiving&id=<?php echo $row['id'] ?>"><i class="fa fa-pen"></i></a>
										<!--<a class="btn btn-sm btn-danger delete_receiving" href="javascript:void(0)" data-id="<?php //echo $row['id'] ?>"><i class="fa fa-trash"></i></a>-->
									</td>
								</tr>
							<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$('table').dataTable()
	$('#new_receiving').click(function(){
		location.href = "index.php?page=manage_receiving"
	})
	$('.delete_receiving').click(function(){
		_conf("Are you sure to delete this data?","delete_receiving",[$(this).attr('data-id')])
	})
	function delete_receiving($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_receiving',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>