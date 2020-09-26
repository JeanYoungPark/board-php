<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/mysql.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$mysql = new mysql;
$result = $mysql->query("SELECT * FROM board_table WHERE id=?",[$_GET['id']]);
$row = mysqli_fetch_assoc($result);

$body = <<<JYP
    <div class="container">
       <div>{$row['title']}</div>
       <div>{$row['content']}</div>
    </div>
JYP;

$html = new html($body);
?>