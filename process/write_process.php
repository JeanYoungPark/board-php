<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/class/mysql.php');

$_POST['title'] = htmlspecialchars($_POST['title']);
//엔터 치환 고민해보기
$_POST['content'] = str_replace('\n','rn',$_POST['content']);

$mysql = new mysql;
$result = $mysql->query("
    INSERT INTO board_table(title,content,date)
    VALUES (?,?,?);
",[$_POST['title'],$_POST['content'],time()]);

if($result) {
    echo("<script>location.replace('/topic/article.php?id={$result}');</script>"); 
}
?>