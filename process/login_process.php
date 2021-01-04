<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$arr = $mysql->mysqli_chk(['id'=>$_POST['id'],'password'=>$_POST['password']]);
$result = $mysql->query("SELECT * FROM auth WHERE id='{$arr['id']}'");
$login = mysqli_fetch_assoc($result);

if($login) {
    $arr['password'] = password_verify($arr['password'],$login['password']);

    if($arr['password']) {
        session_start();
        session_regenerate_id();
        $_SESSION['id'] = $login['id'];
        $_SESSION['nick_name'] = $login['nick_name'];
        $_SESSION['password'] = $login['password'];

        $token = session_id();
        $result = $mysql->query("INSERT INTO session_db (authId,id,session) VALUES ('{$login['authId']}','{$login['id']}','{$token}')");
        echo("<script>location.replace('/');</script>");
    }else {
        echo("<script>alert('비밀번호가 일치하지 않습니다.');history.back();</script>"); 
    }
}else {
    echo("<script>alert('존재하지 않는 아이디입니다.');history.back();</script>"); 
}

?>