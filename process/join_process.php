<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$chkId = $chkNick = $ans = '';
$ajax = array_key_exists('key',$_POST);

if( $ajax ) { //ajax로 유효성 체크 (사용자 편의성)
    $arr = $mysql->mysqli_chk([$_POST['key']=>$_POST['value']]);

    if($_POST['key'] == 'id') {
        $result = $mysql->query("SELECT * FROM auth WHERE id='{$arr['id']}'");
        $chkId = mysqli_num_rows($result);
    }else if($_POST['key'] == 'nick_name'){
        $result = $mysql->query("SELECT * FROM auth WHERE nick_name ='{$arr['nick_name']}'");
        $chkNick = mysqli_num_rows($result);
    }
}else {
    $arr = $mysql->mysqli_chk(['id'=>$_POST['id'],'password'=>$_POST['password'],'nick_name'=>$_POST['nick_name']]);

    $result = $mysql->query("SELECT * FROM auth WHERE id='{$arr['id']}'");
    $chkId = mysqli_num_rows($result);
    $result = $mysql->query("SELECT * FROM auth WHERE nick_name ='{$arr['nick_name']}'");
    $chkNick = mysqli_num_rows($result);
}

if($chkId) {
    if($ajax) $ans = "이미 존재하는 아이디입니다.";
    else {
        echo '<script>alert("이미 존재하는 아이디입니다.");history.back()</script>';
        exit;
    }
}

if($chkNick){
    if($ajax) $ans = "이미 존재하는 닉네임입니다.";
    else{
        echo '<script>alert("이미 존재하는 닉네임입니다.");history.back()</script>';
        exit;
    }
}

if($ajax) {
    echo json_encode(['ans'=>$ans],JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE); //ajax 처리용
}else {
    if($_POST['password'] != $_POST['password2']) {
        echo '<script>alert("비밀번호를 확인해주세요.");history.back()</script>';
        exit;
    }else {
        $arr['password'] = password_hash($arr['password'],PASSWORD_DEFAULT);
    
        $result = $mysql->query("INSERT INTO auth (id,password,nick_name) VALUES('{$arr['id']}','{$arr['password']}','{$arr['nick_name']}')");
        
        if($result) {
            echo("<script>alert('회원가입을 축하합니다!'); location.replace('/users/login.php');</script>"); 
        }
    }
}

?>