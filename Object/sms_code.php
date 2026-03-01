<?php
$args = http_build_query(array(
               'token' => 'v2_Xjrhjs7Ws3vjpRa4AvGNDrPIqr1.GIY8',
              'from'  => 'InfoSMS',
                'to'    => $mobileno,
                'text'  => 'TTMIS::'. $message));
               $url = "http://api.sparrowsms.com/v2/sms/";
             # Make the call using API.
               $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                 curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // Response
             $response = curl_exec($ch);
             $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
             curl_close($ch);   
?>