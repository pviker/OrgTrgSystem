<?php

	$isAdmin = "";
	if(isset($_SESSION['adminFlag'])){
		if($_SESSION['adminFlag'] == 1){
			$isAdmin = " | <a href='/ics325/OrgTrgSystem/accounts/admin.php'>admin</a>";
		}
	}
	
	
	if(isset($_SESSION['uname'])){

?>

<div class="top-menu">
	<span><a href="/ics325/OrgTrgSystem/index.php">Hi, <?php echo $_SESSION['uname'] ?></a></span>
	<span><?php echo $isAdmin ?></span>
	<span> | <a href="/ics325/OrgTrgSystem/accounts/logout.php">logout</a></span>
	<span></span>
</div>

<?php
	
}

?>