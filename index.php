<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$result = $mysql->query("SELECT * FROM board_table ORDER BY date DESC");
$pg_cnt = mysqli_num_rows($result);
$pg_cnt = ceil($pg_cnt/10);
$pg_html = '';

for($i=1;$i < $pg_cnt+1;$i++){
    $pg_html .= "<a href='?pg={$i}'>{$i}</a>";
}

$list  = $btn = '';
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

if($GLOBALS['user_id']) {
    $btn = '<a type="button" class="btn btn-default" href="topic/write.php">글쓰기</a>';
}
$body =<<<JYP
<div class="container">
    <div class="">
    {$btn}
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
    <p>{$pg_html}</p>
    </div>
</div>
JYP;

$html = new html($body);
?>
    