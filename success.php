<?php
require_once 'library/config.php';

// if no order id defined in the session
// redirect to main page
if (!isset($_SESSION['orderId'])) {
	header('Location: ' . WEB_ROOT);
	exit;
}

$pageTitle   = '訂單加入完成';
require_once 'include/header.php';


unset($_SESSION['orderId']);
?>
<p>&nbsp;</p><table width="500" border="0" align="center" cellpadding="1" cellspacing="0">
   <tr> 
      <td align="left" valign="top" bgcolor="#333333"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr> 
               <td align="center" bgcolor="#EEEEEE"> <p>&nbsp;</p>
                        <p>感謝您的購物，若想繼續購物請按<a href="index.php">按我</a></p>
                  <p>&nbsp;</p></td>
            </tr>
         </table></td>
   </tr>
</table>
