<?php
require_once '../library/config.php';
require_once './library/functions.php';

checkUser();

$content = 'main.php';

$pageTitle = '後台管理';
$script = array();

require_once 'include/template.php';
?>
