<?php
$identity = Yii::$app->user->identity;
$UserName = $identity->FirstName;
?>
<div class="app-bar brown" data-role="appbar">
	<div class="container">
		<a class="app-bar-element branding" href="<?= $baseUrl; ?>/studentapplication">Ritman University</a>
                    <span class="app-bar-divider"></span>
		<ul class="app-bar-menu">
			<li data-flexorder="1" data-flexorderorigin="0"><a href="<?= $baseUrl; ?>/courseregistration">Home</a></li>
			<li data-flexorder="2" data-flexorderorigin="1"><a href="<?= $baseUrl; ?>/leaveapplication">Leave Application</a></li>
			<li data-flexorder="3" data-flexorderorigin="2"><a href="<?= $baseUrl; ?>/purchaserequisition">Purchase Requisitions</a></li>
			<li data-flexorder="4" data-flexorderorigin="3"><a href="<?= $baseUrl; ?>/clearanceentries">Students Clearances</a></li>
			<li data-flexorder="4" data-flexorderorigin="3"><a href="<?= $baseUrl; ?>/imprestrequest">Imprest Requests</a></li>
			<li data-flexorder="5" data-flexorderorigin="4"><a href="<?= $baseUrl; ?>/storerequisition">Store requisitions</a></li>
			<li data-flexorder="6" data-flexorderorigin="5"><a href="<?= $baseUrl; ?>/loanapplications">Loan Applications</a></li>
			<li data-flexorder="7" data-flexorderorigin="6"><a href="<?= $baseUrl; ?>/trainingrequest">Training Requests</a></li>
			<li data-flexorder="8" data-flexorderorigin="7"><a href="<?= $baseUrl; ?>/customerelationship">Support</a></li>
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