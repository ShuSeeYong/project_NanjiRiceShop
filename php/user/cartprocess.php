<?php
   $email = $_GET["email"];
   $name = $_GET["name"];
   $phone = $_GET["phone"];
   $pickup = $_GET['pickup'];
   $remarks = $_GET['remarks'];
   $amount = $_GET['price'];

   $api_key = '08f17e56-d809-4804-8e3a-4283bf30be64';
   $collection_id = 'u57j8xea';
   $host = 'https://billplz-staging.herokuapp.com/api/v3/bills';

   $data = array(
       'collection_id' => $collection_id,
       'email' => $email,
       'phone' => $phone,
       'name' => $name,
       'amount' => $amount * 100, // RM20
       'description' => 'Payment for order',
       'callback_url' => "http://doubleksc.com/ShuSeeYong/project/php/user/mainus.php",
       'redirect_url' => "http://doubleksc.com/ShuSeeYong/project/php/user/payment.php?email=$email&name=$name&phone=$phone&remarks=$remarks&amount=$amount"
   );
   $process = curl_init($host);
   curl_setopt($process, CURLOPT_HEADER, 0);
   curl_setopt($process, CURLOPT_USERPWD, $api_key . ":");
   curl_setopt($process, CURLOPT_TIMEOUT, 30);
   curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($process, CURLOPT_SSL_VERIFYHOST, 0);
   curl_setopt($process, CURLOPT_SSL_VERIFYPEER, 0);
   curl_setopt($process, CURLOPT_POSTFIELDS, http_build_query($data));

   $return = curl_exec($process);
   curl_close($process);

   $bill = json_decode($return, true);

   header("Location: {$bill['url']}");
?>