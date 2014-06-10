<!-- ========== Includes global functions ========== -->

<?php
    require_once('incl/mysql.php');			// MySQL functions
    require_once('incl/global.php');		// Database login info
    require_once('incl/functions.php');		// Shopping cart functions
    session_start();
?>

<!-- ========== Header ========== -->

<html>
<head>
	<title>EZ Cart Online</title>
	<link rel="stylesheet" href="css/styles.css" />		<!-- Stylesheet file -->
</head>
<body>

<div id="header">
	<?php include('header.php'); ?>						<!-- Header file -->
	<br>
	<h1>Confirm Delivery?</h1>
</div>

<!-- ========== Confirm checkout info and redirects to "Thank You" page ========== -->

<div id="booklist">
<form action="thank.php" method="post" name="frmCheckout" id="frmCheckout">
<table width="100%" border="0" align="center" cellspacing="10">
	<tr><td>
		<?php
			echo $_POST["txtFirstName"].' '.$_POST["txtLastName"].'<br>';
			echo $_POST["txtAddress"].'<br>';
			echo $_POST["txtCity"].', '.$_POST["state"].' '.$_POST["txtPostalCode"].'<br>';
			echo $_POST["txtPhone"];
		?>

		<br><br>

		<input class="box" name="btnStep1" type="submit" id="btnStep1" value="OK">
		<input type="button" value="No, I need to make changes." onClick="window.location='checkout.php'">
	</td></tr>
</table>
</form>
</div>

<br>

<!-- ========== Footer ========== -->

<div id="footer">
	<?php include('footer.php'); ?>						<!-- Footer file -->
</div>

</body>
</html>
