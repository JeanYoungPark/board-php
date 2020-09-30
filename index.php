<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$result = $mysql->query("SELECT * FROM board_table ORDER BY date DESC");

$list  = '';
$num = 1;
while($row = mysqli_fetch_array($result)){
    $row['title'] = htmlspecialchars($row['title']);
    $list .= "
        <tr>
            <td>{$num}</td>
            <td><a href='/topic/article.php?id={$row['id']}'>{$row['title']}</a></td>
            <td>{$row['date']}</td>
        </tr>
    ";
    $num++;
}

$body =<<<JYP
<div class="container">
    <div class="">
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
    