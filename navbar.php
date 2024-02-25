<nav id="sidebar" class='mx-lt-5 bg-dark'>
		
		<div class="sidebar-list">

				<a href="index.php?page=dashboard" class="nav-item nav-dashboard"><span class='icon-field'><i class="fa fa-bars"></i></span> Dashboard</a>
				<a href="index.php?page=sales" class="nav-item nav-sales"><span class='icon-field'><i class="fa fa-shopping-cart"></i></span> Sales</a>
				<a href="index.php?page=inventory" class="nav-item nav-inventory"><span class='icon-field'><i class="fa fa-list-alt"></i></span> Inventory</a>
				<a href="index.php?page=receiving" class="nav-item nav-receiving nav-manage_receiving"><span class='icon-field'><i class="fas fa-id-card"></i></span> Receiving</a>
				<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fas fa-book"></i></span> Category</a>
				<a href="index.php?page=product" class="nav-item nav-product"><span class='icon-field'><i class="fas fa-box"></i></span> Product</a>
				<a href="index.php?page=supplier" class="nav-item nav-supplier"><span class='icon-field'><i class="fas fa-id-card-alt"></i></span> Supplier</a>
				<a href="index.php?page=customer" class="nav-item nav-customer"><span class='icon-field'><i class="fa fa-users"></i></span> Customer</a>
				<a href="index.php?page=sales_report" class="nav-item nav-sales_report"><span class='icon-field'><i class="fa fa-file-alt"></i></span> Sales Report</a>
				
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=accounts" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-user-circle"></i></span> Accounts</a>
			    <?php endif; ?>
			<br>
		</div>
		<div class="hero-unit-clock">
			<form name="clock" style="margin-left: 2.5rem;">
				<font color="white"><span class="icon-field"><i class="fa fa-clock"></i></span> <b>Time Check: </b><br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
		    </form>
		</div>

		
		
</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<?php if($_SESSION['login_type'] != 1): ?>
	<style>
		.nav-item, .nav-sales_record{
			display: none!important;
		}
		.nav-sales ,.nav-dashboard{
			display: block!important;
		}
	</style>
<?php endif ?>

<script language="javascript" type="text/javascript">
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</script>	