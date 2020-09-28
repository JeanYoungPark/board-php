<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/class/mysql.php');

$_POST['content'] = htmlspecialchars($_POST['content']);

$mysql = new mysql;
$result = $mysql->query("
    INSERT INTO board_table(title,content,date)
    VALUES (?,?,?);
",[$_POST['title'],$_POST['content'],time()]);

if($result) {
    echo("<script>location.replace('/topic/article.php?id={$result}');</script>"); 
}
?>