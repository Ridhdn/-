<?php
session_start();
$result = session_destroy();

if ($result) {  //성공시 True, 실패시 False 반환

    echo "<script>location.href='./index.php'</script>";

} ?>