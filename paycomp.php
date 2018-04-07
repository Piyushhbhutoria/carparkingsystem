<?php
session_start();
include('config.php');

$id = $_POST['id'];
$fee = $_POST['fee'];
$qry = mysql_query("SELECT * FROM logtable WHERE id='$id' ");
$row = mysql_fetch_array($qry);
$lot = $row['lotname'];
$qry1 = mysql_query("UPDATE logtable SET payment='Paid' WHERE id='$id' ");
$qry2 = mysql_query("UPDATE lot SET status='Free' WHERE lotname='$lot' ");
header("location:dashboard.php");
?>