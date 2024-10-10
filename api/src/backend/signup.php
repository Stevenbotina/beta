<?php
    //Database connection
    require("../../config/db_connection.php");

    //Get data from register_form
    $email = $_POST['email'];
    $pass = $_POST['passwd'];

    //Encrypt password using md5 algorithm
    $enc_pass = md5($pass);

    //Validate if email already exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = pg_query($conn, $query);
    $row = pg_fetch_assoc($result);
    
    if ($row) {
        echo "<script>alert('Email already exists!')</script>";
        header('Refresh:0; url=http://127.0.0.1/beta/api/src/register_form.html');
        exit();
    }

    //Insert data into database
    $query = "INSERT INTO users (email, password) VALUES ('$email', '$enc_pass')";
    $result = pg_query($conn, $query);

    if ($result) {
        echo "<script>alert('Registration Successful!')</script>";
        header('Refresh:0; url=http://127.0.0.1/beta/api/src/login_form.html');
    } else {
        echo "Error occurred ";
    }

    pg_close($conn);
?>