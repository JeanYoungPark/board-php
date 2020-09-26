<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/mysql.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$mysql = new mysql;
$result = $mysql->query("SELECT * FROM board_table");
$row = mysqli_fetch_all($result);

$list  = '';
foreach($row as $key => $value) {
    $num = $key+1;
    $date = date("Y-m-d", $value[3]);
    $list .= "
        <tr>
            <td>{$num}</td>
            <td><a href='/topic/article.php?id={$value[0]}'>{$value[1]}</a></td>
            <td>{$date}</td>
        </tr>
    ";
}

$body =<<<JYP
    <div class="col-lg-12">
    <a class="btn" href="topic/write.php">글쓰기</a>
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
JYP;

$html = new html($body);
?>
    