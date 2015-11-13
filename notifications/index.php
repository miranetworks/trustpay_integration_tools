<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Notifications / TrustPay</title>
	<style>
		.container { width: 800px; margin: 0px auto; }
		.header { border-bottom: 1px solid #eeeeee; margin-bottom: 20px;}
		.center {text-align: center;}
		.description { font-family: sans-serif; font-weight: 300; font-size: 14px; }
		.in-grey {border: 4px solid #d2d2d2; padding-top: 10px; padding-bottom: 10px; }
		.in-red {border: 4px solid #f00; padding-top: 10px; padding-bottom: 10px;}
		a, a:visited, a:link { color: #01adef; }
		p { margin: 0px; font-family: sans-serif; font-weight: 300; }
		pre, .pre { font-family: monospace; background: #eee; padding: 20px; margin-bottom: 20px;}
		form { padding: 5px 0px; width: 430px; margin: 40px auto; }
		label,input,select,textarea { display: block; outline: none; }
		label { border: 4px solid #fff; margin-bottom: 25px; font-family: sans-serif; font-weight: 300; padding-left: 10px; padding-right: 10px; }
		label span { font-family: sans-serif; font-weight: 300; font-size: 12px; padding-top: 5px; display: block; }
		select { margin-top: 5px; width: 400px; height: 35px; padding: 10px 5px; border-radius: 0px; border: 1px solid #939499; background: #ffffff; }
		textarea { margin-top: 5px; width: 390px; height: 50px; padding: 10px 5px; border-radius: 0px; border: 1px solid #939499; }
		input[type="text"],input[type="number"] { margin-top: 5px; border: 1px solid #939499; padding: 0px 10px; width: 380px; height: 35px; }
		input[disabled] { background: #dddddd; }
		input[type="submit"] { margin-left: 15px; margin-top: 40px; border: 0px none; padding: 15px 35px; background: #01adef; color: #fff; -webkit-transition: background 1s; transition: background 1s; }
		input[type="submit"]:hover { background: #0290c5; }
	</style>
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div class="container">

		<!-- Trustpay Logo -->
		<p class="center header">
			<img src="trustpay.jpg" alt="TrustPay"/>
		</p>

		<form action="results.php" name="form" id="form" method="get">

			<!-- Notification URL -->
			<label for="notification_url" class="in-grey">
				Notification URL (Required):
				<input type="text" name="notification_url" id="notification_url" value=""/>
				<span>The Notification URL is a HTTP endpoint where you wants to receive payment notifications.</span>
			</label>

			<!-- Vendor Id / Application_id -->
			<label for="application_id">
				Application Id (Required):
				<input type="text" name="application_id" id="application_id" value=""/>
				<span>The Vendor_id assigned to your application on my.trustpay.biz</span>
			</label>

			<!-- Amount -->
			<label for="amount">
				Amount (Required):
				<input type="number" step="0.01" name="amount" id="amount" value=""/>
				<span>The amount that the transaction was for.</span>
			</label>

			<!-- Consumer Message -->
			<label for="consumermessage">
				Consumer Message (optional):
				<textarea type="text" name="consumermessage" id="consumermessage"></textarea>
				<span>A message for the user if the transaction failed, the developer can choose to relay the message to the user or to ignore the message.</span>
			</label>

			<!-- Currency -->
			<label for="currency">
				Currency (Required):
				<select name="currency" id="currency">
					<option value="USD">USD</option>
					<option value="ZAR">ZAR</option>
				</select>
				<span>The currency that the transaction took place in.</span>
			</label>

			<!-- Description -->
			<label for="description">
				Description (required):
				<textarea type="text" name="description" id="description"></textarea>
				<span>The description for the transaction, created by the developer and passed to TrustPay billing API endpoint.</span>
			</label>

			<!-- isTest (istest) -->
			<label for="istest">
				Is Test? (required):
				<select name="istest" id="istest">
					<option value="true">True</option>
					<option value="false">False</option>
				</select>
				<span>Indicates if this is a LIVE or a TEST transaction. Product should only be released if the transaction is a LIVE transaction.</span>
			</label>

			<!-- Method -->
			<label for="method">
				Method (Required):
				<select name="method" id="method">
					<option value="CARRIER BILLING">CARRIER BILLING</option>
					<span>The payment method that was used to process the transaction.</span>
				</select>
			</label>

			<!-- Status -->
			<label for="status">
				Status (Required):
				<select name="status" id="status">
					<option value="SUCCESS">SUCCESS</option>
					<option value="FAILED">FAILED</option>
				</select>
			</label>

			<!-- tp_transaction_id -->
			<label for="tp_transaction_id">
				Trustpay Transaction Id (Required):
				<input type="text" name="tp_transaction_id" id="tp_transaction_id" value=""/>
				<span>The transaction id that TustPay creates and assigns to the transaction.</span>
			</label>

			<!-- transaction_id -->
			<label for="transaction_id">
				Transaction Id (Required):
				<input type="text" name="transaction_id" id="transaction_id" value=""/>
				<span>The developer's transaction id that gets passed to TrustPay billing API endpoint (by developer).</span>
			</label>

			<!-- Transaction Time -->
			<label for="transaction_time">
				Transaction Time (Required):
				<input type="text" name="transaction_time" id="transaction_time" value="<?php printf('%sT%sZ', date('Y-m-d'), date('H:i:s') ); ?>"/>
				<span>The server date and time that the transaction result was received. This will be in GMT.</span>
			</label>

			<!-- User Id -->
			<label for="user_id">
				User Id (Required):
				<input type="text" name="user_id" id="user_id" value="" />
				<span>The user id that gets passed to TrustPay billing API endpoint (by developer).</span>
			</label>

			<!-- Shared Secret -->
			<label for="tmp_shared_secret" class="in-red">
				Shared Secret (required):
				<input type="text" name="tmp_shared_secret" id="tmp_shared_secret" value="" />
				<span>Shared Secret value will not be sent to your notification URL. This field is used to simplify this testing tool and sign request with oAuth automatically. Please, refer to results.php file for more details.</span>
			</label>

			<!-- oauth_consumer_key -->
			<label for="oauth_consumer_key">
				oAuth Consumer Key:
				<input type="text" name="oauth_consumer_key" id="oauth_consumer_key" value="" disabled />
				<span>The application's vendor_id as created by TrustPay on my.trustpay.biz when the application gets registered. Please, refer to results.php file for more details.</span>
			</label>

			<!-- oauth_nonce -->
			<label for="oauth_nonce">
				oAuth Nonce:
				<input type="text" name="oauth_nonce" id="oauth_nonce" value="" disabled />
				<span>Part of OAuth protocol. Please, refer to results.php file for more details.</span>
			</label>

			<!-- oauth_signature -->
			<label for="oauth_signature">
				oAuth Signature:
				<input type="text" name="oauth_signature" id="oauth_signature" value="" disabled />
				<span>Signature gets generated via the Shared Secret using the OAuth methology. Please, refer to results.php file for more details.</span>
			</label>

			<!-- oauth_signature_method -->
			<label for="oauth_signature_method">
				oAuth Signature Method:
				<input type="text" name="oauth_signature_method" id="oauth_signature_method" value="" disabled />
				<span>Part of OAuth protocol. Please, refer to results.php file for more details.</span>
			</label>

			<!-- oauth_timestamp -->
			<label for="oauth_timestamp">
				oAuth Timestamp:
				<input type="text" name="oauth_timestamp" id="oauth_timestamp" value="" disabled />
				<span>Part of OAuth protocol. Please, refer to results.php file for more details.</span>
			</label>

			<!-- oauth_version -->
			<label for="oauth_version">
				oAuth Version:
				<input type="text" name="oauth_version" id="oauth_version" value="" disabled />
				<span>Part of OAuth protocol. Please, refer to results.php file for more details.</span>
			</label>

			<!-- Submit Button -->
			<input type="submit" value="Submit"/>
		</form>
	</div>
</body>
</html>
