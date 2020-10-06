<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');

$arr = $mysql->mysqli_chk(['id'=>$_POST['id'],'title'=>$_POST['title'],'content'=>$_POST['content']]);

//본문 값 가져오기
$result = $mysql->query("SELECT * FROM board_table WHERE id={$arr['id']}");
$row = mysqli_fetch_assoc($result);

if($GLOBALS['user_id'] == $row['writer']) {
    $result = $mysql->query("UPDATE board_table SET title = '{$arr['title']}', content = '{$arr['content']}' WHERE id = '{$arr['id']}'");
    if($result) {
        echo("<script>location.replace('/topic/article.php?id={$_POST['id']}');</script>"); 
    }
}else {
    echo("<script>alert('수정 권한이 없습니다.');location.replace('/');</script>"); 
}

?>