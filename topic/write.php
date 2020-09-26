<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');
$body =<<<JYP
<div class="container">
    <form action="/process/write_process.php" method="post">
    <div class="form-group"><input class="form-control" name="title" type="text" placeholder="제목"></div>
    <div class="form-group"><textarea class="form-control" name="content" placeholder="내용"></textarea></div>
    <p><input type="submit"></p>
    </form>
</div>
JYP;

$html = new html($body);
?>