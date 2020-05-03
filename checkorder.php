<?php
require_once 'library/config.php';
require_once 'library/category-functions.php';
require_once 'library/product-functions.php';
require_once 'library/cart-functions.php';

$_SESSION['shop_return_url'] = $_SERVER['REQUEST_URI'];

$catId  = (isset($_GET['c']) && $_GET['c'] != '1') ? $_GET['c'] : 0;
$pdId   = (isset($_GET['p']) && $_GET['p'] != '') ? $_GET['p'] : 0;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>電腦零件咕咕叫</title>
<style type="text/css"> 
<!-- 
body  {
	background: #666666;
	margin: 0; /* 比較好的做法是將 Body 元素的邊界與欄位間隔調整為零，以處理不同的瀏覽器預設值 */
	padding: 0;
	text-align: center; /* 這樣會讓容器在 IE 5* 瀏覽器內置中對齊。然後，文字會在 #container 選取器中設定為靠左對齊預設值 */
	color: #000;
	background-color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 100%;
}
.twoColLiqLtHdr #container {
	width: 80%;
	margin: 0 auto; /* 自動邊界 (搭配寬度) 會讓頁面置中對齊 */
	border: 1px solid #000000;
	text-align: left; /* 這樣做會覆寫 Body 元素上的 text-align: center。 */
	background-color: #FFF;
} 
.twoColLiqLtHdr #header {
	background: #DDDDDD;
	padding: 0px;  /* 這個欄位間隔符合下面顯示的 Div 中，元素的靠左對齊。如果在 #header 中使用影像而非文字，您可能會想要移除欄位間隔。 */
} 
.twoColLiqLtHdr #header h1 {
	margin: 0; /* 將 #header Div 中最後一個元素的邊界調整為零可避免邊界收合 (Div 之間出現的空間，無法解釋)。如果 Div 的周圍具有邊框，這就不是必要動作，因為該項設定也會避免邊界收合 */
	padding: 0.1px 0; /* 使用欄位間隔而非邊界便可讓元素遠離 Div 的邊緣 */
}

.twoColLiqLtHdr #功能 {
	background: #DDD;
	padding: 0.1px;  /* 這個欄位間隔符合下面顯示的 Div 中，元素的靠左對齊。如果在 #功能 中使用影像而非文字，您可能會想要移除欄位間隔。 */
}
.twoColLiqLtHdr #功能 h1 {
	margin: 0; /* 將 #功能 Div 中最後一個元素的邊界調整為零可避免邊界收合 (Div 之間出現的空間，無法解釋)。如果 Div 的周圍具有邊框，這就不是必要動作，因為該項設定也會避免邊界收合 */
	padding: 10px 0; /* 使用欄位間隔而非邊界便可讓元素遠離 Div 的邊緣 */
}
/* sidebar1 的提示：
1. 因為我們是以百分比為單位進行工作，所以最好不要在邊列上使用欄位間隔。它將會新增至寬度，而讓符合標準的瀏覽器建立不明的實際寬度。 
2. 您可以根據在 ".twoColLiqLtHdr #sidebar1 p" 規則中看見的方式，將左和右邊界放置於 Div 內部的元素上，藉以建立 Div 側邊與內部元素之間的空間。
3. 因為 Explorer 會在呈現父元素之後計算寬度，所以您有時候會在百分比架構欄中遇到無法解釋的錯誤。如果您需要更多可預期的結果，便可以選擇變更為像素大小的欄。
*/
.twoColLiqLtHdr #sidebar1 {
	float: left; 
	width: 25%; /* 因為這個元素是浮動元素，所以您必須指定寬度 */
	background: #EBEBEB; /* 背景顏色將會針對欄的內容長度而顯示，但僅止於此 */
	padding: 15px 0; /* 頂端和底部欄位間隔會在這個 Div 內部建立視覺空間 */
}
.twoColLiqLtHdr #sidebar1 h3, .twoColLiqLtHdr #sidebar1 p {
	margin-left: 10px; /* 您應該針對將要放置於側邊欄的每個元素，指定左和右邊界 */
	margin-right: 10px;
}

/* mainContent 的提示：
1. mainContent 和 sidebar1 之間的空間是以 mainContent Div 的左邊界建立的。不論 sidebar1 Div 包含多少內容，欄空間將維持不變。當 #sidebar1 的內容結束時，如果您想讓 #mainContent Div 的文字填滿 #sidebar1 的空間，就可以移除這個左邊界。
2. 若要避免在支援的 800 x 600 最小解析度上出現浮動遺失，mainContent Div 中的元素應該是 430px 或更小 (包括影像)。
3. 在下列 Internet Explorer 條件註解中，縮放屬性是用來提供 mainContent "hasLayout"。這樣做可避免許多 IE 特有錯誤。
*/
.twoColLiqLtHdr #mainContent { 
	margin: 0 5px 0 1%; /* 右邊界的指定方式可以使用百分比或像素為單位。它會在頁面的右下方建立空間。 */
} 
.twoColLiqLtHdr #footer { 
	padding: 0 20px; /* 這個欄位間隔符合上面顯示的 Div 中，元素的靠左對齊。 */
	background:#DDDDDD;
} 
.twoColLiqLtHdr #footer p {
	margin: 0; /* 將頁尾中第一個元素的邊界調整為零可避免邊界收合的可能性 (Div 之間出現的空間) */
	padding: 10px 0; /* 這個元素的欄位間隔將會建立空間，就如同邊界一樣，但是沒有邊界收合的問題 */
}

