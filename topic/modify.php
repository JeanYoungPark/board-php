<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/mysql.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$mysql = new mysql;
$result = $mysql->query("SELECT * FROM board_table WHERE id=?",[$_GET['id']]);
$row = mysqli_fetch_assoc($result);
$title = html_entity_decode($row['title']);

$body =<<<JYP
<div class="container">
    <p><a class="btn btn-default" type="button" href="/"><em class="glyphicon glyphicon-home"></em>홈</a></p>
    <div class="form-container">
        <form id="write_form" action="/process/write_process.php" method="post">
            <div class="form-group">
                <input id="title" class="form-control" name="title" type="text" value="{$title}">
            </div>
            <div class="form-group">
                <div id="toolbar"></div>
                <div id="editor"></div>
            </div>
            <input id="content" name="content" type="hidden">
            <input class="btn btn-default" type="submit" value="수정">
        </form>
    </div>
</div>
JYP;

$html = new html($body);
?>