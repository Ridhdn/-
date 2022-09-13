<!DOCTYPE html>
<html>

<body>
    <?php session_start();?>
    <form method="post" action="comment_action.php">
        <?php $number111=$_GET['number']; ?>
        <?php $name111=$_GET['id']; ?>
        <table style="padding-top:50px" align=center width=auto border=0 cellpadding=2>
        <tr>
                    <p style="text-align:center;"><b>댓글 달기</b></p>
                </td>
            <tr>
                <td bgcolor=white>
                    <table class="table2">
                        <tr>
                            <td>작성자: </td>
                            <td><?php print($_GET['id']); ?></td>
                            <input type = "hidden" name = "name" value = "<?php echo $_GET['id']; ?>">
                        </tr>

                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" cols=75 rows=15></textarea></td>
                        </tr>

                    </table>

                    <center>
                        <input type = "hidden" name = "number" value = "<?php echo $number111; ?>">
                        <input type="submit" value="작성">
                    </center>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>