/* 可重複使用的雜項類別 */
.fltrt { /* 這個類別可用來讓頁面右邊的元素浮動。浮動元素必須位於頁面上必須相鄰的元素前面。 */
	float: right;
	margin-left: 8px;
}
.fltlft { /* 這個類別可用來讓頁面左邊的元素浮動 */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* 這個類別應該放置於 Div 或 Break 元素上，而且應該是完整包含浮動的容器關閉前的最後一個元素 */
	clear:both;
    height:0;
    font-size: 1px;
    line-height: 0px;
}
--> 
</style><!--[if IE]>
<style type="text/css"> 
/* 在這個條件註解中，放置所有 IE 版本的 CSS 修正 */
.twoColLiqLtHdr #sidebar1 { padding-top: 30px; }
.twoColLiqLtHdr #mainContent { zoom: 1; padding-top: 15px; }
/* 上面的專用縮放屬性會提供 IE 所需的 hasLayout，以避免許多錯誤 */
</style>
<![endif]-->
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body class="twoColLiqLtHdr">

<div id="container"> 
  <div id="header">
<h1><img src="images/Banner.gif" width="867" height="250" alt="Banner" /></h1>
  <!-- end #header --></div>
  <div id="功能">
    <div align="center">
     <?php require_once 'include/top.php';?>
    </div>
  </div>

  <div id="sidebar1">
<?php  
if (!isset($_SESSION['username']))
{
?>
    <p align="center">會員登入</p>
    <p align="center">
    <table width="250" border="0">
      <tr>
<form name="form" method="post" action="connect.php">
  					帳號
  					<input type="text" name="id" />
					<br><br>  
  					密碼
  					<input type="password" name="pw" />
					<br><br>
  					<input type="submit" name="button" value="登入" />
 					&nbsp;&nbsp; <br/><br><br>
					<p align="center"></p>
					</form>       
      </tr>
    </table></p>
  
    <?php
    
}  
else
{

	if ($_SESSION['username'] != "")
	{
?>
	<td width="130" align="center"><?php require_once 'include/miniCart.php'; ?></td>
<?php
    }
}
?>    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>    
    <p><!-- end #sidebar1 --></p>
  </div>
  <div id="mainContent" width="1000"/>
 <h1>訂單查詢</h1>

   <h2>
   
<table style="border: 5px double rgb(109, 2, 107); background-color: rgb(255, 255, 255); width: 400px;" align="center" cellpadding="5" cellspacing="5" frame="border" rules="all">
   <tbody>
     <tr>
       <td>訂單日期</td>
       <td>商品名稱</td>
       <td>商品敘述</td>
       <td>價格</td>
       <td>刪除</td>
     </tr>
<?
				include 'db.php';
				$sql = "select od_id,od_date from tbl_order where user_id='".$_SESSION['username']."'";
				$us = mysql_query($sql, $con);
				$flag=0;
				while($data=mysql_fetch_row($us))
				{
			            echo "<tr><td>$data[1]</td>";

				    $sql = "select pd_id from tbl_order_item where od_id=".$data[0];
				    $us1 = mysql_query($sql, $con);

				    while($pid=mysql_fetch_row($us1))
				    {

				      $sql = "select * from tbl_product where pd_id=".$pid[0];
			 	      $us2 = mysql_query($sql, $con);
  				      $adata=mysql_fetch_row($us2);

			              echo "<td>$adata[2]</td>";
			              echo "<td>$adata[3]</td>";
			              echo "<td>$adata[4]</td>";
			              echo "<td><a href=\"deleteorder.php?id=$data[0]\">刪除</a></td></tr>";
			              $flag=1;
                                    }
					
				}				
				
				if ($flag == 0)
				{
					for ($i=0;$i<1; $i++)
					{
				       echo "<tr><td>none</td>";
				       echo "<td>none</td>";
				       echo "<td>none</td>";
				       echo "<td>none</td>";
				       echo "<td>none</td></tr>";					
					}
					
				}
?>
   </tbody>
 </table>    
   
   </h2>
 </div>
  <div id="footer">
  <p></p>
 </div>
 </div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
