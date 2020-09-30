<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$arr = $mysql->mysqli_chk(['id'=>$_POST['id'],'password'=>$_POST['password']]);
$result = $mysql->query("SELECT * FROM auth WHERE id='{$arr['id']}");
$row = mysqli_fetch_assoc($result);

$arr['password'] = password_verify($arr['password'],PASSWORD_DEFAULT);


if($result) {
    echo("<script>alert('회원가입을 축하합니다!'); location.replace('/auth/login.php');</script>"); 
}
?>