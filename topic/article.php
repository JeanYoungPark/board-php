<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/mysql.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$mysql = new mysql;
$result = $mysql->query("SELECT * FROM board_table WHERE id=?",[$_GET['id']]);
$row = mysqli_fetch_assoc($result);

$body = <<<JYP
    <div class="container">
        <a class="btn btn-default glyphicon glyphicon-home" href="/"> 홈</a>
        <div>
            <p class="lead">{$row['title']}</p>
            <p class="">{$row['content']}</p>
            <em>by.{$row['writer']}</em>
        </div>
    </div>
JYP;

$html = new html($body);
?>