<?php
use yii\helpers\Url;

$UserName = "Joseph";
?>
<div class="app-bar blue" data-role="appbar">
	<div class="container">
		<ul class="app-bar-menu">
			<li data-flexorder="1" data-flexorderorigin="0"><a href="<?= Url::to(['site/login'])?>">Home</a></li>
			<li data-flexorder="3" data-flexorderorigin="1"><a href="<?= Url::to(['site/login'])?>">Login</a></li>
		</ul>
	</div>
</div>      