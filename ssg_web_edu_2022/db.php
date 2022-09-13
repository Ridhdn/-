<?php
$db = mysqli_connect('localhost','root','1234','memberDB');

if($db)
{
    echo "DB접속 성공";
}

else{
    echo "DB접속 실패";
}
?>