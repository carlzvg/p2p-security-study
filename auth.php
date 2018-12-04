<?php
    include ("database.php");
    header("Content-Type: application/json");
    $parameters = json_decode(stripslashes(file_get_contents("php://input")), true);
    #require('sha256.php');
    #$username = $parameters['uid'];
    #$encw = $parameters['encw'];

    $rand_string = generateRandomString(16);
    echo $rand_string;

    echo getPasswrod($username);

    function getPassword($username) {
        $sql = 'SELECT password FROM comp3334-auth WHERE username = "'.$username.'"';
        $conn->query($sql);

    }
    
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

?>