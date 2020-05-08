<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$clans = json_decode(file_get_contents('https://berserktcg.ru/api/export/clans.json'),true);
require("clans.php");

?>

