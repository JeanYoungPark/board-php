<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');

if(isset($GLOBALS['user'])) {
    $arr = $mysql->mysqli_chk(['title'=>$_POST['title'],'content'=>$_POST['content']]);

    $result = $mysql->query("INSERT INTO board_table (title,content,writer_id,writer_name) VALUES ('{$arr['title']}','{$arr['content']}','{$GLOBALS['user']['id']}','{$GLOBALS['user']['nick_name']}')");

    if($result) {
        echo("<script>location.replace('/topic/article.php?id={$result}');</script>"); 
    }
}else {
    echo("<script>alert('로그인 후 글쓰기가 가능합니다.');location.replace('/users/login.php');</script>"); 
}

?>