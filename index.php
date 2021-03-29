<?php
    session_start();

    if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
        header('Location: user.php');
        exit();
    }
?>

<!DOCTYPE html>
<head>

</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="login"/>
        <br/>
        <input type="password" name="password"/>
        <br/>
        <button type="submit">log in</button>
    </form>
    <a href="register.php">Zarejestruj się</a>
</body>