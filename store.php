<?php
require_once 'library/config.php';
require_once 'library/category-functions.php';
require_once 'library/product-functions.php';
require_once 'library/cart-functions.php';

$_SESSION['shop_return_url'] = $_SERVER['REQUEST_URI'];

$catId  = (isset($_GET['c']) && $_GET['c'] != '1') ? $_GET['c'] : 0;
$pdId   = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : 0;

?>
<!DOCTYPE html>
<html lang="zh-tw">
  <head>
    <meta charset="utf-8">
    <title>旅遊業</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="./bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="./bootstrap/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./bootstrap/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>
	<div class="container flld_background">
      <div class="row">
       	       	<div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">選單</li>
              <li><a href="index.php">首頁</a></li>
			  <li><a href="store.php">旅遊套裝</a></li>
			  <li><a href="register.php">會員中心</a></li>			  <li class="nav-header">會員專區</li>
			  <li><a href="admin/index.php" target="_blank">管理</a></li>
<?php
if (isset($_SESSION['username']))
{
    if ($_SESSION['username'] != "") { 
?>
	<li><a href="logout.php">登出</a></li>
			</ul>
<?php
    }
}
else
{
?>
<li><a href="login.php">會員登入</a></li>
<?php
}
?>
     
          </div><!--/.well -->
        </div><!--/span-->

        <div class="span10">
          <div class="row">
            <div class="span10"> 
              <div class="hero-unit">
          <h1>&nbsp;</h1>
            <p>&nbsp;</p>
          </div>
          <div class="row">
            <div class="span10"> 
<div class="ncku_hidden_logo">
            
<!--在此h2是頁標題-->
<h2 class="h2_added"></h2>
<!--在此h3是副標題，可有可無-->
<br/><br/>
</div>
<!--下面可以完全取代-->
</table>
  <!--以上部份可以被取代-->
<center>
 <h1>旅遊套裝</h1>
  <p>&nbsp;</p>
   <h2>
 <?php
if ($pdId) {
	require_once 'include/productDetail.php';
} else if ($catId) {
	require_once 'include/productList.php';
} else {
	require_once 'include/categoryList.php';
}
?>  
</center>

    <p style="clear:both"></p>
            </div><!--/span-->
          </div><!--/row-->         
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./bootstrap/js/jquery-1.8.0.min.js"></script>
    <script src="./bootstrap/js/bootstrap-transition.js"></script>
    <script src="./bootstrap/js/bootstrap-alert.js"></script>
    <script src="./bootstrap/js/bootstrap-modal.js"></script>
    <script src="./bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="./bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="./bootstrap/js/bootstrap-tab.js"></script>
    <script src="./bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="./bootstrap/js/bootstrap-popover.js"></script>
    <script src="./bootstrap/js/bootstrap-button.js"></script>
    <script src="./bootstrap/js/bootstrap-collapse.js"></script>
    <script src="./bootstrap/js/bootstrap-carousel.js"></script>
    <script src="./bootstrap/js/bootstrap-typeahead.js"></script>

  </body>
</html>
