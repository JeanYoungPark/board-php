<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

//call datas for article
$_GET['id'] = $mysql->mysqli_chk($_GET['id']);

$result = $mysql->query("SELECT * FROM board_table WHERE id={$_GET['id']}");
$row = mysqli_fetch_assoc($result);
$row['title'] = nl2br(htmlspecialchars($row['title']));
$row['content'] = nl2br(htmlspecialchars($row['content']));
$row['writer'] = htmlspecialchars($row['writer']);

$before_query = "SELECT id FROM board_table
                        WHERE id < {$row['id']}
                          AND date <= '{$row['date']}'
                     ORDER BY id DESC LIMIT 1";
$next_query = "SELECT id FROM board_table
                       WHERE id > {$row['id']}
                         AND date >= '{$row['date']}'
                       LIMIT 1";

//call ids for pages
$result = $mysql->query($before_query);
$before = mysqli_fetch_assoc($result);

$result = $mysql->query($next_query);
$next = mysqli_fetch_assoc($result);

$btn = '';
if($before) $btn = "<span class='before'><a href='/topic/article.php?id={$before['id']}'><em class='glyphicon glyphicon-chevron-left'></em>이전글</a></span>";
if($next) $btn .= "<span class='next'><a href='/topic/article.php?id={$next['id']}'>다음글<em class='glyphicon glyphicon-chevron-right'></em></a></span>";

$body = <<<JYP
    <div class="container">
        <a class="btn btn-default" type="button" href="/"><em class="glyphicon glyphicon-home"></em>홈</a>
        <div class="content-top clearfix">
            <h1>{$row['title']}</h1>
            <div class="clearfix">
                <p class="pull-left">
                    <span>작성자.{$row['writer']}</span>
                    <span class="date">{$row['date']}</span>
                </p>
                <div class="clearfix pull-right">
                    <a class="modify pull-left btn btn-default btn-sm" href="/topic/modify.php?id={$row['id']}">수정</a>
                    <form class="pull-left" action="/process/delete_process.php" method="post" onsubmit="return askDelete()">
                        <input type="hidden" name="id" value="{$row['id']}">
                        <input class="btn btn-default btn-sm" type="submit" value="삭제">
                    </form>
                </div>
            </div>
        </div>
        <div id="editor" class="content-bottom">{$row['content']}</div>
        <div class="pages-btn">{$btn}</div>
    </div>
JYP;

$html = new html($body);
?>