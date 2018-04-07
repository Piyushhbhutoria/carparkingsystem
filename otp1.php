<?php
session_start();
include('config.php');

$car = $_POST['car'];
$otp1 = $_POST['otp1'];
$date = $_POST['datetimelocal'];

$qry = mysql_query("SELECT * FROM logtable WHERE otp1='$otp1' ");
$qry1 = mysql_num_rows($qry);
if($qry1)
{
	$row = mysql_fetch_array($qry);
	if($row['carno'] == $car)
	{
		$sql = mysql_query("UPDATE logtable SET fromtime='$date', status='Park' WHERE otp1='$otp1' ");
		$lot = $row['lotname'];
		$sql5 = mysql_query("UPDATE lot SET status='Booked' WHERE lotname='$lot' ");
		?>
		<script type="text/javascript">
			alert ("Park your Car.");
			window.location.href = "verify.php";
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert ("Invalid Credentials!");
			window.location.href = "verify.php";
		</script>
		<?php
	}
}
else
{
	?>
		<script type="text/javascript">
			alert ("Invalid OTP!");
			window.location.href = "verify.php";
		</script>
	<?php
}

?>