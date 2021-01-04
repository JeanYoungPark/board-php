<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$list = [
    "articles" => "",
    "comments" => ""
];

if(preg_match("/\/mypage\/(.*).php/",$_SERVER['PHP_SELF'],$match)) {
    $list[$match[1]] = "on";
    $menu = <<<JYP
        <ul class="menu pull-left">
            <li class="{$list['articles']}"><a href="/mypage/articles.php">내가 쓴 게시글</a></li>
            <li class="{$list['comments']}"><a href="/mypage/comments.php">내가 쓴 댓글</a></li>
        </ul>
JYP;
}


?>