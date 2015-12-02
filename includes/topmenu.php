<?php

	$isAdmin = "";
	if(isset($_SESSION['adminFlag'])){
		if($_SESSION['adminFlag'] == 1){
			$isAdmin = " | <a href='/ics325/OrgTrgSystem/accounts/admin.php'>admin</a>";
		} else $isAdmin = " | <a href='/ics325/OrgTrgSystem/accounts/changePassword.php'>change password</a>";
	}
	
	
	if(isset($_SESSION['uname'])){

?>

	<div class="top-menu">
		<span><a href="/ics325/OrgTrgSystem/index.php">Hi, <?php echo $_SESSION['uname'] ?></a></span>
		<span><?php echo $isAdmin ?></span>
		<span></span>
		<span> | <a href="/ics325/OrgTrgSystem/accounts/logout.php">logout</a></span>
		<span></span>
	</div>
	<div class="current-year">
		Selected year: <strong><?php echo $_SESSION['currentYear']; ?></strong> <span class="small-link">(<a href="../plans/changeYear.php">change</a>)</span>
	</div>
	

<?php
	
}

?>