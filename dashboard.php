<style>
	.row{
		display: flexbox;
	}
	.card .card-body{
		font-size: large;
		text-align: center; 
		background-color: #98ba7d;
	}
	.card .row{
		margin: 1rem 0 0 1rem;
	}
</style>

<div class="container-fluid">

	<div class="row">
		<div class="col-lg-12">
			
		</div>
	</div>

	<div class="row mt-3 ml-3 mr-3">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
				    <?php echo "Welcome back,"." ".$_SESSION['login_name']. " !"?>		 <!-- ".$_SESSION['login_name']."			 -->
				</div>
				<div class="row">
				    <div class="alert alert-success col-md-3 ml-4">
					    <p><b><large>Daily Sales(Php)</large></b></p>
				    <hr>
					    <p class="text-right"><b><large><?php 
					    include 'db_connect.php';
					    $sales = $conn->query("SELECT SUM(total_amount) as amount FROM sales_list where date(date_updated)= '".date('Y-m-d')."'");
					    echo $sales->num_rows > 0 ? number_format($sales->fetch_array()['amount'],2) : "0.00";

					    ?></large></b></p>
				    </div>
					<div class="alert alert-warning col-md-3 ml-4">
					    <p><b><large>Weekly Sales(Php)</large></b></p>
				    <hr>
					    <p class="text-right"><b><large><?php 
					    include 'db_connect.php';
					    $sales = $conn->query("SELECT SUM(total_amount) as week_amount FROM sales_list where week(date_updated)= week(now())");
					    echo $sales->num_rows > 0 ? number_format($sales->fetch_array()['week_amount'],2) : "0.00";

					    ?></large></b></p>
				    </div>
					<div class="alert alert-primary col-md-3 ml-4">
					    <p><b><large>Monthly Sales(Php)</large></b></p>
				    <hr>
					    <p class="text-right"><b><large><?php 
					    include 'db_connect.php';
					    $sales = $conn->query("SELECT SUM(total_amount) as month_amount FROM sales_list where month(date_updated)= month(now())");
					    echo $sales->num_rows > 0 ? number_format($sales->fetch_array()['month_amount'],2) : "0.00";

					    ?></large></b></p>
				    </div>
				    <div class="alert alert-dark col-md-3 ml-4">
					    <p><b><large>Total Customer</large></b></p>
					    <hr>
					    <p class="text-right"><b><large><?php
					    include 'db_connect.php';
					    $customer = $conn->query("SELECT * FROM customer_list");
					    echo $customer->num_rows;
					    ?></large></b></p>
				    </div>
				    <div class="alert alert-danger col-md-3 ml-4">
					    <p><b><large>Total Products</large></b></p>
					    <hr>
					    <p class="text-right"><b><large><?php
					    include 'db_connect.php';
					    $product = $conn->query("SELECT * FROM product_list");
					    echo $product->num_rows;
					    ?></large></b></p>
				    </div>
				    <div class="alert alert-secondary col-md-3 ml-4">
					    <p><b><large>Total Supplier</large></b></p>
					    <hr>
					    <p class="text-right"><b><large><?php
					    include 'db_connect.php';
					    $supplier = $conn->query("SELECT * FROM supplier_list");
					    echo $supplier->num_rows;
					    ?></large></b></p>
				    </div>
				</div>
			</div>
			
		</div>
		</div>
	</div>

</div>
<script>
	
</script>