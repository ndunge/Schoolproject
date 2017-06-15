<?php
$identity = Yii::$app->user->identity;
$UserName = $identity->FirstName;
?>
<div class="app-bar brown" data-role="appbar">
	<div class="container">
		<a class="app-bar-element branding">Ritman University</a>
                    <span class="app-bar-divider"></span>
		<ul class="app-bar-menu">
			<li data-flexorder="1" data-flexorderorigin="0"><a href="<?= $baseUrl; ?>/studentapplication">Home</a></li>
			<li data-flexorder="3" data-flexorderorigin="0"><a href="<?= $baseUrl; ?>/aboutus">About us</a></li>
			<li data-flexorder="3" data-flexorderorigin="0"><a href="<?= $baseUrl; ?>/support">Support</a></li>
		</ul>
		<div class="app-bar-element place-right">
			<span class="dropdown-toggle"><span class="mif-cog"></span> <?php echo "$UserName"; ?></span>       
			<ul class="d-menu place-right" data-role="dropdown">
				<li><a href="<?php echo $baseUrl; ?>/site/profile" style="padding-left:20px">My Profile</a></li>
				<li><a href="<?php echo $baseUrl; ?>/site/changepassword" style="padding-left:20px">Change Password</a></li>
				<li class="divider"></li>
				<li><a href="<?php echo $baseUrl; ?>/site/logout" style="padding-left:20px">Logout</a></li>
			</ul>
		</div> 
	</div>
</div> 