<?php include('db_connect.php');?>

<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-supplier">
				<div class="card">
					<div class="card-header" style="background-color: #98ba7d;">
						    <center><b>SUPPLIER FORM</b></center>
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Supplier</label>
								<input type="text" class="form-control" name="name" id="sname">
							</div>
							
					</div>
					<div class="card-body">
							<div class="form-group">
								<label class="control-label">Contact</label>
								<input type="text" class="form-control" name="contact" id="scontact">
							</div>
					</div>
					<div class="card-body">
							<div class="form-group">
								<label class="control-label">Address</label>
								<textarea class="form-control" cols="30" rows="3" name="address" id="s_address"></textarea>
							</div>
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3" id="save-supplier"> Save</button>
								<button class="btn btn-sm btn-secondary col-sm-3" type="button" onclick="$('#manage-supplier').get(0).reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">SUPPLIER INFORMATION</th>
									<th class="text-center">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cats = $conn->query("SELECT * FROM supplier_list order by id asc");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										<p><small><b>Name : </b><?php echo $row['supplier_name'] ?></small></p>
										<p><small><b>Contact : </b><?php echo $row['contact'] ?></small></p>
										<p><small><b>Address : </b><?php echo $row['address'] ?></small></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_supplier" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['supplier_name'] ?>" data-contact="<?php echo $row['contact'] ?>" data-address="<?php echo $row['address'] ?>" ><i class="fa fa-pen"></i></button>
										<button class="btn btn-sm btn-danger delete_supplier" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	.container-fluid #manage-supplier{
		position: fixed;
	}
	td{
		vertical-align: middle !important;
	}
	td p{
		margin:unset;
	}
</style>
<script>
	$('#save-supplier').click(function(){
    var sname = $('#sname').val(),
		scontact = $('#scontact').val(),
		s_address = $('#address').val();
		if(sname == '' || scontact == '' || s_address == ''){
			alert_toast("Please complete the form first.",'danger');
			return false;
		}
		$('#manage-supplier form').submit()
	})
	$('table').dataTable()
	$('#manage-supplier').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_supplier',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_supplier').click(function(){
		start_load()
		var cat = $('#manage-supplier')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='contact']").val($(this).attr('data-contact'))
		cat.find("[name='address']").val($(this).attr('data-address'))
		end_load()
	})
	$('.delete_supplier').click(function(){
		_conf("Are you sure to delete this supplier?","delete_supplier",[$(this).attr('data-id')])
	})
	function delete_supplier($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_supplier',
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