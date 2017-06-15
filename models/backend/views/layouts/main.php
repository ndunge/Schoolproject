<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

$baseUrl = Yii::$app->request->baseUrl;

AppAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image" href="images/favi.png"/>
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
	<script src="<?= $baseUrl; ?>/metro/js/jquery-2.1.3.js"></script>
	<script src="<?= $baseUrl; ?>/metro/js/metro.js"></script>
	<script src="<?php echo $baseUrl; ?>/js/jquery.dataTables.min.js"></script>
<!--	<script src="--><?//= $baseUrl; ?><!--/metro/js/cards.js"></script>-->
	<script src="<?= $baseUrl; ?>/js/sha512.js"></script>
	<script src="<?= $baseUrl; ?>/js/forms.js"></script>
	<script src="<?= $baseUrl; ?>/js/scripts.js"></script>

</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
	<header class="margin20 no-margin-left no-margin-right no-margin-top">
		<div class="container">
			<div class="pure-g">
				<div class="pure-u-1 pure-u-md-1-2">
					<div class="image-container">
						<div class="frame"><img src="<?= $baseUrl; ?>/images/logo.png"/></div>
					</div>
				</div>
				<div class="pure-u-1 pure-u-md-1-2">

				</div>
			</div>
		</div>
		<?php
		if (Yii::$app->user->isGuest) {
			include 'menu1.php';
		} else {
			$identity = Yii::$app->user->identity;
			if ($identity->AccountTypeID == 1) {
				include 'menu2.php';
			} else {
				include 'menu3.php';
			}
		} ?>
	</header>

	<div class="container">
		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?>
		<?= Alert::widget() ?>
		<?= $content ?>
	</div>
</div>

<footer class="footer">
	<div class="bg-black">
		<div class="container">
			<div class="pure-g">
				<div class="pure-u-1 pure-u-md-3-5">
					<p class="align-left fg-white">&copy; Ritman University 2016. All Rights Reserved.</p>
				</div>
				<div class="pure-u-1 pure-u-md-2-5">
					<p class="align-center fg-white">Powered By: Attan Enterprise Solutions</p>
				</div>
			</div>
		</div>
	</div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
