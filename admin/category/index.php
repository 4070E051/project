<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= '後台管理 - View Category';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= '後台管理 - Add Category';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= '後台管理 - Modify Category';
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= '後台管理 - View Category';
}


$script    = array('category.js');

require_once '../include/template.php';
?>
