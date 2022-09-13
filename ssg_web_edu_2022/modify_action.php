<?php
$connect = mysqli_connect('localhost', 'root', '1234', 'memberDB');

$number = $_POST['number'];
$title = $_POST['title'];
$content = $_POST['content'];

$date = date('Y-m-d H:i:s');
if(preg_match('/\>/',$content)||preg_match('/\</',$content)){
    echo "사용 금지된 문자를 사용했습니다.";
    exit();
}

$query = "update board set title='$title', content='$content', date='$date' where number=$number";
$result = $connect->query($query);
if ($result) {
?>
    <script>
        alert("수정되었습니다.");
        location.replace("./read.php?number=<?= $number ?>");
    </script>
<?php } else {
    echo "다시 시도해주세요.";
}
?>