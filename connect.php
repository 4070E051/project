<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=Big5" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("db.php");
$id = $_POST['id'];
$pw = $_POST['pw'];

//搜尋資料庫資料
$sql = "SELECT * FROM tbl_user where user_name = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($id != null && $pw != null && $row[1] == $id && $row[2] == $pw)
{
      	//將帳號寫入session，方便龍華電子二手書者身份
       	$_SESSION['username'] = $id;
       	echo '登入成功!';
       	echo "<meta http-equiv=REFRESH CONTENT=1;url=index.php?user=$id>";
}
else
{
        echo '登入失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>
