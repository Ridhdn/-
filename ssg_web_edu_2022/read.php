<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
</head>

<body>
    <?php
    $connect = mysqli_connect('localhost', 'root', '1234', 'memberDB');

    $number = $_GET['number'];
    session_start();
    $query = "select title, content, date, id, file from board where number = $number";
    $result= mysqli_query($connect, $query);
    $rows = mysqli_fetch_assoc($result);

    ?>

    <table>
        <tr>
            <td>제목</td>
            <td><?php echo $rows['title'] ?></td>
        </tr>
        <tr>
            <td>작성자</td>
            <td><?php echo $rows['id'] ?></td>
            <tr>
        </tr>


        <tr>
            <td>내용</td>
            <td><?php echo $rows['content'] ?></td>
        </tr>
    </table>

    <div class="read_btn">
        <button onclick="location.href='./mypage.php'">목록</button>&nbsp;&nbsp;
        <button onclick="location.href='./modify.php?number=<?= $number ?>&id=<?= $_SESSION['user_id'] ?>'">수정</button>&nbsp;&nbsp;
        <button onclick="location.href='./delete.php?number=<?= $number ?>&id=<?= $_SESSION['user_id'] ?>'">삭제</button>
        <button onclick="location.href='./comment.php?number=<?= $number ?>&id=<?= $_SESSION['user_id']?>'">댓글 달기</button>
        <button onclick="location.href='./comment_view.php?number=<?= $number ?>&id=<?= $_SESSION['user_id']?>'">댓글 보기</button>
        <br>
        <?php
        if($rows['file']!=NULL){
        ?>
        파일 : <a href="./file/upload/<?php echo $rows['file'];?>" download><?php echo $rows['file']; ?></a>
        <?php
        }
        ?>
    </div>

</body>

</html>