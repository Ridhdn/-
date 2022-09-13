<?php
$connect = mysqli_connect("localhost", "root", "1234", "memberDB");

session_start();

$id = $_SESSION['user_id'];                   
$title = $_POST['title'];              
$content = $_POST['content'];           
$date = date('Y-m-d H:i:s');  
$name=$_FILES['upload_file']['name'];          

$URL = './mypage.php';                   //return URL

if( isset($_POST['title']) && isset($_POST['content']) && $name=='')
{
    if(preg_match('/\>/',$content)||preg_match('/\</',$content)){
        echo "사용 금지된 문자를 사용했습니다.";
        exit();
    }
    if(preg_match('/\>/',$title)||preg_match('/\</',$title)){
        echo "사용 금지된 문자를 사용했습니다.";
        exit();
    }
    $query = "INSERT INTO board (number, title, content, date, id, file)
        values(null,'$title', '$content', '$date', '$id', NULL)";
    $result = $connect->query($query);
    if ($result) {
    ?> <script>
        alert("<?php echo "게시글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
        </script>
        
        <?php
        }
      else {
        echo "게시글 등록에 실패하였습니다.";
    }
}
else if( isset($_POST['title']) && isset($_POST['content']) && $name!='')
{
    $not_allow = array("<", ">");
	if(in_array($title, $not_allow)||in_array($content, $not_allow)) {
		echo "사용 금지된 문자를 사용했습니다.";
		exit;
	}
    if(preg_match('/\>/',$title)||preg_match('/\</',$title)){
        echo "사용 금지된 문자를 사용했습니다.";
        exit();
    }
    $filename_ext = strtolower(array_pop(explode('.',$name)));
    $allow_ext = array("jpg", "hwp", "pptx", "docx", "xlsx", "pdf","png");
	if(!in_array($filename_ext, $allow_ext)) {
		echo "허용되지않는 확장자 파일입니다.";
		exit;
	}
    
    $tmp_name=$_FILES['upload_file']['tmp_name'];
    $up=move_uploaded_file($tmp_name, "./file/upload/".$name);
    if($up){
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