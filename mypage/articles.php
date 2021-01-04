<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/mypage.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/mypage/layout/menu.php');
$mypage = new mypage($mysql);
$list = $mypage->article();

$body = <<<JYP
<div id="mypage" class="container clearfix">
    {$menu}
    <div class="pull-left lists">
        <table class="table">
            <thead>
                <th></th>
                <th>제목</th>
                <th>작성일</th>
            </thead>
            <tbody class="tbody">
                {$list}
            </tbody>
        </table>
    </div>
</div>
JYP;

// <p id="pgNumBtn">{$pg_html}</p>
$html = new html($body);
?>