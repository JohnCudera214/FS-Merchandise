<?php include('db_connect.php');
	$sku = mt_rand(1,99999999);
	$sku = sprintf("%'.08d\n", $sku);
	$i = 1;
	while($i == 1){
		$chk = $conn->query("SELECT * FROM product_list where sku ='$sku'")->num_rows;
		if($chk > 0){
			$sku = mt_rand(1,99999999);
			$sku = sprintf("%'.08d\n", $sku);
		}else{
			$i=0;
		}
	}
?>
<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage-product">
				<div class="card">
					<div class="card-header" style="background-color: #98ba7d;">
						    <center><b>PRODUCT FORM</b></center>
				  	</div>
					<div class="card-body">
					        <input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">PCODE</label>
								<input type="text" class="form-control form-control-sm" name="sku" id="pcode" value="<?php echo $sku ?>">
							</div>	
							<div class="form-group">
								<label class="control-label">CATEGORY</label>
								<select name="category_id" id="category" class="custom-select browser-default">
								<?php 

								$cat = $conn->query("SELECT * FROM category_list order by name asc");
								while($row=$cat->fetch_assoc()):
									$cat_arr[$row['id']] = $row['name'];
								?>
									<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
								<?php endwhile; ?>
								</select>
							</div>
						<div class="form-group">
							<label class="control-label">PRODUCT NAME</label>
							<input type="text" class="form-control form-control-sm" name="name" id="pname">
						</div>
						<div class="form-group">
							<label class="control-label">DESCRIPTION</label>
							<textarea class="form-control form-control-sm" cols="30" rows="1" name="description" id="description"></textarea>
						</div>
						<div class="form-group">
							<label class="control-label">MANUFACTURED DATE</label>
							<input type="date" class="form-control form-control-sm" name="manufacture_date" id="man_date">
						</div>
						<div class="form-group">
							<label class="control-label">EXPIRATION DATE</label>
							<input type="date" class="form-control form-control-sm" name="expire_date" id="exp_date">
						</div>
						<div class="form-group">
							<label class="control-label">PRODUCT PRICE</label>
							<input type="number" step="any" class="form-control form-control-sm text-right" name="price" id="price">
						</div>	
						<div class="form-group"> <!-- class="col-md-12" -->  
							<button class="btn btn-sm btn-primary col-sm-3 offset-md-3" id="save-product"> Save</button>
							<button class="btn btn-sm btn-secondary col-sm-3" type="button" onclick="$('#manage-product').get(0).reset()"> Cancel</button>
						</div>	
					</div>
					<!-- <div class="card-footer">
						<div class="row"> -->
						   
						<!-- </div>
					</div> -->
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered" id="expirationTable">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">PRODUCT INFORMATION</th>
									<th class="text-center">ACTION</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$prod = $conn->query("SELECT * FROM product_list order by id asc");
								while($row=$prod->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td>
										<p><small><b>Pcode: </b><?php echo $row['sku'] ?></small></p>
										<p><small><b>Category : </b><?php echo $cat_arr[$row['category_id']] ?></small></p>
										<p><small><b>Name : </b><?php echo $row['name'] ?></small></p>
										<p><small><b>Description : </b><?php echo $row['description'] ?></small></p>							
										<p><small><b>Manufactured Date : </b><?php echo $row['manufacture_date']?></small></p>
										<p  class="expired"><small><b>Expiration Date : </b><?php echo $row['expire_date']?></small></p>
										<p><small><b>Price : </b><?php echo number_format($row['price'],2) ?></small></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_product" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-sku="<?php echo $row['sku'] ?>" data-category_id="<?php echo $row['category_id'] ?>" data-description="<?php echo $row['description'] ?>" data-manufacture_date ="<?php echo $row['manufacture_date'] ?>" data-expire_date ="<?php echo $row['expire_date'] ?>" data-price="<?php echo $row['price'] ?>" ><i class="fa fa-pen"></i></button>
										<button class="btn btn-sm btn-danger delete_product" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
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
	#manage-product{
		position: fixed;
	}
	.container-fluid #manage-product{
		font-size: small;
		
	}
	.form-group{
		margin-top: 0.5;
		margin-bottom: 0.5;
	}
	.form-group .control-label{
		margin-top: 0;
		margin-bottom: 0;
	}
	.card-header{
		font-size: small;
	}
	td{
		vertical-align: middle !important;
	}
	td p{
		margin:unset;
	}
	/*.expired{
		background-color: red;
	} */
</style>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
	$('#save-product').click(function(){
    var pcode = $('#pcode').val(),
	    category = $('#category').val(),
	    pname = $('#pname').val(),
		description = $('#description').val(),
		//man_date = $('#man_date').val(),
		//exp_date = $('#exp_date').val(),
		price = $('#price').val();
		if(pcode == '' || category == '' || pname == '' || description == '' || man_date == '' || exp_date == '' || price == ''){
			alert_toast("Please complete the form first.",'danger');
			return false;
		}
		$('#manage-product form').submit()
	})
	$('table').dataTable()
	$('#manage-product').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_product',
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
	$('.edit_product').click(function(){
		start_load()
		var cat = $('#manage-product')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='sku']").val($(this).attr('data-sku'))
		cat.find("[name='category_id']").val($(this).attr('data-category_id'))
		cat.find("[name='description']").val($(this).attr('data-description'))
		cat.find("[name='manufacture_date']").val($(this).attr('data-manufacture_date'))
		cat.find("[name='expire_date']").val($(this).attr('data-expire_date'))
		cat.find("[name='price']").val($(this).attr('data-price'))
		end_load()
	})
	$('.delete_product').click(function(){
		_conf("Are you sure to delete this product?","delete_product",[$(this).attr('data-id')])
	})
	function delete_product($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_product',
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

         // Monitor the expiration date of each product.
	$(document).ready(function(){
		const dateElements = $('p.expired');
		dateElements.each(function(){
			const dateString = $(this).text().trim();
			const expiredDate = new Date(dateString);
			const currentDate = new Date();
			if(currentDate.getMonth() === expiredDate.getMonth() - 1 || currentDate >= expiredDate){
				$(this).css('background-color', '#ff8080');
			}
		})
	})
</script>

	