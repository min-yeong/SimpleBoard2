<?php
session_start();

//세션 삭제
$res = session_destroy();

if($res) {
    //다시 로그인 페이지로 이동
    echo "<script>alert(\"로그아웃되었습니다.\");</script>";
    echo("<script>location.replace('/simpleboard/login/login.php');</script>");
}
?>