<?php

$curl = curl_init();
$name = $_POST['name']; 
$phone = $_POST['phone'];
$email = $_POST['email']; 
$subject = $_POST['subject']; 
$message = $_POST['message'];

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n  \"personalizations\": [\n    {\n      \"to\": [\n        {\n          \"email\": \"[Email Address to send Contact to]\"\n        }\n      ],\n      \"subject\": \"New Contact\"\n    }\n  ],\n  \"from\": {\n    \"email\": \"[FROM EMAIL]\"\n  },\n  \"content\": [\n    {\n      \"type\": \"text/html\",\n      \"value\": \"$name<br>$phone<br>$email<br>$subject<br>$message\"\n    }\n  ]\n}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer [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]",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
header('Location: index.html');

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>