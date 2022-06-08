<?php

function login()
{

    $data = getUser();

    $email = $_POST['email'];
    $password = $_POST['password'];

    foreach ($data as $key => $value) {
        if ($value['email'] === $email && password_verify($password, $value['password'])) {
            session_start();
            $_SESSION['name'] = $value['name'];
            $_SESSION['start'] = time();
            header('location: .././dashboard.php');
        } else {
            header('location: ../.././index.php?login=false');
        }
    }
}


function getUser()
{

    $file = file_get_contents('../.././resources/users.json');
    $data = json_decode($file, true);

    return $data;
}
