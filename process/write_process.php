<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/class/mysql.php');
$mysql = new mysql;

$_POST['title'] = $mysql->mysqli_chk($_POST['title']);
$_POST['content'] = $mysql->mysqli_chk($_POST['content']);

$result = $mysql->query("INSERT INTO board_table (title,content) VALUES ('{$_POST['title']}','{$_POST['content']}')") ;

if($result) {
    echo("<script>location.replace('/topic/article.php?id={$result}');</script>"); 
}
?>