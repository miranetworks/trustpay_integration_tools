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

		<p>Response:</p>
		<p class="description">Response from your notifications URL.</p>

		<?php
			// URL
			$notification_url  = isset( $_GET['notification_url'] ) ? $_GET['notification_url'] : null;

			// Get all form details
			$application_id    = isset( $_GET['application_id'] ) ? $_GET['application_id'] : null;
			$amount            = isset( $_GET['amount'] ) ? $_GET['amount'] : null;
			$consumermessage   = isset( $_GET['consumermessage'] ) ? $_GET['consumermessage'] : ''; // optional
			$currency          = isset( $_GET['currency'] ) ? $_GET['currency'] : null;
			$description       = isset( $_GET['description'] ) ? $_GET['description'] : null;
			$istest            = isset( $_GET['istest'] ) ? $_GET['istest'] : null;
			$method            = isset( $_GET['method'] ) ? $_GET['method'] : null;
			$status            = isset( $_GET['status'] ) ? $_GET['status'] : null;
			$tp_transaction_id = isset( $_GET['tp_transaction_id'] ) ? $_GET['tp_transaction_id'] : null;
			$transaction_id    = isset( $_GET['transaction_id'] ) ? $_GET['transaction_id'] : null;
			$transaction_time  = isset( $_GET['transaction_time'] ) ? $_GET['transaction_time'] : null;
			$user_id           = isset( $_GET['user_id'] ) ? $_GET['user_id'] : null;

			/**
			 * We will ignore all oauth_ since we going to make signed request using
			 * oAuth and shared secret (tmp_shared_secret) shortly. Here is list
			 * of oauth_ fields for reference:
			 *
			 * oauth_consumer_key
			 * oauth_nonce
			 * oauth_signature
			 * oauth_signature_method
			 * oauth_timestamp
			 * oauth_version
			 */
			 $tmp_shared_secret = isset( $_GET['tmp_shared_secret'] ) ? $_GET['tmp_shared_secret'] : null;

			// We need to check if all required fields are set first since we can't
			// proceed if any of required details are missing (those details will
			// be present in each notification by TrustPay.
			if ( $application_id == null || $amount == null || $currency == null
				|| $description == null || $istest == null || $method == null
				|| $status == null || $tp_transaction_id == null
				|| $transaction_id == null || $transaction_time == null
				|| $user_id == null || $tmp_shared_secret == null
				|| $notification_url == null ) {

				echo '<pre>' . 'Please set all required form fields and try again.' . '</pre>';
				exit();
			}

			// Let's validate URL too
			if ( filter_var( $notification_url, FILTER_VALIDATE_URL ) === false ) {
				echo '<pre>' . 'Notification URL is invalid!' . '</pre>';
				exit();
			}

			/**
			 * First lets put our parameters into array since OAuth expects them
			 * to be passed in that way. We only going to include variables that
			 * are sent from TrustPay API ignoring notification_url
			 * and tmp_shared_secret we set in form.
			 *
			 * Note:
			 * All oauth_ will be added by OAuth class.
			 */
			$extra_params = array(
				'application_id'    => $application_id,
				'amount'            => $amount,
				'consumermessage'   => $consumermessage,
				'currency'          => $currency,
				'description'       => $description,
				'istest'            => $istest,
				'method'            => $method,
				'status'            => $status,
				'tp_transaction_id' => $tp_transaction_id,
				'transaction_id'    => $transaction_id,
				'transaction_time'  => $transaction_time,
				'user_id'           => $user_id
			);

			/**
			 * Time to make a request to notification url provided.
			 * Here is how OAuth constructor looks like (php5-oauth):
			 * __construct ( string $consumer_key , string $consumer_secret [, string $signature_method = OAUTH_SIG_METHOD_HMACSHA1 [, int $auth_type = 0 ]] )
			 *
			 * Note:
			 * We are going to set our $application_id as $consumer_key and
			 * $tmp_shared_secret as $consumer_secret.
			 */
			$notification = new \OAuth($application_id, $tmp_shared_secret, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_URI);
			$notification->fetch( $notification_url, $extra_params, OAUTH_HTTP_METHOD_GET);
			$notification_response = $notification->getLastResponse();

			// Let's check if response is empty first. We can show help
			// message if it is
			if ( strlen( $notification_response ) == 0 ) {
				echo '<pre>' . 'Response from the sever appears to be empty. Forgot to add error/success message?' . '</pre>';
			} else {
				echo '<pre>' . $notification_response . '</pre>';
			}
		?>

	</body>
</html>
