<?php
if(!empty($_COOKIE["PHPSESSID"])) {
    $_COOKIE["PHPSESSID"] = $mysql->mysqli_chk($_COOKIE["PHPSESSID"]);
    $result = $mysql->query("SELECT * FROM session_db WHERE session='{$_COOKIE["PHPSESSID"]}'");
    $row = mysqli_fetch_assoc($result);

    if($row){
        $result = $mysql->query("SELECT authId,id,nick_name FROM auth WHERE authId={$row['authId']} AND id='{$row['id']}'");
        $user = mysqli_fetch_assoc($result); //같은 변수가 생성되면 안됨

        if(!$user){
            //session_db에 기록된 PHPSESSID의 id가 존재하지 않는 아이디일 경우
            unset($_COOKIE["PHPSESSID"]);
        }else {
            $GLOBALS['user_id'] = $user['id'];
            $GLOBALS['user_nick_name'] = $user['nick_name'];
        }
    }else {
        //PHPSESSID이 기록이 없다면 로그인한 기록이 없는 것
        unset($_COOKIE["PHPSESSID"]);
    }
}
?>