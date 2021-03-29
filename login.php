<?php
    session_start();

    require_once('connect.php');

    $login = $_POST['login'];
    $haslo = $_POST['password'];

    $connect = new mysqli($host, $user, $pass, $database);
    $login_querry = "SELECT * FROM users WHERE user='$login'";

    if($connect->connect_errno==0){
        $table = $connect->query($login_querry);

        if($table->num_rows > 0){
            $assoc_table = $table->fetch_assoc();
            $hash_correct = password_verify($haslo, $assoc_table['pass']);

            if($assoc_table['user']==$login && $hash_correct){
                $_SESSION['logged'] = true;
                $connect->close();
                header('Location: user.php');
                $_SESSION['user'] = $login;
            }
        
        }else{
            header('Location: index.php');
        }
    }
    else{
        echo $connect->errno;
        die();
    }
?>