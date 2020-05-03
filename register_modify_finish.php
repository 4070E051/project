<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=Big5" />
<?php
include("db.php");

$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($pw != null && $pw2 != null && $pw == $pw2)
{
		$user = $_SESSION['username'];
        $sql = "update tbl_user SET user_password = '$pw' where user_name = '$user'";
        if(mysql_query($sql))
        {
                echo '修改成功!';
                 echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
        }
        else
        {
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
        }
               
}
else
{
        echo '您無權限!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
