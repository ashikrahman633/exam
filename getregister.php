<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/classes/User.php');
    $user = new User();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name     = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email    = $_POST['email'];

        $registeruser = $user->getRegistration($name, $username, $password, $email);
        if (isset($registeruser)){
            echo $registeruser;
        }
    }
