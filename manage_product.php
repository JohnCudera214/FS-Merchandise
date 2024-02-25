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
	<form action="" id="manage-product">
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
	</form>
</div>

<script>
	
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
</script>