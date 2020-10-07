<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');

if($GLOBALS['user_id']) {
    if($_COOKIE["PHPSESSID"]) {
        $_COOKIE["PHPSESSID"] = $mysql->mysqli_chk($_COOKIE["PHPSESSID"]);
        $result = $mysql->query("DELETE FROM session_db WHERE session='{$_COOKIE["PHPSESSID"]}'");
        unset($_COOKIE["PHPSESSID"]);
        $GLOBALS['user_id'] = $GLOBALS['user_nick_name'] = ''; //값이 있던 없던 로그아웃 페이지이기때문에 

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