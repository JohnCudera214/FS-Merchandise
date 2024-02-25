<!DOCTYPE html>
<html>
<head>
    <title>Feel Store Merchandise</title>

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
</head>
<body style="background-color: #e6e6e6; position: fixed;">
    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white"></div>
    </div>
    <div class="d-xl-flex p-2 justify-content-center" style="margin-top: 1.5rem;">
        <div class="col-md-4">
            <form action="" id="register-account">
                <div class="card">
                    <div class="card-header"  style="background-color: #008060;">
                        <h5><center><b style="color: white;">Register Account</b></center></h5>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="<?php echo isset($meta['password']) ? $meta['password']: '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="type">User Type</label>
                            <select name="type" id="type" class="custom-select">
                               <!-- <option value="1" <?php //echo isset($meta['type']) && $meta['type'] == 1 ? 'selected': '' ?>>Admin</option> -->
                                <option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected': '' ?>>Cashier</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" id="register">Register</button>
                        <button class="btn btn-secondary" id="cancel">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    // $('#register').click(function(){
    // var name = $('#name').val(),
	// 	  username = $('#username').val(),
	// 		password = $('#password').val(),
    //   type = $('#type').val();
	// 	if(name == '' || username == '' || password == ''){
	// 		alert_toast("Please complete the form first.",'danger');
	// 		return false;
	// 	}
	// 	$('#uni_modal form').submit()
	// })

    $(document).ready(function() {
        $("#cancel").click(function() {
            window.location.href = "login.php";
         });
    });

    //try if it is register
    $('#register-account').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
			method:'POST',
            type: 'POST',
			data: new FormData($(this)[0]),
			success:function(resp){
				if(resp > 0){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})

    //alert toast
    window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
    }
    $(document).ready(function(){
      $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
    })
</script>

</html>