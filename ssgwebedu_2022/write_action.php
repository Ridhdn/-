<?php
$connect = mysqli_connect("localhost", "root", "1234", "memberDB");

$id = $_POST['name'];                   //Writer
$title = $_POST['title'];              //Title
$content = $_POST['content'];           //Content
$date = date('Y-m-d H:i:s');            //Date

$URL = './mypage.php';                   //return URL

if(isset($_POST['name']) && isset($_POST['title']) && isset($_POST['content']) && $_FILES['upload_file']==NULL){
    $query = "INSERT INTO board (number, title, content, date, id, file)
        values(null,'$title', '$content', '$date', '$id', NULL)";
    $result = $connect->query($query);
    if ($result) {
    ?> <script>
        alert("<?php echo "게시글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
        </script>
        <?php
        } else {
        echo "게시글 등록에 실패하였습니다.";
    }
}
else if(isset($_POST['name']) && isset($_POST['title']) && isset($_POST['content']) && $_FILES['upload_file']!=NULL)
{
    $tmp_name=$_FILES['upload_file']['tmp_name'];
    $name=$_FILES['upload_file']['name'];
    $up=move_uploaded_file($tmp_name, "./img/$name");
    if($up==TRUE){
        echo "파일이 정상적으로 업로드 되었습니다.";
    }
    else{
        echo "파일 업로드에 실패하였습니다.";
    }

    $query = "INSERT INTO board (number, title, content, date, id, file)
        values(null,'$title', '$content', '$date', '$id', '$name')";
    $result = $connect->query($query);
    if ($result) {
    ?> <script>
        alert("<?php echo "게시글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
        </script>
        <?php
        } else {
        echo "게시글 등록에 실패하였습니다.";
    }
}
else
{
    echo
    "<script>
    alert('잘못 입력하셨습니다.');
    location.replace('write.php');
    </script>";
}
mysqli_close($connect);
?>