<?php
/*
 CODER : CATUR MAHDI AL FURQON
WEB SCRAPING COINMARKETCAP WITH API
REPORTING NEWS CRYPTOCURRENCY UPDATE
https://github.com/caturmahdialfurqon
*/
error_reporting(0);
system('clear');
function own($url, $ua, $data = null) {
    while (True){
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_FOLLOWLOCATION => 1,));
        if ($data) {
            curl_setopt_array($ch, array(
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => $data,));
        }
        curl_setopt_array($ch, array(
            CURLOPT_HTTPHEADER => $ua,
            CURLOPT_SSL_VERIFYPEER => 1,
            CURLOPT_RETURNTRANSFER => 1,));
        $run = curl_exec($ch);
        curl_close($ch);
        if ($run) {
            return $run;
        } else {
            echo "\33[1;33mcheck your connection!\n";
            sleep(2);
            continue;
        }
    }
}
require('config.php');
//===================================FRX====================================//

$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
$headers = array("Accepts: application/json","X-CMC_PRO_API_KEY: {$API_KEY}",);
$qs = http_build_query($parameters);
$request = "{$url}?{$qs}"; 
$req = own($request,$headers);
print_r(json_decode($req));

//===================================FRX====================================//
