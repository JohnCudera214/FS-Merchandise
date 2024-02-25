<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 5px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
  .navbar-custom {
    background-color: #008060;
    position: fixed;
    top: 0px;
    width: 100%;
    z-index: 2;
}
</style>

<nav class="navbar navbar-custom" style="padding:0;">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  			<div class="logo">
  				<i class="fa fa-store"></i>
  			</div>
  		</div>
      <div class="col-md-4 float-left text-white" style="margin-top: 7px;">
        <h5><b>FEEL STORE MERCHANDISE</b></h5>
      </div>
	  	<div class="col-md-2 float-right text-white" style="margin-top: 5px;">
	  		<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
	    </div>
    </div>
  </div>
  
</nav>