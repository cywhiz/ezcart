<!-- Search product by name or keyword -->

<form name="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get"> 
	<input name="inpname" type="text" id="inpname" size="50" value="Type in product name or keyword" name="s" id="s" onblur="if(this.value=='') this.value='Type in product name or keyword';" onfocus="if(this.value=='Type in product name or keyword') this.value='';" > 
	<input type="submit" name="search" value="Search"> 
</form>