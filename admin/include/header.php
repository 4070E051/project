<html>
<head>
<title><?php echo $pageTitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?php echo WEB_ROOT;?>admin/include/admin.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>admin/library/common.js"></script>
<?php
$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'admin/library/' . $script[$i]. '"></script>';
	}
}
?>
</head>

<body>
<br>
<table width="700" border="0" align="center" cellpadding="2" cellspacing="1">
 <tr align="center"> 
  <td width="20%" class="nav"><a href="<?php echo WEB_ROOT;?>admin/index.php" class="nav">首頁</a></td>
  <td width="20%" class="nav"><a href="<?php echo WEB_ROOT;?>admin/category/index.php" class="nav">類別管理</a></td>
  <td width="20%" class="nav"><a href="<?php echo WEB_ROOT;?>admin/product/index.php" class="nav">產品管理</a></td>
/tr>
</table>
<p>&nbsp;</p>