<?php

session_start();

$connect = mysqli_connect("localhost", "root", "1234", "memberDB");

$board_number = $_POST['number'];
$id = $_SESSION['user_id'];                   
$content = $_POST['content'];           
$date = date('Y-m-d H:i:s');          

$URL = './read.php';                  

if(preg_match('/\>/',$content)||preg_match('/\</',$content)){
    echo "사용 금지된 문자를 사용했습니다.";
    exit();
}
if(preg_match('/\>/',$title)||preg_match('/\</',$title)){
    echo "사용 금지된 문자를 사용했습니다.";
    exit();
}

$query = "INSERT INTO comment (number,board_number, id, content, date)
        values(null, $board_number, '$id', '$content', '$date')";

$result = $connect->query($query);
if ($result) {
?> <script>
        alert("<?php echo "댓글이 등록되었습니다." ?>");
        location.replace("./read.php?number=<?= $board_number ?>");
    </script>
<?php
} else {
    echo "댓글 등록에 실패하였습니다.";
}


mysqli_close($connect);
?>