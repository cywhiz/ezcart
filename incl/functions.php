<!-- ========== Shopping cart functions ========== -->

<?php
	// ============== Display number of items in shopping cart =============
    function writeShoppingCart() {
        $cart = $_SESSION['cart'];
        if (!$cart) {
            return '<p>You have no items in your shopping cart</p>';
        }
		else {
            $items = explode(',', $cart);
            $s = (count($items) > 1) ? 's' : '';
            return '<p>You have <a href="cart.php">'.count($items).' item'.$s.'</a> in your shopping cart</p>';
        }
    }
	// ============== Show the shopping cart =============
    function showCart() {
        global $db;
        $cart = $_SESSION['cart'];
		// Show cart if the shopping cart contains at least one item
        if ($cart) {
            $items = explode(',', $cart);
            $contents = array();
            foreach ($items as $item) {
                $contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
            }
            $output[] = '<form action="cart.php?action=update" method="post" id="cart">';
            $output[] = '<table width="80%">';
            foreach ($contents as $id => $qty) {
                $sql = 'SELECT * FROM books WHERE id = '.$id;
                $result = $db->query($sql);
                $row = $result->fetch();
                extract($row);
                $output[] = '<tr>';
                $output[] = '<td><a href="cart.php?action=delete&id='.$id.'" class="r">Remove</a></td>';
                $output[] = '<td>'.$title.'</td>';
                $output[] = '<td>$'.number_format($price, 2).'</td>';
                $output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
                $output[] = '<td>$'.number_format($price * $qty, 2).'</td>';
                $total += $price * $qty;
                $output[] = '</tr>';
            }
			
            $output[] = '</table>';
			$gst = 0.05;
			$pst = 0.08;
			$shipping = count($items) * 10;
			$output[] = '<form action="cart.php" method="post">';
            $output[] = '<p>Coupon code <input type="text" name="coupon" size="10" />';          
			$coupon = $_POST["coupon"];

			if ($coupon == "ilovecpj") {
				$coupon = 20;
				$output[] = '<p><font color=red><strong>$20 CPJ student discount!</strong></font></p>';
			}
			else if ($coupon == "shefler") {
				$coupon = $total * 0.5;
				$output[] = '<p><font color=red><strong>50% Off SPECIAL teacher discount!</strong></font></p>';
			}
			else if ($coupon == "freeship") {
				$shipping = 0;
				$output[] = '<p><font color=red><strong>FREE shipping entire order!</strong></font></p>';
			}
			else if ($coupon != '') {
				$coupon = 0;
				$output[] = '<p><font color=red><strong>Invalid code</strong></font></p>';
			}

            $output[] = '<p align="right">Sub total: <strong>$'.number_format($total, 2).'</strong></p>';
			$total -= $coupon;
            $output[] = '<p align="right">GST (5%): <strong>$'.number_format($total * $gst, 2).'</strong></p>';
            $output[] = '<p align="right">PST (8%): <strong>$'.number_format($total * $pst, 2).'</strong></p>';
			$output[] = '<p align="right">Shipping: <strong>$'.number_format($shipping, 2).'</strong></p>';

			if ($coupon > 0)
				$output[] = '<p align="right"><font color=red>Discount: <strong>$'.number_format($coupon, 2).'</strong></font></p>';
			
            $output[] = '<p align="right">--------------------</p>';
			$total = $total * (1 + $gst + $pst) + $shipping;
            $output[] = '<h1 align="right">TOTAL: <strong>$'.number_format($total, 2).'</strong></h1>';
			$output[] = '<p align="right"><a href="checkout.php"><img src="images/checkout.gif" border="0" /></a></p>';
            $output[] = '<button type="submit">Update cart</button>';
            $output[] = '<input type="button" value="Empty cart" onClick="window.location=\'cart.php?action=empty\'">';
            $output[] = '</form>';
			$output[] = '<p><a href="index.php">Continue shopping?</a></p>';
        }
		// Display a message if the shopping cart is empty, does not show cart
		else {
            $output[] = '<p>Your shopping cart is EMPTY!</p>';
			$output[] = '<p><a href="index.php">Continue shopping?</a></p>';
        }
        return join('', $output);
    }
?>