<?php
session_start();
include('functions.php');



// CONNECT TO SERVER AND SELECT DATABASE (possible to use PDO_MySQL instead of mysqli)

try {
    $mysqli = new mysqli('database', 'root', 'root', 'becode') or die(mysqli_error($mysqli));
} catch (PDOException $e) {
    die($e->getMessage());
    exit();
}

// QUERY THE DATABASE FOR THE USER

if (isset($_POST['login'])) {

    // GET VALUES FROM FORM IN INDEX.PHP FILE

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    // TO PREVENT mysql injection

    $username = test_input($username);
    $email = test_input($email);

    //
    try {
        $result = $mysqli->query("SELECT * FROM student WHERE username = '$username' and email = '$email' and password = '$password'");
        if (count([$result]) == 1) {
            $row = $result->fetch_array();
            if (($row['username'] == $username && $row['email'] == $email && $row['password'] == $passeword)
                && (!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
            ) {
                $id =  $row['id'];
                header("Location:account.php?id=$id");
            } else {
                echo "Failed to login!";
            }
        }
    } catch (PDOException $e) {
        die($e->getMessage());
        exit();
    }
}

//////////////////////////////////////////////////// IF SAVE BUTTON HAS BEEN CLICKED////////////////////////////////////////////////////////

if (isset($_POST['save'])) {   // POST renvoi à la méthode POST du forme et le save, le name du button. Une fois qu'il y est pressé, on reprend alors les value des fields.

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordconfirmation = $_POST['passwordconfirmation'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $linkedin = $_POST['linkedin'];
    $github = $_POST['github'];


    // VALIDATION OF USERNAME FIELD

    if (empty($_POST["username"])) {
        $username_error = "Username is required";
        $counter++;
    } else {
        $username = test_input($_POST["username"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
            $username_error = "Only letters and numbers";
            $counter++;
        }
    }


    // VALIDATION OF EMAIL FIELD

    if (empty($_POST["email"])) {
        $email_error = "Email is required";
        $counter++;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format";
            $counter++;
        }
    }

    // VALIDATION OF PASSWORD

    if (empty($_POST["password"])) {
        $password_error = "Password is required";
        $counter++;
    } else {
        $password = $_POST["password"];
        if (!preg_match("^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^", $password)) {
            $password_error = "Invalid password";
            $counter++;
        }
    }

    // VALIDATION OF PASSWORD CONFIRMATION

    if (empty($_POST["passwordconfirmation"])) {
        $passwordconfirmation_error = "Confirmation is required";
        $counter++;
    } else {
        $passwordconfirmation = $_POST["passwordconfirmation"];
        if ($passwordconfirmation !== $password) {
            $passwordconfirmation_error = "Confirmation do not match!";
            $counter++;
        }
    }

    // VALIDATION OF FIRSTNAME FIELD

    if (empty($_POST["firstname"])) {
        $firstname_error = "Firstname is required";
        $counter++;
    } else {
        $firstname = test_input($_POST["firstname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
            $firstname_error = "Only letters and white space allowed";
            $counter++;
        }
    }


    // VALIDATION OF LASTNAME FIELD

    if (empty($_POST["lastname"])) {
        $lastname_error = "Lastname is required";
        $counter++;
    } else {
        $lastname = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
            $lastname_error = "Only letters and white space allowed";
            $counter++;
        }
    }

    // VALIDATION OF LINKEDIN FIELD

    if (empty($_POST["linkedin"])) {
        $linkedin_error = "";
    } else {
        $linkedin = test_input($_POST["linkedin"]);
        // check if URL address synthax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%=~_|]/i", $linkedin)) {
            $linkedin_error = "Invalid URL";
        }
    }

    // VALIDATION OF GITHUB FIELD

    if (empty($_POST["github"])) {
        $github_error = "";
    } else {
        $github = test_input($_POST["github"]);
        // check if URL address synthax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%=~_|]/i", $github)) {
            $github_error = "Invalid URL";
        }
    }

    if ($counter == 0) {

        try {
            $mysqli->query("INSERT INTO student (username, email, password, passwordconfirmation, first_name, last_name, linkedin, github) VALUES('$username','$email', '$password', '$passwordconfirmation', '$firstname', '$lastname', '$linkedin', '$github')");  // permet d'envoyer les variables vers la database. "Data" = table de DB crud (columns names = name, location)
            $_SESSION['message'] = 'Profil has been saved. Please register !';
            $_SESSION['msg_type'] = 'success';
        } catch (PDOException $e) {
            $_SESSION['message'] = 'Something got your wrong registration';
            $_SESSION['msg_type'] = 'danger';
            die($e->getMessage());
        }
    }
}


