<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');
$body =<<<JYP
<div class="container">
    <div class="form-group">
        <form action="/process/write_process.php" method="post">
        <p><input class="form-control" name="title" type="text" placeholder="제목"></p>
        <p><textarea class="form-control" name="content" placeholder="내용"></textarea></p>
        <p><input type="submit"></p>
        </form>
    </div>
</div>
JYP;

$html = new html($body);
?>