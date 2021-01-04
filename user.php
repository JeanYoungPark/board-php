<?php
if(!empty($_COOKIE["PHPSESSID"])) {
    $_COOKIE["PHPSESSID"] = $mysql->mysqli_chk($_COOKIE["PHPSESSID"]);
    $result = $mysql->query("SELECT * FROM session_db WHERE session='{$_COOKIE["PHPSESSID"]}'");
    $row = mysqli_fetch_assoc($result);

    if($row){
        $result = $mysql->query("SELECT authId,id,nick_name FROM auth WHERE authId={$row['authId']} AND id='{$row['id']}'");
        $user = mysqli_fetch_assoc($result); //같은 변수가 생성되면 안됨
    }else {
        //존재할 수 없는 쿠키
        unset($_COOKIE["PHPSESSID"]);
    }
}
?>