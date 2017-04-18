<?php

return array(
/** set your paypal credential **/
'client_id' =>'AQD9YcCHKudYGX2aUHkHKVPGGjaSYs99FN-J5bnutDyBGNhYEub68C9GT1xLgUQsx02kIC8dk5B2558s',
'secret' => 'EBMn1nzfCj8ceoUse2YXA4t3__blNaTF1qcIRc3o7zXoppU7fIhhMw8VXXu6TuJION_mCGK3GQADJRq1',
/**
* SDK configuration
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);
