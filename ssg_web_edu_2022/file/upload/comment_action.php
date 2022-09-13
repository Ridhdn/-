<?php

$connect = mysqli_connect("localhost", "root", "1234", "memberDB");

$board_number = $_POST['number'];
$id = $_POST['name'];                   
$content = $_POST['content'];           
$date = date('Y-m-d H:i:s');          

$URL = './read.php';                  

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