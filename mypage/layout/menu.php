<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

// $_SERVER['PHP_SELF']

$menu = <<<JYP
<ul class="pull-left">
    <li><a href="">내가 쓴 게시글</a></li>
    <li><a href="">내가 쓴 댓글</a></li>
</ul>
JYP;

?>