<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$clans = json_decode(file_get_contents('http://bv.mrdbx.ru/services/api_proxy.php?content=clans&callback.json'),true);
require("admin_clans.php");

?>
