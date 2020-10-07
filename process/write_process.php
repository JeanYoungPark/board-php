<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');

if($GLOBALS['user_id']) {
    $arr = $mysql->mysqli_chk(['title'=>$_POST['title'],'content'=>$_POST['content']]);

    $result = $mysql->query("INSERT INTO board_table (title,content,writer) VALUES ('{$arr['title']}','{$arr['content']}','{$GLOBALS['user_id']}')");

    if($result) {
        echo("<script>location.replace('/topic/article.php?id={$result}');</script>"); 
    }
}else {
    echo("<script>alert('로그인 후 글쓰기가 가능합니다.');location.replace('/auth/login.php');</script>"); 
}

?>