//////////////////////////// IF UPDATE BUTTON HAS BEEN CLICKED///////////////////////////////

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $linkedin = $_POST['linkedin'];
    $github = $_POST['github'];

    // VALIDATION OF USERNAME FIELD

    if (empty($_POST["username"])) {
        $username_error = "Username is required";
        $counter++;
    } else {
        $username = test_input($_POST["username"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
            $username_error = "Only letters and numbers";
            $counter++;
        }
    }


    // VALIDATION OF EMAIL FIELD

    if (empty($_POST["email"])) {
        $email_error = "Email is required";
        $counter++;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format";
            $counter++;
        }
    }

    // VALIDATION OF PASSWORD

    if (empty($_POST["password"])) {
        $password_error = "Password is required";
        $counter++;
    } else {
        $password = test_input($_POST["password"]);
        if (!preg_match("^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^", $password)) {
            $password_error = "Invalid password";
            $counter++;
        }
    }

    // VALIDATION OF PASSWORD CONFIRMATION

    if (empty($_POST["passwordconfirmation"])) {
        $passwordconfirmation_error = "Confirmation is required";
        $counter++;
    } else {
        $passwordconfirmation = test_input($_POST["passwordconfirmation"]);
        if ($passwordconfirmation !== $password) {
            $passwordconfirmation_error = "Confirmation do not match!";
            $counter++;
        }
    }

    // VALIDATION OF FIRSTNAME FIELD

    if (empty($_POST["firstname"])) {
        $firstname_error = "Firstname is required";
        $counter++;
    } else {
        $firstname = test_input($_POST["firstname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
            $firstname_error = "Only letters and white space allowed";
            $counter++;
        }
    }


    // VALIDATION OF LASTNAME FIELD

    if (empty($_POST["lastname"])) {
        $lastname_error = "Lastname is required";
        $counter++;
    } else {
        $lastname = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
            $lastname_error = "Only letters and white space allowed";
            $counter++;
        }
    }

    // VALIDATION OF LINKEDIN FIELD

    if (empty($_POST["linkedin"])) {
        $linkedin_error = "";
    } else {
        $linkedin = test_input($_POST["linkedin"]);
        // check if URL address synthax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%=~_|]/i", $linkedin)) {
            $linkedin_error = "Invalid URL";
        }
    }

    // VALIDATION OF GITHUBFIELD

    if (empty($_POST["github"])) {
        $github_error = "";
    } else {
        $github = test_input($_POST["github"]);
        // check if URL address synthax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%=~_|]/i", $github)) {
            $github_error = "Invalid URL";
        }
    }

    if ($counter == 0) {

        try {
            $mysqli->query("UPDATE student SET username = '$username', email = '$email', password = '$password', passwordconfirmation = '$passwordconfirmation', first_name = '$firstname', last_name = '$lastname', linkedin = '$linkedin', github = '$github' WHERE id=$id");
            $_SESSION['message'] = 'Your details have been updated';
            $_SESSION['msg_type'] = 'warning';
            header("Location:account.php?id=$id");
            exit();
        } catch (PDOException $e) {
            $_SESSION['message'] = 'Impossible to edit the account';
            $_SESSION['msg_type'] = 'danger';
            die($e->getMessage());
        }
    }
}


// IF DELETE BUTTON HAS BEEN CLICKED

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    try {
        $mysqli->query("DELETE FROM student WHERE id=$id");
        $_SESSION['message'] = 'Account has been deleted';
        $_SESSION['msg_type'] = 'success';
        header("Location:index.php");
        exit();
    } catch (PDOException $e) {

        $_SESSION['message'] = 'Impossible to delete the account';
        $_SESSION['msg_type'] = 'danger';
        die($e->getMessage());
    }
}

// IF DISCONNECT LINK HAS BEEN CLICKED

if (isset($_GET['disconnect'])) {
    $id = $_GET['disconnect'];

    try {
        $_SESSION['$id'] = array();
        session_destroy();
        header("Location: index.php");
        $_SESSION['message'] = 'Disconnected';
        $_SESSION['msg_type'] = 'success';

        exit();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
