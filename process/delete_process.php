<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');

$arr = $mysql->mysqli_chk($_POST['id']);
$result = $mysql->query("DELETE FROM board_table WHERE id = {$_POST['id']}");
if($result) {
    echo("<script>location.replace('/');</script>"); 
}
?>