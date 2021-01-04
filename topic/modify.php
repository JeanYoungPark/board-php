<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/article.php');
$article = new article($mysql);
$content = $article->content($_GET['id']);

$body =<<<JYP
<div class="container">
    <div class="form-container">
        <form id="write_form" action="/process/modify_process.php" method="post">
            <div class="form-group">
                <input id="title" class="form-control" name="title" type="text" value="{$content['title']}">
            </div>
            <div class="form-group">
                <textarea class="content-bottom form-control" name="content">{$content['content']}</textarea>
            </div>
            <input name="id" type="hidden" value="{$content['id']}">
            <input class="btn btn-default" type="submit" value="수정">
        </form>
    </div>
</div>
JYP;

$html = new html($body);
?>