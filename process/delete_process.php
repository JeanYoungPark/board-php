<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/class/mysql.php');
$mysql = new mysql;

$arr = $mysql->mysqli_chk($_POST['id']);
$result = $mysql->query("DELETE FROM board_table WHERE id = {$_POST['id']}");
if($result) {
    echo("<script>location.replace('/');</script>"); 
}
?>