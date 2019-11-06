<?php
include('functions.php');


// GET VALUES FROM FORM IN INDEX.PHP FILE

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// TO PREVENT mysql injection

$username = test_input($username);
$email = test_input($email);
$password = test_password($password);

// CONNECT TO SERVER AND SELECT DATABASE (possible to use PDO_MySQL instead of mysqli)

try {
    $mysqli = new mysqli('database', 'root', 'root', 'becode') or die(mysqli_error($mysqli));
} catch (PDOException $e) {
    die($e->getMessage());
    exit();
}

// QUERY THE DATABASE FOR THE USER

if (isset($_POST['login'])) {
    try {
        $result = $mysqli->query("SELECT * FROM student WHERE username = '$username' and email = '$email' and password = '$password'");
        if (count([$result]) == 1) {
            $row = $result->fetch_array();
            if (($row['username'] == $username && $row['email'] == $email && $row['password'] == $password)
                && (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
            ) {
                echo "Login success!<br> Welcome " . $row['username'] . "!<br> How are you today?";
            } else {
                echo "Failed to login!";
            }
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}


// IF SIGNUP BUTTON HAS BEEN CLICKED

if (isset($_POST['signup'])) {   // POST renvoi à la méthode POST du forme et le save, le name du button. Une fois qu'il y est pressé, on reprend alors les value des fields.

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $linkedin = $_POST['linkedin'];
    $github = $_POST['github'];

    try {
        $mysqli->query("INSERT INTO student (username, email, password, firstname, lastname, linkedin, github) VALUES('$username','$email', '$password', '$firstname', '$lastname', '$linkedin', '$github')");  // permet d'envoyer les variables vers la database. "Data" = table de DB crud (columns names = name, location)
        header("Location:index.php"); // Pour rediriger le visiteur vers la page index après avoir SAVE
        exit(); // TOUJOURS FAIRE SUIVRE header() par un exit !
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
