<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Requesting Price Points / TrustPay</title>
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
		<p class="description">The API response is printed as array.</p>
		<?php

			$vendor_id   = isset( $_GET['vendor_id'] ) ? $_GET['vendor_id'] : null;
			$countrycode = isset( $_GET['countrycode'] ) ? $_GET['countrycode'] : null;

			// Both vendor_id and countrycode must be set otherwise display error message.
			if ( $vendor_id == null ) {
				echo '<pre>' . 'Please set Vendor ID. '</pre>';
				exit();
			}

			// Data
			$url = 'https://my.trustpay.biz/PricePointProcessor/pricepoints?vendor_id=' . $vendor_id . '&countrycode=' . $countrycode;

			// Lets use curl (php5-curl) to make a api request
			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, $url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5 );
			curl_setopt( $ch, CURLOPT_TIMEOUT, 5 );
			$response = curl_exec( $ch );
			curl_close( $ch );

			// Lets print response as array
			if ( $response ) {
				echo '<pre>' . print_r( json_decode( $response, true ), true ) . '</pre>';
			}

		?>

	</body>
</html>
