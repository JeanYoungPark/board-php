<?php
class html{
    function __construct($body){
        require_once($_SERVER["DOCUMENT_ROOT"].'/common/top.php');
        echo $body;
        require_once($_SERVER["DOCUMENT_ROOT"].'/common/bottom.php');
    }
}
?>