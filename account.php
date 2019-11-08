<?php require_once 'process.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>User's account</title>
</head>



<?php



try {
    $result = $mysqli->query("SELECT * FROM student"); //On stock le résultat dans un query
} catch (PDOException $e) {
    die($e->getMessage());
    exit();
}

// $row = $result->fetch_assoc();

try {
    $mysqli = new mysqli('database', 'root', 'root', 'becode');  // Link avec la DB base msqli avec même structure de try and catch. 
} catch (PDOException $e) {
    die($e->getMessage());
}

$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM student WHERE id=$id");
$row = $result->fetch_assoc();


?>

<header>
    <div class="usr-disconnect">
        <?php
        if (isset($_SESSION['message']) && !empty($_SESSION['message'])) :

            ?>
            <div class="alert-width alert alert-<?= $_SESSION['msg_type'] ?>">
                <?php
                    echo $_SESSION['message'];   // Faire apparaître le message de session
                    $_SESSION['message'] = '';

                    ?>
            </div>
        <?php endif ?>
        <p class="text-info user">Welcome <?= $row['username']; ?></p>
        <a class="text-secondary" id="disconnect" href="account.php?disconnect=<?php $id = $_GET['id'];
                                                                                echo $id; ?>">Disconnect</a>
    </div>
</header>

<body>
    <main class="account">
        <div class=" container align-left">
            <h1 class="text-info" style="padding-left : 50px;">Welcome on Troutter!<h1>
                    <h2 class="text-secondary" style="padding-left : 50px;">The network of the trouts...<h2>
                            <small id="emailHelp" class="form-text text-warning" style="padding-left : 50px; padding-bottom :30px;">It's free and always'll be. Don't you think?</small>
                            <img class=" trout-picture" src="http://images.squarespace-cdn.com/content/v1/52eff0e4e4b0f54fe4320d38/1542729165032-DFTT9804JQ88BCUZGQQM/ke17ZwdGBToddI8pDm48kAlLxCFIp4GMiu0uvIj-MAB7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UV751r1y8v0Nn5cT-u8g05O7qFlQjPbzHf9e1Oz0-ZttkZ2eXzA4C6JTN9Siv5q_Ow/IMG_6338.jpg" alt="trouts-picture">

        </div>

        <form class="frm-to-edit align-right" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <h3 class="text-info" style="padding-bottom:20px">Your details:</h3>
            <fieldset class="form-group">
                <label for="username">Username</label> <span class="error"><?= $username_error ?></span>
                <input disabled class="form-control form-control-sm " placeholder="Username" type="text" id="username" name="username" value="<?= $row['username']; ?>">
            </fieldset>

            <fieldset class=" form-group ">
                <label for="email">Email</label> <span class="error"><?= $email_error ?></span>
                <input disabled class="form-control form-control-sm" placeholder="Email" type="text" id="email" name="email" value="<?= $row['email']; ?>">
            </fieldset>

            <fieldset class="form-group">
                <label for="password">Password<abbr title="Your password must contain at least 8 characters, 1 number and 1 uppercase">*</abbr></label> <span class="error"><?= $password_error ?></span>
                <input disabled class="form-control form-control-sm " placeholder="Password" type="password" id="password" name="password" value="<?= $row['password']; ?>">
            </fieldset>

            <fieldset class="form-group">
                <label for="password">Confirmation</label> <span class="error"><?= $passwordconfirmation_error ?></span>
                <input disabled class="form-control form-control-sm " placeholder="Password" type="password" id="passwordconfirmation" name="passwordconfirmation" value="<?= $row['passwordconfirmation']; ?>">
            </fieldset>

            <fieldset class="form-group ">
                <label for="firstname">Firstname</label><span class="error"><?= $firstname_error ?></span>
                <input disabled class="form-control form-control-sm " placeholder="Firstname" type="text" id="firstname" name="firstname" value="<?= $row['first_name']; ?>">
            </fieldset>

            <fieldset class="form-group">
                <label for="lastname">Lastname</label><span class="error"><?= $lastname_error ?></span>
                <input disabled class="form-control form-control-sm" placeholder="Lastname" type="text" id="lastname" name="lastname" value="<?= $row['last_name']; ?>">
            </fieldset>

            <fieldset class="form-group ">
                <label for=" linkedin">Linkedin</label><span class="error"><?= $linkedin_error ?></span>
                <input disabled class="form-control form-control-sm " placeholder="http://" type="text" id="linkedin" name="linkedin" value="<?= $row['linkedin']; ?>">
            </fieldset>

            <fieldset class="form-group">
                <label for=" github">Github</label> <span class="error"><?= $github_error ?></span>
                <input disabled class="form-control form-control-sm" placeholder="http://" type="text" id="github" name="github" value="<?= $row['github'] ?>">
            </fieldset>


            <div class="inline-btn">
                <button class=" btn btn-outline-info btn-sm " id="update" name="update" value="edit">Update</button>
                <a class=" btn btn-outline-success btn-sm text-success " id="edit" name="edit" value="edit">Edit</a>
                <a href="account.php?delete=<?php $id = $_GET['id'];
                                            echo $id; ?>" class="btn btn-outline-danger btn-sm " id="delete" name="delete" value="delete">Delete</a>
            </div>
        </form>
    </main>
    <script type="text/javascript" src="functions.js"></script>
</body>



</html>