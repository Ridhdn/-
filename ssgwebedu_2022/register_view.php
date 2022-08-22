<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
</head>
<body>
    
    <form action="register_server.php" method="post">
    <h2>회원가입</h2>

    <?php if(isset($_GET['error'])){ ?>
    <p><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <?php if(isset($_GET['success'])){ ?>
    <p><?php echo $_GET['success']; ?></p>
    <?php } ?>
    
    <label>아이디</label>
    <input type="text" name="user_id">
    <br>

    <label>닉네임</label>
    <input type="text" name="user_nick">
    <br>

    <label>비밀번호</label>
    <input type="password" name="pass1">
    <br>

    <label>비밀번호 확인</label>
    <input type="password" name="pass2">
    <br>

    <button type="submit">저장</button>
    <br>
    <a href="index.php">이미 회원가입이신가요>(로그인페이지)</a>

    </form>

</body>
</html>