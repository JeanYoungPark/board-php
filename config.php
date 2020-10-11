<?php
/*-------$GLOBALS-------*/
$GLOBALS['time'] = time();
$GLOBALS['user_id'] = $GLOBALS['user_nick_name'] = '';

/*-------mysql--------*/
require_once($_SERVER["DOCUMENT_ROOT"].'/class/mysql.php');
$mysql = new mysql;

/*-------user--------*/
$_COOKIE["PHPSESSID"] = '';
require_once($_SERVER["DOCUMENT_ROOT"].'/user.php');
?>