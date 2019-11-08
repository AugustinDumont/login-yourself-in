<?php require_once 'process.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login yourself in</title>
</head>

<header class="container frm-to-login">


    <form class="inline" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <?php

        // APPEL et MISE EN FORME des messages de sesssion suite SAVE et DELETE programmés dans process.php 

        if (isset($_SESSION['message']) && !empty($_SESSION['message'])) :

            ?>
            <div class="alert-width alert alert-<?= $_SESSION['msg_type'] ?>">
                <?php
                    echo $_SESSION['message'];   // Faire apparaître le message de session
                    $_SESSION['message'] = '';

                    ?>
            </div>
        <?php endif ?>
        <fieldset class="form-group pad-left">
            <input class="form-control form-control-sm" placeholder="Username" type="text" id="user" name="username" />
        </fieldset>

        <fieldset class="form-group pad-left">
            <input class=" form-control form-control-sm" placeholder="Email" type="text" id="mail" name="email" />
        </fieldset>

        <fieldset class="form-group pad-left">
            <input class="form-control form-control-sm" placeholder="Password" type="password" id="pass" name="password" />
        </fieldset>

        <fieldset class="form-group pad-left">
            <button class="btn btn-linf-k btn-sm text-info" type="submit" name="login" id="btn" value="Login">Connect</button>
        </fieldset>
    </form>
</header>

<body>



    <div class="container">
        <h1 class="text-info">Get trouted!</h1>
        <h3 class="text-muted">Register as new trout member or login your account</h3>
    </div>


    <div class="container frm-to-signup">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row">
                <fieldset class="form-group col-md-4">
                    <label for="username">Username</label><span class="error"><?= $username_error ?></span>
                    <input class="form-control " placeholder="Username" type="text" id="username" name="username" value="<?= $username ?>" autofocus>
                </fieldset>

                <fieldset class="form-group col-md-4">
                    <label for="email">Email</label><span class="error"><?= $email_error ?></span>
                    <input class="form-control " placeholder="Email" type="text" id="email" name="email" value="<?= $email ?>">
                    <small id="emailHelp" class="form-text text-info">We'll never share your email with anyone else.</small>
                </fieldset>

                <fieldset class="form-group col-md-4">
                    <label for="password">Password<abbr title="Your password must contain at least 8 characters, 1 number and 1 uppercase">*</abbr></label><span class="error"><?= $password_error ?></span>
                    <input class="form-control " placeholder="Password" type="password" id="password" name="password" value="<?= $password ?>">
                    <small id="emailHelp" class="form-text text-info">> 8 characters - Upper case - Lower case - Number(s)</small>
                </fieldset>
            </div>
            <div class="row justify-content-end">
                <fieldset class="form-group col-md-4">
                    <label for="password">Password confirmation</label><span class="error"><?= $passwordconfirmation_error ?></span>
                    <input class="form-control " placeholder="Password" type="password" id="passwordconfirmation" name="passwordconfirmation" value="<?= $passwordconfirmation ?>">
                </fieldset>
            </div>

            <div class="row">
                <fieldset class="form-group col-md-6">
                    <label for="firstname">Firstname</label><span class="error"><?= $firstname_error ?></span>
                    <input class="form-control " placeholder="Firstname" type="text" id="firstname" name="firstname" value="<?= $firstname ?>">
                </fieldset>

                <fieldset class="form-group col-md-6">
                    <label for="lastname">Lastname</label> <span class="error"><?= $lastname_error ?></span>
                    <input class="form-control" placeholder="Lastname" type="text" id="lastname" name="lastname" value="<?= $lastname ?>">
                </fieldset>
            </div>

            <fieldset class="form-group">
                <label for="linkedin">Linkedin</label><span class="error"><?= $linkedin_error ?></span>
                <input class="form-control " placeholder="http://" type="text" id="linkedin" name="linkedin" value="<?= $linkedin ?>">
            </fieldset>

            <fieldset class="form-group">
                <label for="github">Github</label> <span class="error"><?= $github_error ?></span>
                <input class="form-control" placeholder="http://" type="text" id="github" name="github" value="<?= $github ?>">
            </fieldset>

            <fieldset class="form-group">
                <button class="btn btn-outline-info btn-right" type="submit" id="save" name="save" value="save">Save</button>
            </fieldset>
        </form>
    </div>
</body>


</html>