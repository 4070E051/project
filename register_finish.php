<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=Big5" />
<?php
include("db.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$kp = $_POST['mail'];
$pn = $_POST['address'];


//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        $sql = "insert into tbl_user (user_name, user_password, user_regdate, user_last_login, mail, addr, admin) values ('$id', '$pw', '0000-00-00 00:00:00', '0000-00-00 00:00:00','$kp', '$pn', '0')";
        if(mysql_query($sql))
        {
                echo '新增成功!';
                 echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
        }
               
}
else
{
        echo '您無權限!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
