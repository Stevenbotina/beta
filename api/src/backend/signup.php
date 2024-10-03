<?php
    //Database connection
    require("../../config/db_connection.php");

    //Get data from register_form
    $email = $_POST['email'];
    $pass = $_POST['passwd'];

    //Encrypt password using md5 algorithm
    $enc_pass = md5($pass);

    //Insert data into database
    $query = "INSERT INTO users (email, password) VALUES ('$email', '$enc_pass')";
    $result = pg_query($conn, $query);

    if ($result) {
        echo "User registered successfully";
    } else {
        echo "Error occurred ";
    }

    pg_close($conn);
?>