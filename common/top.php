<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/config.php');

if(isset($GLOBALS['user'])) {
    $btn = <<<JYP
    <a class="btn btn btn-default" href="/mypage/articles.php">마이페이지</a>
    <a class="btn btn btn-default" href="/process/logout_process.php">로그아웃</a>
    JYP;
}else {
    $btn = <<<JYP
    <a class="btn btn btn-default" href="/users/login.php">로그인</a>
    <a class="btn btn-info" href="/users/join.php">회원가입</a>
    JYP;
}

$html = <<<JYP
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/main.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header container-fluid">
    <div class="container clearfix">
        <a class="btn btn-default" type="button" href="/"><em class="glyphicon glyphicon-home"></em>홈</a>
        <div class="pull-right">
            {$btn}
        </div>
    </div>
</div>
JYP;

echo $html;
?>