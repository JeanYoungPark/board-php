<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/article.php');
$article = new article($mysql);
$btn = $article->btn();
$list = $article->list();

$body =<<<JYP
<div class="main container">
    <div class="">
    {$btn}
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
    