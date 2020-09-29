<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/class/mysql.php');

$_POST['title'] = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$_POST['content'] = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
$_POST['content'] = nl2br($_POST['content']);

$query = <<<JYP
UPDATE board_table
   SET title = '{$_POST['title']}',
       content = '{$_POST['content']}',
       date = {$GLOBALS['time']}
 WHERE id={$_POST['id']};
JYP;
$mysql = new mysql;
$result = $mysql->query($query);

if($result) {
    echo("<script>location.replace('/topic/article.php?id={$_POST['id']}');</script>"); 
}
?>