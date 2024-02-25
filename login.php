<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FS Merchandise</title>
 	
<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php
include('db_connect.php');
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=dashboard");

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}
?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    background: #e6e6e6;
		position: fixed;
	}
	.container-fluid, #login-form{
		margin: 8rem 3rem 3rem 11rem;
	}
	.card-header{
		background:  #008060;
		display: flex;
	}
	.card-header .logo{
		margin-left: 5rem;
        font-size: 20px;
        background: #f2f2f2;
        padding: 5px 11px;
        border-radius: 50% 50%;
        color: #000000b3;
	}
	.card-header h3{
		margin-left: 3rem;
		color: #f2f2f2;
	}
</style>

<body>

    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
    </div>


  <!-- <main id="main" class=" bg-dark"> -->

  		<!-- <div id="login-left">
			<div class="text">
				<h1><b>Feel Store Merchandise</b></h1>
				<br>
				<br>
			</div>
  			<div class="logo">
  				<span class="fas fa-store-alt"></span>
  			</div>
  		</div> -->
  		<div class="container-fluid">
  			<div class="col-md-8">
  				<form id="login-form" >
					<div class="card">
					    <div class="card-header">
				            <div class="logo">
  				                <span class="fas fa-store-alt"></span>
  			                </div>
					        <h3><b>Feel Store Merchandise</b></h3>
				        </div>
					    <div class="card-body">
  						    <div class="form-group">
  							    <label for="username" class="control-label"><small><b>USERNAME</b></small></label>
  							    <input type="text" id="username" name="username" class="form-control">
  						    </div>
  					        <div class="form-group">
  							    <label for="password" class="control-label"><small><b>PASSWORD</b></small></label>
  							    <input type="password" id="password" name="password" class="form-control">
  						    </div>
							<br>
							<!-- <div class="row justify-content-center">
								<div class="form-group col-md-3">
								    <button class="btn-sm btn-block btn-wave btn-primary" id="log-in">LOGIN</button>
								</div>
								<div class="form-group col-md-3">
								    <button class="btn-sm btn-block btn-wave btn-warning" id="register-account">REGISTER</button>
								</div>
							</div> -->
						</div>
						<div class="card-footer">
							<div class="row justify-content-center">
							    <div class="form-group col-md-8">
								    <button class="btn btn-block btn-wave btn-primary" id="log-in">LOGIN</button>
								</div>
								<!-- <div class="form-group col-md-3">
								    <button class="btn btn-block btn-wave btn-dark" id="forgot-account">Register</button>
								</div> -->
							</div>
						</div>
					</div>
  				</form>
  			</div>
  		</div>
		
   

  <!-- </main> -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#forgot-account').click(function(){
		//location.href = "forgot_account.php";
		location.href = "register.php";
	})
	$('#log-in').click(function(){
    var username = $('#username').val(),
	    password = $('#password').val();
		if(username == '' || password == ''){
			$('#login-form').prepend('<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button>Enter your username and password first.</div>')
			$('#login-form button[type="button"]').removeAttr('disabled').html();
			// alert_toast("Enter your username and password first.",'warning');
			return false;
		}
		$('#login-form form').submit()
	})
	
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html();

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=dashboard';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html();
					// alert_toast("Username and password is incorrect!",'danger')
					// setTimeout(function(){
					// 	location.reload()
					// },1500)
				}
			}
		})
	})
</script>	
</html>