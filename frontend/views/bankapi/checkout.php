<?php
// print_r($response); 
// exit;
$params = Yii::$app->request->get();
?>


<?php $successful = $params['successful'];?>
<div style="padding: 1rem; background: <?= $successful ? 'blue' : 'red' ?>">
	<?php if ($successful): ?>
		<h5> Transaction <?= $response['ResponseDescription'] ?></h5>
		<dl>
			<dt> Amount </dt>
			<dd> <?= $response['Amount'] ?> </dd>
			<dt> Customer Name </dt>
			<dd> <?= $response['Amount'] ?> </dd>
			<dt> PaymentReference </dt>
			<dd> <?= $response['PaymentReference'] ?> </dd>
			<dt> TransactionDate </dt>
			<dd> <?= $response['TransactionDate'] ?></dd>

		</dl>
	<?php else: ?>
		<div > 
			<p> <strong> Your transaction was not successful </strong> </p>
			<p> Reason: <?= $response['ResponseDescription'] ?> </p>

			
			<dl>
				<dt> Tranaction Reference </dt>
				<dd> <?= $params['txnref'] ?> </dd>
			</dl>
		</div>
	<?php endif ?>
</div>