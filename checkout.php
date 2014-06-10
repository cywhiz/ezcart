<!-- ========== Includes global functions ========== -->

<?php
    require_once('incl/mysql.php');			// MySQL functions
    require_once('incl/global.php');		// Database login info
    require_once('incl/functions.php');		// Shopping cart functions
    session_start();
?>

<!-- ========== Verify user input and display error message for invalid data ========== -->

<script type="text/javascript" language="javascript">
	function checkShippingAndPaymentInfo() {
		if (document.frmCheckout.txtFirstName.value == '') {
			alert('enter first name');
			return false;
		}
		else if (document.frmCheckout.txtLastName.value == '') {
			alert('Enter last name');
			return false;
		}
		else if (document.frmCheckout.txtAddress.value == '') {
			alert('Enter address');
			return false;
		}
		else if (document.frmCheckout.txtPhone.value == '') {
			alert('Enter phone number');
			return false;
		}
		else if (document.frmCheckout.txtCity.value == '') {
			alert('Enter city');
			return false;
		}
		else if (document.frmCheckout.txtPostalcode.value == '') {
			alert('Enter postal code');
			return false;
		}
		else if (document.frmCheckout.txtCreditcard.value == '') {
			alert('Enter credit card number');
			return false;
		}
		else
			return true;
	}
</script>

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
	<h1>Shipping And Payment Information</h1>
</div>

<!-- ========== Checkout form ========== -->

<div id="booklist">
<form action="confirm.php" method="post" name="frmCheckout" id="frmCheckout" onSubmit="return checkShippingAndPaymentInfo()">
	<table width="100%" border="0" align="center" cellspacing="10" class="entryTable">
		<tr>
			<td width="200" class="label">First Name</td>
			<td class="content"><input name="txtFirstName" type="text" class="box" id="txtFirstName" size="30" maxlength="50"></td>
		</tr>
		<tr>
			<td width="200" class="label">Last Name</td>
			<td class="content"><input name="txtLastName" type="text" class="box" id="txtLastName" size="30" maxlength="50"></td>
		</tr>
		<tr>
			<td width="200" class="label">Address</td>
			<td class="content"><input name="txtAddress" type="text" class="box" id="txtAddress" size="30" maxlength="100"></td>
		</tr>
		<tr>
			<td width="200" class="label">Phone Number</td>
			<td class="content"><input name="txtPhone" type="text" class="box" id="txtPhone" size="30" maxlength="32"></td>
		</tr>
		<tr>
			<td width="200" class="label">Province</td>
			<td class="content">
			<select name="province" size="1" id="province">
				<option value="AB">Alberta</option>
				<option value="BC">British Columbia</option>
				<option value="MB">Manitoba</option>
				<option value="NB">New Brunswick</option>
				<option value="NL">Newfoundland and Labrador</option>
				<option value="NT">Northwest Territories</option>
				<option value="NS">Nova Scotia</option>
				<option value="NU">Nunavut</option>
				<option value="ON">Ontario</option>
				<option value="PE">Prince Edward Island</option>
				<option value="QC">Quebec</option>
				<option value="SK">Saskatchewan</option>
				<option value="YT">Yukon</option>
			</select>
			</td>
		</tr>
		<tr>
			<td width="200" class="label">City</td>
			<td class="content"><input name="txtCity" type="text" class="box" id="txtCity" size="30" maxlength="32"></td>
		</tr>
		<tr>
			<td width="200" class="label">Postal Code</td>
			<td class="content"><input name="txtPostalcode" type="text" class="box" id="txtPostalcode" size="30" maxlength="32"></td>
		</tr>
		<tr>
			<td width="200" class="label">Credit Card Number</td>
			<td class="content">
				<input name="txtCreditcard" type="text" class="box" id="txtCreditCard" size="30" maxlength="32">
				<select name="cc" size="1" id="cc">
					<option value="Visa">Visa</option>
					<option value="MC">Mastercard</option>
					<option value="Amex">American Express</option>
				</select>
			</td>
		</tr>
		</table>

		<table width="550" border="0" align="center" cellspacing="10" class="entryTable">
			<tr>
				<td width="200" class="entryTableHeader">Payment Method</td>
				<td class="content">
					<input name="optPayment" type="radio" id="optCC" value="cc" checked="checked" />
					<label for="optCC" style="cursor:pointer">Credit Card </label>
					<input name="optPayment" type="radio" value="check" id="optCheck" />
					<label for="optCheck" style="cursor:pointer">Check </label>
				</td>
			</tr>
		</table>

		<table width="550" border="0" align="center" cellspacing="10" class="entryTable">
			<tr>
				<td width="200" class="entryTableHeader">Note:</td>
				<td class="content">If you want to pay by check, please write check payable to "CPJ655" and mail it to:<br>1750 Finch Ave. East<br>Toronto, Ontario<br>M2J 2X5</td>
			</tr>
		</table>
		<p> &nbsp; </p>
		<p align="center">
			<input class="box" name="btnStep2" type="reset" id="btnStep2" value="Reset"><input class="box" name="btnStep1" type="submit" id="btnStep1" value="Submit">
		</p>
	</form>
</div>

<br>

<!-- ========== Footer ========== -->

<div id="footer">
	<?php include('footer.php'); ?>						<!-- Footer file -->
</div>

</body>
</html>
