<?php

	$sl = $_POST['sl'];
	$sw = $_POST['sw'];
	$pl = $_POST['pl'];
	$pw = $_POST['pw'];

	$headers = array('Content-Type: application/json');
	$fields = array('sl'=>$sl, 'sw'=>$sw, 'pl'=>$pl, 'pw'=>$pw);
	$payload = json_encode($fields);

	$curl_session = curl_init();
	curl_setopt($curl_session, CURLOPT_URL, 'http://xxx.xxx.xxx.xxx:5000/iris/api');
	curl_setopt($curl_session, CURLOPT_POST, true);
	curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);
				
	$result = curl_exec($curl_session);

	curl_close($curl_session);
				
	echo $result;

?>