<?php
    require_once('connect.php');

    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $connection = new mysqli($host, $user, $pass, $database);

    $register_querry = "INSERT INTO users (id, user, pass) VALUES ('', '$login', '$password')" ;
    $check_querry = "SELECT * FROM users WHERE user='$login'";

    $table = $connection->query($check_querry);

    if($connection->errno == 0){

        if($table->num_rows == 0){
            $connection->query($register_querry);
            header('LOCATION: index.php');
            $connection->close();
        }else{
            echo "Login już istnieje<br>";
            echo '<a href="register.php">Powrót</a>';
            $connection->close();
        }
    }else{

        $connection->errno;
        die();
    }