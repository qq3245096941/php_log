<?php

require_once __DIR__."/FileLog.php";

echo php_sapi_name();

$log = new FileLog();

$arr = [1,2,3];
$log->println($arr,2);
