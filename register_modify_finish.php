<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=Big5" />
<?php
include("db.php");

$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];

//�P�_�b���K�X�O�_���ŭ�
//�T�{�K�X��J�����T��
if($pw != null && $pw2 != null && $pw == $pw2)
{
		$user = $_SESSION['username'];
        $sql = "update tbl_user SET user_password = '$pw' where user_name = '$user'";
        if(mysql_query($sql))
        {
                echo '�ק令�\!';
                 echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
        }
        else
        {
                echo '�ק異��!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
        }
               
}
else
{
        echo '�z�L�v��!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
