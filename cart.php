<!-- ========== Includes global functions ========== -->

<?php
    require_once('incl/mysql.php');			// MySQL functions
    require_once('incl/global.php');		// Database login info
    require_once('incl/functions.php');		// Shopping cart functions
    session_start();

    $cart = $_SESSION['cart'];
    $action = $_GET['action'];

    switch ($action) {
		// ============== Add items to cart =============
        case 'add':
        if ($cart) {
            $cart .= ','.$_GET['id'];
        }
		else {
            $cart = $_GET['id'];
        }
        break;
		// ============== Remove items from cart =============
        case 'delete':
        if ($cart) {
            $items = explode(',', $cart);
            $newcart = '';
            foreach ($items as $item) {
                if ($_GET['id'] != $item) {
                    if ($newcart != '') {
                        $newcart .= ','.$item;
                    }
					else {
                        $newcart = $item;
                    }
                }
            }
            $cart = $newcart;
        }
        break;
		// ============== Empty cart =============
        case 'empty':
        $cart = '';
        break;
		// ============== Update items in cart =============
        case 'update':
        if ($cart) {
            $newcart = '';
            foreach ($_POST as $key => $value) {
                if (stristr($key, 'qty')) {
                    $id = str_replace('qty', '', $key);
                    $items = ($newcart != '') ? explode(',', $newcart) :
                    explode(',', $cart);
                    $newcart = '';
                    foreach ($items as $item) {
                        if ($id != $item) {
                            if ($newcart != '') {
                                $newcart .= ','.$item;
                            }
							else {
                                $newcart = $item;
                            }
                        }
                    }
                    for ($i = 1; $i <= $value; $i++) {
                        if ($newcart != '') {
                            $newcart .= ','.$id;
                        }
						else {
                            $newcart = $id;
                        }
                    }
                }
            }
        }
        $cart = $newcart;
        break;
    }
    $_SESSION['cart'] = $cart;
?>

<!-- ========== Header ========== -->

<html>
<head>
	<title>EZCart Online</title>
	<link rel="stylesheet" href="css/styles.css" />		<!-- Stylesheet file -->
</head>

<body>
<div id="header">
	<?php include('header.php'); ?>						<!-- Header file -->
</div>

<br>

<!-- ========== Show shopping cart details ========== -->

<div id="contents">
	<h1>Update/Remove Items</h1>
	<?php echo showCart() ?>
</div>

<br>

<!-- ========== Footer ========== -->

<div id="footer">
	<?php include('footer.php'); ?>						<!-- Footer file -->
</div>

</body>
</html>
