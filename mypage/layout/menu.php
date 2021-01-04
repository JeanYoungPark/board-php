<?php
$mypage = new mypage($mysql);
$menuArr = $mypage->menu();

$menu = <<<JYP
        <ul class="menu pull-left">
            <li class="{$menuArr['articles']}"><a href="/mypage/articles.php">내가 쓴 게시글</a></li>
            <li class="{$menuArr['comments']}"><a href="/mypage/comments.php">내가 쓴 댓글</a></li>
        </ul>
JYP;
?>