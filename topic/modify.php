<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$result = $mysql->query("SELECT * FROM board_table WHERE id={$_GET['id']}");
$row = mysqli_fetch_assoc($result);
$row['title'] = htmlspecialchars($row['title']);
$row['content'] = htmlspecialchars($row['content']);

$body =<<<JYP
<div class="container">
    <div class="form-container">
        <form id="write_form" action="/process/modify_process.php" method="post">
            <div class="form-group">
                <input id="title" class="form-control" name="title" type="text" value="{$row['title']}">
            </div>
            <div class="form-group">
                <textarea class="content-bottom form-control" name="content">{$row['content']}</textarea>
            </div>
            <input name="id" type="hidden" value="{$row['id']}">
            <input class="btn btn-default" type="submit" value="수정">
        </form>
    </div>
</div>
JYP;

$html = new html($body);
?>