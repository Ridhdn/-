<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>
<body>
    
    <form action="login_server.php" method="post">
    <h2>로그인</h2>

    <?php if(isset($_GET['error'])){ ?>
    <p><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <label>아이디</label>
    <input type="text" placeholder="아이디..." name="user_id">
    <br>

    <label>비밀번호</label>
    <input type="password" placeholder="비밀번호..." name="pass1">
    <br>

    <button type="submit">로그인</button>
    <br>
    <a href="register_view.php">회원가입 페이지</a>

    </form>

</body>
</html>