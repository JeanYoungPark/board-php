<?php require_once($_SERVER["DOCUMENT_ROOT"].'/common/top.php'); ?>

<div class="write wrapper">
    <form action="/process/write_process.php" method="post">
        <p><input class="title" name="title" type="text" placeholder="제목"></p>
        <p><textarea class="content" name="content" placeholder="내용"></textarea></p>
        <p><input type="submit"></p>
    </form>
</div>

<?php require_once($_SERVER["DOCUMENT_ROOT"].'/common/bottom.php'); ?>