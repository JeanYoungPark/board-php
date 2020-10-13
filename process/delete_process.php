<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');

$_POST['id'] = $mysql->mysqli_chk($_POST['id']);

//본문 값 가져오기
$result = $mysql->query("SELECT * FROM board_table WHERE id={$_POST['id']}");
$row = mysqli_fetch_assoc($result);

if($GLOBALS['user']['id'] == $row['writer_id']) {
    $result = $mysql->query("DELETE FROM board_table WHERE id = {$_POST['id']}");
    if($result) {
        echo("<script>location.replace('/');</script>"); 
    }
}else {
    echo("<script>alert('삭제 권한이 없습니다.');location.replace('/');</script>");
}
?>