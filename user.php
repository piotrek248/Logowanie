<?php
    session_start();

    if(!isset($_SESSION['logged']) && $_SESSION['logged'] == false){
        header('Location:index.php');
        exit();
    }
?>

<!DOCTYPE html>
<head>

</head>
<body>
    <h1>Strona użyytkownika</h1>
    <br>
    <?php
    echo "<h2>Witaj". $_SESSION['user']."</h2>";
    ?>
    <a href="logout.php">Wyloguj</a>
    <br>
    <img src="dictator.jpg">
</body>