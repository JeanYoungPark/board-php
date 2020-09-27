<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/mysql.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$mysql = new mysql;
$result = $mysql->query("SELECT * FROM board_table ORDER BY date DESC");
$row = mysqli_fetch_all($result);

$list  = '';
foreach($row as $key => $value) {
    $num = $key+1;
    $date = date("Y-m-d H:i", $value[4]);
    $list .= "
        <tr>
            <td>{$num}</td>
            <td><a href='/topic/article.php?id={$value[0]}'>{$value[1]}</a></td>
            <td>{$date}</td>
        </tr>
    ";
}

$body =<<<JYP
<div class="container">
    <div class="col-lg-12">
    <a type="button" class="btn btn-default" href="topic/write.php">글쓰기</a>
    <table class="table">
        <thead>
            <th></th>
            <th>제목</th>
            <th>작성일</th>
        </thead>
        <tbody>
            {$list}
        </tbody>
    </table>
    </div>
</div>
JYP;

$html = new html($body);
?>
    