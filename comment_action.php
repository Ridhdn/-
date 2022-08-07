<?php
$connect = mysqli_connect("localhost", "root", "1234", "memberDB");

$board_number=$_POST['board_number'];
$id = $_POST['name'];                   //Writer
$content = $_POST['content'];           //Content
$date = date('Y-m-d H:i:s');            //Date

$URL = './mypage.php';                   //return URL


$query = "INSERT INTO comment (number,board_number, content, date, id); 
        values(null,'$title', '$content', '$date', '$id')";


$result = $connect->query($query);
if ($result) {
?> <script>
        alert("<?php echo "댓글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
    </script>
<?php
} else {
    echo "댓글 등록에 실패하였습니다.";
}

mysqli_close($connect);
?>