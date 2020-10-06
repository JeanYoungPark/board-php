<?php
/*-------$GLOBALS-------*/
$GLOBALS['time'] = time();
$GLOBALS['user_id'] = $GLOBALS['user_nick_name'] = '';

/*-------mysql--------*/
require_once($_SERVER["DOCUMENT_ROOT"].'/class/mysql.php');
$mysql = new mysql;

/*-------user--------*/
require_once($_SERVER["DOCUMENT_ROOT"].'\user.php');
if($user) {
    $GLOBALS['user_id'] = $user['id'];
    $GLOBALS['user_nick_name'] = $user['nick_name'];
}
?>