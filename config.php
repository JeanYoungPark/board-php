<?php
/*-------html--------*/
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

/*-------$GLOBALS-------*/
$GLOBALS['time'] = time();

/*-------mysql--------*/
require_once($_SERVER["DOCUMENT_ROOT"].'/class/mysql.php');
$mysql = new mysql;

/*-------user--------*/
require_once($_SERVER["DOCUMENT_ROOT"].'/user.php');
?>