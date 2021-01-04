<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/controller/article.php');
$article = new article($mysql);
$content = $article->content($_GET['id']);
$prevNext = $article->prevNext($content['id'],$content['date']);

$pg_btn = $btn = '';
if($prevNext['prev']) $pg_btn = "<span class='before'><a href='/topic/article.php?id={$prevNext['prev']['id']}'><em class='glyphicon glyphicon-chevron-left'></em>이전글</a></span>";
if($prevNext['next']) $pg_btn .= "<span class='next'><a href='/topic/article.php?id={$prevNext['next']['id']}'>다음글<em class='glyphicon glyphicon-chevron-right'></em></a></span>";

//본인 글일 경우 수정 삭제 가능
if(isset($GLOBALS['user']['id'])){
    if($GLOBALS['user']['id'] == $content['writer_id']) {
        $btn = <<<JYP
        <a class="write pull-left btn btn-default btn-sm" href="/topic/write.php">글쓰기</a>
        <a class="modify pull-left btn btn-default btn-sm" href="/topic/modify.php?id={$content['id']}">수정</a>
        <form class="pull-left" action="/process/delete_process.php" method="post" onsubmit="return askDelete()">
            <input type="hidden" name="id" value="{$content['id']}">
            <input class="btn btn-default btn-sm" type="submit" value="삭제">
        </form>
        JYP;
    }
}

$comment='';
// if($GLOBALS['user']['id']) {
//     $comment = <<<JYP
//     <form id="comment">
//         <input type="text" value="댓글을 입력하세요."></input>
//         <input type="hiddne" relation_table="">
//         <input type="hiddne" relation_id="">
//         <input type="submit" value="댓글저장">
//     </form>
//     JYP;
// }else {
//     $comment = <<<JYP
//     <div>회원가입 후 댓글쓰기가 가능합니다.</div>
//     JYP;
// }
$body = <<<JYP
    <div class="container">
        <div class="content-top clearfix">
            <h1>{$content['title']}</h1>
            <div class="clearfix">
                <p class="pull-left">
                    <span>작성자.{$content['writer_name']}</span>
                    <span class="date">{$content['date']}</span>
                </p>
                <div class="clearfix pull-right">
                    {$btn}
                </div>
            </div>
        </div>
        <div id="editor" class="content-bottom">{$content['content']}</div>
        <div class="pages-btn">{$pg_btn}</div>
        {$comment}
    </div>
JYP;

$html = new html($body);
?>