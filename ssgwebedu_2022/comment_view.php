<!DOCTYPE html>
<html>

<body>
    <?php
    echo $_GET['number'];
    $number123=$_GET['number'];
    $connect = mysqli_connect('localhost', 'root', '1234', 'memberDB');
    $query = "select id, date, content, board_number from comment where board_number=$number123";
    $result = mysqli_query($connect, $query);
    $rows = mysqli_fetch_assoc($result);
    // $result = $connect->query($query);
    $total = mysqli_num_rows($result);
    session_start();
    ?>

    <p style="font-size:25px; text-align:center"><b>댓글</b></p>

    <table align=center>
        <thead align="center">
            <tr>
                <td width="100" align="center">작성자</td>
                <td width="500" align="center">댓글</td>
                <td width="200" align="center">날짜</td>

            </tr>
        </thead>
        <tbody>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) {  //result set에서 레코드(행)를 1개씩 리턴
                ?>
                <td width="100" align="center"><?php echo $rows['id'] ?></td>
                <td width="500" align="center"><?php echo $rows['content'] ?></td>
                <td width="200" align="center"><?php echo $rows['date'] ?></td>
                </tr>
            <?php
            $total--;
        }
                    

                ?>
        </tbody>
    </table>
</body>

</html>