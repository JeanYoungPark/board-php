<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/class/mysql.php');

$time = time(); //글로벌 변수로 만들자
$mysql = new mysql;
$result = $mysql->query("
    INSERT INTO board_table(title,content,date)
    VALUES ('{$_POST['title']}','{$_POST['content']}',{$time});
");

var_dump($result);
?>