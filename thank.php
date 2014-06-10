<!-- ========== Header ========== -->

<html>
<head>
	<title> EZ Cart Online </title>
	<link rel="stylesheet" href="css/styles.css" />		<!-- Stylesheet file -->
</head>
<body>

<div id="header">
	<h1><a href="index.php"><img src="images/logo.gif" border="0" /></a></h1>
	<h1>Thank you for your business!</h1>
</div>

<!-- Redirect to homepage after user checks out -->

<div id="booklist">
	<form name=loading><p align=center>
		<br>You will be redirected to the homepage shortly!<br><br>
		
		<input
			style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px; FONT-WEIGHT: bolder; PADDING-BOTTOM: 0px; COLOR: #000000; BORDER-TOP-style: none; PADDING-TOP: 0px; FONT-FAMILY: Arial; BORDER-RIGHT-style: none; BORDER-LEFT-style: none; BACKGROUND-COLOR: white; BORDER-BOTTOM-style: none"
			size=46 name=chart> <br>
		<input
			style="BORDER-RIGHT: medium none; BORDER-TOP: medium none; BORDER-LEFT: medium none; COLOR: #000000; BORDER-BOTTOM: medium none; TEXT-ALIGN: center"
			size=47 name=percent>

		<!-- Redirect script (count 10 seconds) -->

		<script type="text/javascript" language="javascript">
			var bar=0
			var line="||"
			var amount="||"
			count()
			function count() {
				bar=bar+2
				amount=amount + line
				document.loading.chart.value=amount
				document.loading.percent.value=bar+"%"
				if (bar <99) {
					setTimeout("count()", 100);
				}
				else {
					window.location="index.php";
				}
			}
		</script>
	</form>
</div>

<br>

<!-- ========== Footer ========== -->

<div id="footer">
	<?php include('footer.php'); ?>						<!-- Footer file -->
</div>

</body>
</html>
