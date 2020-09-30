<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');

$arr = $mysql->mysqli_chk(['id'=>$_POST['id'],'title'=>$_POST['title'],'content'=>$_POST['content']]);
$result = $mysql->query("UPDATE board_table SET title = '{$arr['title']}', content = '{$arr['content']}' WHERE id = '{$arr['id']}'");
if($result) {
    echo("<script>location.replace('/topic/article.php?id={$_POST['id']}');</script>"); 
}
?>