<?php
    #include ("database.php");
    header("Content-Type: application/json");
    $parameters = json_decode(stripslashes(file_get_contents("php://input")), true);
    #require('sha256.php');
    #$username = $parameters['uid'];
    #$encw = $parameters['encw'];

    $rand_string = generateRandomString(16);

    echo getPassword('carlkwok');

    function getPassword($uid) {
        /* Database connection settings */
        $host = 'mysql.comp.polyu.edu.hk';
        $username = '16086542d';
        $password = 'bkgqihss';
        $database = '16086542d';
        $conn = new mysqli($host, $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        try {
            $sql = 'SELECT password FROM comp3334auth WHERE username = "'.$uid.'"';
            $queryresult = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
            return $queryresult[0]['password'];
        } catch (Exception $e) {
            echo "error ".$e;
        }
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