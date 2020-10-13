<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/class/html.php');

$body =<<<JYP
<div class="container">
    <div class="col-lg-4 col-lg-offset-4">
        <form id="join_form" action="/process/join_process.php" method="post">
            <div class="form-group">
                <label for="id">아이디</label>
                <input id="id" class="form-control" type="text" name="id" placeholder="아이디를 입력해주세요.">
                <span class="warn"></span>
            </div>
            <div class="form-group">
                <label for="nick_name">닉네임</label>
                <input id="nick_name" class="form-control" type="text" name="nick_name" placeholder="닉네임를 입력해주세요.">
                <span class="warn"></span>
            </div>
            <div class="form-group">
                <label for="password">비밀번호</label>
                <input id="password" class="form-control" type="password" name="password" placeholder="비밀번호를 입력해주세요.">
            </div>
            <div class="form-group">
                <label for="password2">비밀번호 확인</label>
                <input id="password2" class="form-control" type="password" name="password2" placeholder="비밀번호를 다시 입력해주세요.">
            </div>
            <input class="btn btn-default" type="submit" value="확인">
        </form>
    </div>
</div>
JYP;

$html = new html($body);
?>