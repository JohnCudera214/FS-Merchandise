<div class="container-fluid">
    <div class="col-lg-12">
        <div class="tab-content">
            <div class="tab-pane fade show active" role="tabpanel">
                <div class="card">
                    <div class="card-header" style="background-color: #98ba7d; display:flex;">
                        <h4><b>Sales Report</b></h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
						    <li class="nav-item">
							    <a class="nav-link active" data-toggle="tab" href="#topSelling"><small><b>TOP SELLING</b></small></a>
						    </li>
						    <li class="nav-item">
							    <a class="nav-link" data-toggle="tab" href="#salesReport"><small><b>SALES</b></small></a>
						    </li>
					    </ul>
                        <div class="tab-content">
                            <div id="topSelling" class="container-fluid tab-pane fade">
								<br>
								<div class="row">
									<div class="form-group col-md-6">
										<p><b>Top Selling Product of Feel Store Merchandise</b></p>
									</div>
									<div class="form-group col-md-6">
										<button class="btn btn-sm btn-dark float-right" id="printTopSelling"><i class="fa fa-print"></i><small> PRINT</small></button>
									</div>
								</div>
								<form> 
							      <div class="card-body"><?php include 'topSelling.php'?></div>
							    </form>
						    </div>
							<div id="salesReport" class="container-fluid tab-pane fade">
								<br>
							    <div class="row">
									<div class="form-group col-md-6">
										<p><b>Total Sales of Feel Store Merchandise</b></p>
									</div>
									<div class="form-group col-md-6">
										<button class="btn btn-sm btn-dark float-right" id="prints"><i class="fa fa-print"></i><small> PRINT</small></button>
									</div>
								</div>
							    <form> 
							      <div class="card-body"><?php include 'salesReport_Table.php'?></div>
							    </form>
							    <br><br>
							    <!-- <div class="table-responsive" id="saleReportsTableDiv"></div> -->
						    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	
</script>
