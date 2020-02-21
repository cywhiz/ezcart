<!-- ========== Includes global functions ========== -->

<?php
    require_once('incl/mysql.php');			// MySQL functions
    require_once('incl/global.php');		// Database login info
    require_once('incl/functions.php');		// Shopping cart functions
    session_start();
?>
	
<html>
<head>
	<title>EZ Cart Online</title>
	<link rel="stylesheet" href="css/styles.css" />		<!-- Stylesheet file -->
</head>
<body>

<!-- ========== Header and search function ========== -->

<div id="header">
	<?php include('header.php'); ?>		<!-- Header file -->
	<br>
	<?php include('search.php'); ?>		<!-- Search function -->
	<br>
</div>

<!-- ========== Display categories ========== -->

<div id="booklist">
<?php
	// User makes a search and then display search results
    if (isset($_GET['search'])) {
		$output[] = '<h1>Search Results</h1>';
        $inp = $_GET['inpname'];
        $sql = "SELECT * FROM books WHERE title LIKE '%".$inp."%' order by id";
        $result = $db->query($sql);
        $output[] = '<table width="80%" border="1" align="center">';
        $row = $result->fetch();
        if ($row == 0) {
            $output[] = '<tr>'. '<td>'.$inp.' is not found.</td>'. '</tr>';
        }
		else {
            while ($row != 0) {
                $output[] = '<tr>'. '<td align=center><img width="100px" height="100px" src=images/'.$row['image'].'></td>'. '<td>'.$row['title'].'</td>'. '<td>$'.$row['price'].'</td>'. '<td>'.'<a href="cart.php?action=add&id='.$row['id'].'"><img src="images/add.gif" border="0" /></a></td>'.'</tr>';
                $row = $result->fetch();
            }
        }
        $output[] = '</table>';
        echo join('', $output);
    }
	// User did not make a search, display categories
	else {
		$output[] = '<h1>'.$_GET['catname'].'</h1>';
        $sql = 'SELECT * FROM books where cat_id = '.$_GET['catid'].' order by id';
        $result = $db->query($sql);
        $output[] = '<table width="80%" border="1" align="center">';
        while ($row = $result->fetch()) {
            $output[] = '<tr>'. '<td align=center><img width="100px" height="100px" src=images/'.$row['image'].'></td>'. '<td>'.$row['title'].'</td>'. '<td>$'.$row['price'].'</td>'. '<td>'.'<a href="cart.php?action=add&id='.$row['id'].'"><img src="images/add.gif" border="0" /></a></td>'.'</tr>';
        }
        $output[] = '</table>';
        echo join('', $output);
    }
?>
</div>

<br>

<!-- ========== Footer ========== -->

<div id="footer">
	<?php include('footer.php'); ?>						<!-- Footer file -->
</div>

</body>
</html>
