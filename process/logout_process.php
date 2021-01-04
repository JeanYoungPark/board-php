<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');

if($GLOBALS['user']['id']) {
    if($_COOKIE["PHPSESSID"]) {
        $_COOKIE["PHPSESSID"] = $mysql->mysqli_chk($_COOKIE["PHPSESSID"]);
        $result = $mysql->query("DELETE FROM session_db WHERE session='{$_COOKIE["PHPSESSID"]}'");
        unset($_COOKIE["PHPSESSID"]);

        if($result) {
            echo("<script>location.replace('/');</script>"); 
        }else {
            echo("<script>alert('잘못된 접근입니다.(3)');location.replace('/');</script>"); 
        }
    }else {
        echo("<script>alert('잘못된 접근입니다.(2)');location.replace('/');</script>"); 
    }
}else {
    echo("<script>alert('잘못된 접근입니다.(1)');location.replace('/');</script>"); 
}

?>