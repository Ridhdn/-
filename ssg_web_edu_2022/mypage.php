<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    $connect = mysqli_connect('localhost', 'root', '1234', 'memberDB');
    $query = "select * from board order by number desc";
    $result = mysqli_query($connect, $query);
    // $result = $connect->query($query);
    $total = mysqli_num_rows($result);

    session_start();

    if (isset($_SESSION['user_id'])) {
    ?><b><?php echo $_SESSION['user_id']; ?></b>님 반갑습니다.
        <button onclick="location.href='logout_action.php'" align="right">로그아웃</button>
        <br>
        <br>
        참고: 첫 번째 댓글은 안보여요...
        <br/>
    <?php
    } else {
    ?>
        <button onclick="location.href='./index.php'">로그인</button>
        <br/>
    <?php
    }
    ?>

    <p align=center><b>게시판</b></p>

    <table align=center>
        <thead align="center">
            <tr>
                <td width="50" align="center">번호</td>
                <td width="500" align="center">제목</td>
                <td width="100" align="center">작성자</td>
                <td width="200" align="center">날짜</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) {   //result set에서 레코드(행)를 1개씩 리턴
                    ?>
                    <td width="50" align="center"><?php echo $total ?></td>
                    <td width="500" align="center">
                        <a href="read.php?number=<?php echo $rows['number'] ?>">
                            <?php echo $rows['title'] ?>
                    </td>
                    <td width="100" align="center"><?php echo $rows['id'] ?></td>
                    <td width="200" align="center"><?php echo $rows['date'] ?></td>
                    </tr>
                <?php
                $total--;
            }
                ?>
        </tbody>
    </table>
        <center>
        <button type="button" onClick="location.href='./write.php'">글쓰기</button>
        </center>

</body>

</html>