<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Effect Billing / TrustPay</title>
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

		<form action="https://my.trustpay.biz/TrustPayClient/Transact" name="form" id="form" method="get">

			<!-- Vendor Id -->
			<label for="vendor_id">
				Vendor Id (Required):
				<input type="text" name="vendor_id" id="vendor_id" value=""/>
				<span>The Vendor_id assigned to your application on my.trustpay.biz</span>
			</label>

			<!-- Message -->
			<label for="message">
				Message (Required):
				<textarea type="text" name="message" id="message"></textarea>
				<span>Message that the payment page must display to the consumer.</span>
			</label>

			<!-- Amount -->
			<label for="amount">
				Amount (Required):
				<input type="number" step="0.01" name="amount" id="amount" value=""/>
				<span>Amount for the transaction with two decimal places</span>
			</label>

			<!-- Currency -->
			<label for="currency">
				Currency (Required):
				<select name="currency" id="currency">
					<option value="USD">USD</option>
					<option value="ZAR">ZAR</option>
				</select>
				<span>Currency for the transaction</span>
			</label>

			<!-- Transaction ID (txid) -->
			<label for="txid">
				Transaction ID (Required):
				<input type="text" name="txid" id="txid" value=""/>
				<span>Your transaction ID (Example: 598798)</span>
			</label>

			<!-- Transaction ID (txid) -->
			<label for="appuser">
				App User (Required):
				<input type="text" name="appuser" id="appuser" value=""/>
				<span>Your user identifier (Example: U6765465)</span>
			</label>

			<!-- Country Code (iso3166) -->
			<label for="countrycode">
				Country Code (optional):
				<select name="countrycode" id="countrycode">
					<option value=""></option>
					<option value="AD">Andorra</option>
					<option value="AE">United Arab Emirates</option>
					<option value="AF">Afghanistan</option>
					<option value="AG">Antigua and Barbuda</option>
					<option value="AI">Anguilla</option>
					<option value="AL">Albania</option>
					<option value="AM">Armenia</option>
					<option value="AO">Angola</option>
					<option value="AQ">Antarctica</option>
					<option value="AR">Argentina</option>
					<option value="AS">American Samoa</option>
					<option value="AT">Austria</option>
					<option value="AU">Australia</option>
					<option value="AW">Aruba</option>
					<option value="AX">Åland Islands</option>
					<option value="AZ">Azerbaijan</option>
					<option value="BA">Bosnia and Herzegovina</option>
					<option value="BB">Barbados</option>
					<option value="BD">Bangladesh</option>
					<option value="BE">Belgium</option>
					<option value="BF">Burkina Faso</option>
					<option value="BG">Bulgaria</option>
					<option value="BH">Bahrain</option>
					<option value="BI">Burundi</option>
					<option value="BJ">Benin</option>
					<option value="BL">Saint Barthélemy</option>
					<option value="BM">Bermuda</option>
					<option value="BN">Brunei Darussalam</option>
					<option value="BO">Bolivia, Plurinational State of</option>
					<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
					<option value="BR">Brazil</option>
					<option value="BS">Bahamas</option>
					<option value="BT">Bhutan</option>
					<option value="BV">Bouvet Island</option>
					<option value="BW">Botswana</option>
					<option value="BY">Belarus</option>
					<option value="BZ">Belize</option>
					<option value="CA">Canada</option>
					<option value="CC">Cocos (Keeling) Islands</option>
					<option value="CD">Congo, the Democratic Republic of the</option>
					<option value="CF">Central African Republic</option>
					<option value="CG">Congo</option>
					<option value="CH">Switzerland</option>
					<option value="CI">Côte d'Ivoire</option>
					<option value="CK">Cook Islands</option>
					<option value="CL">Chile</option>
					<option value="CM">Cameroon</option>
					<option value="CN">China</option>
					<option value="CO">Colombia</option>
					<option value="CR">Costa Rica</option>
					<option value="CU">Cuba</option>
					<option value="CV">Cabo Verde</option>
					<option value="CW">Curaçao</option>
					<option value="CX">Christmas Island</option>
					<option value="CY">Cyprus</option>
					<option value="CZ">Czech Republic</option>
					<option value="DE">Germany</option>
					<option value="DJ">Djibouti</option>
					<option value="DK">Denmark</option>
					<option value="DM">Dominica</option>
					<option value="DO">Dominican Republic</option>
					<option value="DZ">Algeria</option>
					<option value="EC">Ecuador</option>
					<option value="EE">Estonia</option>
					<option value="EG">Egypt</option>
					<option value="EH">Western Sahara</option>
					<option value="ER">Eritrea</option>
					<option value="ES">Spain</option>
					<option value="ET">Ethiopia</option>
					<option value="FI">Finland</option>
					<option value="FJ">Fiji</option>
					<option value="FK">Falkland Islands (Malvinas)</option>
					<option value="FM">Micronesia, Federated States of</option>
					<option value="FO">Faroe Islands</option>
					<option value="FR">France</option>
					<option value="GA">Gabon</option>
					<option value="GB">United Kingdom of Great Britain and Northern Ireland</option>
					<option value="GD">Grenada</option>
					<option value="GE">Georgia</option>
					<option value="GF">French Guiana</option>
					<option value="GG">Guernsey</option>
					<option value="GH">Ghana</option>
					<option value="GI">Gibraltar</option>
					<option value="GL">Greenland</option>
					<option value="GM">Gambia</option>
					<option value="GN">Guinea</option>
					<option value="GP">Guadeloupe</option>
					<option value="GQ">Equatorial Guinea</option>
					<option value="GR">Greece</option>
					<option value="GS">South Georgia and the South Sandwich Islands</option>
					<option value="GT">Guatemala</option>
					<option value="GU">Guam</option>
					<option value="GW">Guinea-Bissau</option>
					<option value="GY">Guyana</option>
					<option value="HK">Hong Kong</option>
					<option value="HM">Heard Island and McDonald Islands</option>
					<option value="HN">Honduras</option>
					<option value="HR">Croatia</option>
					<option value="HT">Haiti</option>
					<option value="HU">Hungary</option>
					<option value="ID">Indonesia</option>
					<option value="IE">Ireland</option>
					<option value="IL">Israel</option>
					<option value="IM">Isle of Man</option>
					<option value="IN">India</option>
					<option value="IO">British Indian Ocean Territory</option>
					<option value="IQ">Iraq</option>
					<option value="IR">Iran, Islamic Republic</option>
					<option value="IS">Iceland</option>
					<option value="IT">Italy</option>
					<option value="JE">Jersey</option>
					<option value="JM">Jamaica</option>
					<option value="JO">Jordan</option>
					<option value="JP">Japan</option>
					<option value="KE">Kenya</option>
					<option value="KG">Kyrgyzstan</option>
					<option value="KH">Cambodia</option>
					<option value="KI">Kiribati</option>
					<option value="KM">Comoros</option>
					<option value="KN">Saint Kitts and Nevis</option>
					<option value="KP">Korea, Democratic People's Republic of</option>
					<option value="KR">Korea, Republic of</option>
					<option value="KW">Kuwait</option>
					<option value="KY">Cayman Islands</option>
					<option value="KZ">Kazakhstan</option>
					<option value="LA">Lao People's Democratic Republic</option>
					<option value="LB">Lebanon</option>
					<option value="LC">Saint Lucia</option>
					<option value="LI">Liechtenstein</option>
					<option value="LK">Sri Lanka</option>
					<option value="LR">Liberia</option>
					<option value="LS">Lesotho</option>
					<option value="LT">Lithuania</option>
					<option value="LU">Luxembourg</option>
					<option value="LV">Latvia</option>
					<option value="LY">Libya</option>
					<option value="MA">Morocco</option>
					<option value="MC">Monaco</option>
					<option value="MD">Moldova, Republic of</option>
					<option value="ME">Montenegro</option>
					<option value="MF">Saint Martin (French part)</option>
					<option value="MG">Madagascar</option>
					<option value="MH">Marshall Islands</option>
					<option value="MK">Macedonia, the former Yugoslav Republic of</option>
					<option value="ML">Mali</option>
					<option value="MM">Myanmar</option>
					<option value="MN">Mongolia</option>
					<option value="MO">Macao</option>
					<option value="MP">Northern Mariana Islands</option>
					<option value="MQ">Martinique</option>
					<option value="MR">Mauritania</option>
					<option value="MS">Montserrat</option>
					<option value="MT">Malta</option>
					<option value="MU">Mauritius</option>
					<option value="MV">Maldives</option>
					<option value="MW">Malawi</option>
					<option value="MX">Mexico</option>
					<option value="MY">Malaysia</option>
					<option value="MZ">Mozambique</option>
					<option value="NA">Namibia</option>
					<option value="NC">New Caledonia</option>
					<option value="NE">Niger</option>
					<option value="NF">Norfolk Island</option>
					<option value="NG">Nigeria</option>
					<option value="NI">Nicaragua</option>
					<option value="NL">Netherlands</option>
					<option value="NO">Norway</option>
					<option value="NP">Nepal</option>
					<option value="NR">Nauru</option>
					<option value="NU">Niue</option>
					<option value="NZ">New Zealand</option>
					<option value="OM">Oman</option>
					<option value="PA">Panama</option>
					<option value="PE">Peru</option>
					<option value="PF">French Polynesia</option>
					<option value="PG">Papua New Guinea</option>
					<option value="PH">Philippines</option>
					<option value="PK">Pakistan</option>
					<option value="PL">Poland</option>
					<option value="PM">Saint Pierre and Miquelon</option>
					<option value="PN">Pitcairn</option>
					<option value="PR">Puerto Rico</option>
					<option value="PS">Palestine, State of</option>
					<option value="PT">Portugal</option>
					<option value="PW">Palau</option>
					<option value="PY">Paraguay</option>
					<option value="QA">Qatar</option>
					<option value="RE">Réunion</option>
					<option value="RO">Romania</option>
					<option value="RS">Serbia</option>
					<option value="RU">Russian Federation</option>
					<option value="RW">Rwanda</option>
					<option value="SA">Saudi Arabia</option>
					<option value="SB">Solomon Islands</option>
					<option value="SC">Seychelles</option>
					<option value="SD">Sudan</option>
					<option value="SE">Sweden</option>
					<option value="SG">Singapore</option>
					<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
					<option value="SI">Slovenia</option>
					<option value="SJ">Svalbard and Jan Mayen</option>
					<option value="SK">Slovakia</option>
					<option value="SL">Sierra Leone</option>
					<option value="SM">San Marino</option>
					<option value="SN">Senegal</option>
					<option value="SO">Somalia</option>
					<option value="SR">Suriname</option>
					<option value="SS">South Sudan</option>
					<option value="ST">Sao Tome and Principe</option>
					<option value="SV">El Salvador</option>
					<option value="SX">Sint Maarten (Dutch part)</option>
					<option value="SY">Syrian Arab Republic</option>
					<option value="SZ">Swaziland</option>
					<option value="TC">Turks and Caicos Islands</option>
					<option value="TD">Chad</option>
					<option value="TF">French Southern Territories</option>
					<option value="TG">Togo</option>
					<option value="TH">Thailand</option>
					<option value="TJ">Tajikistan</option>
					<option value="TK">Tokelau</option>
					<option value="TL">Timor-Leste</option>
					<option value="TM">Turkmenistan</option>
					<option value="TN">Tunisia</option>
					<option value="TO">Tonga</option>
					<option value="TR">Turkey</option>
					<option value="TT">Trinidad and Tobago</option>
					<option value="TV">Tuvalu</option>
					<option value="TW">Taiwan, Province of China</option>
					<option value="TZ">Tanzania, United Republic of</option>
					<option value="UA">Ukraine</option>
					<option value="UG">Uganda</option>
					<option value="UM">United States Minor Outlying Islands</option>
					<option value="US">United States of America</option>
					<option value="UY">Uruguay</option>
					<option value="UZ">Uzbekistan</option>
					<option value="VA">Holy See</option>
					<option value="VC">Saint Vincent and the Grenadines</option>
					<option value="VE">Venezuela, Bolivarian Republic of</option>
					<option value="VG">Virgin Islands, British</option>
					<option value="VI">Virgin Islands, U.S.</option>
					<option value="VN">Viet Nam</option>
					<option value="VU">Vanuatu</option>
					<option value="WF">Wallis and Futuna</option>
					<option value="WS">Samoa</option>
					<option value="YE">Yemen</option>
					<option value="YT">Mayotte</option>
					<option value="ZA">South Africa</option>
					<option value="ZM">Zambia</option>
					<option value="ZW">Zimbabwe</option>
				</select>
				<span>Country to select available payment methods. If this is not present, the customer's IP address will be used to decide in which territory to transact.</span>
			</label>

			<!-- Language (lang) -->
			<label for="lang">
				Language (optional):
				<select name="lang" id="lang">
					<option value=""></option>
					<option value="EN">English</option>
					<option value="FR">French</option>
				</select>
				<span>Language on the payment page, if not specified, defaults to English</span>
			</label>

			<!-- isTest (istest) -->
			<label for="istest">
				Is Test? (required):
				<select name="istest" id="istest">
					<option value="true">True</option>
					<option value="false">False</option>
				</select>
				<span>Set this equals to false for a normal, production transaction. If this is true, it is a test transaction where the complete backend process takes place except for the actual Payment Provider interaction. Test transactions will always return successful and will not result in money being transferred.</span>
			</label>

			<!-- Fail URL -->
			<label for="fail" class="in-grey">
				Fail URL (Required):
				<input type="text" name="fail" id="fail" value="<?php printf('http://%s%s%s', $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_URI'], 'failure.php' ); ?>"/>
				<span>This is the URL that the TrustPay Client will re-direct to if the user cancels the payment in the TrustPay client or if the transaction fails for some or other reason.</span>
			</label>

			<!-- Success URL -->
			<label for="success" class="in-grey">
				Success URL (Required):
				<input type="text" name="success" id="success" value="<?php printf('http://%s%s%s', $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_URI'], 'success.php'); ?>"/>
				<span>This is the URL that the TrustPay Client will re-direct to upon a successful payment.</span>
			</label>

			<!-- Submit Button -->
			<input type="submit" value="Submit"/>
		</form>
	</div>
</body>
</html>
