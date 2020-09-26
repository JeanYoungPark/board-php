<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/class/mysql.php');

$mysql = new mysql;
$result = $mysql->query("
    INSERT INTO board_table(title,content,date)
    VALUES (?,?,?);
",[$_POST['title'],$_POST['content'],$GLOBALS['date']]);

if($result) {
    Header("Location:topic/article.php?id={$result}"); 
}
?>