<?php require_once 'process.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login Yourself in</title>
</head>

<body>


    <header class="container frm-to-login">
        <form class="inline" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <fieldset class="form-group pad-left">
                <input class="form-control form-control-sm" placeholder="Username" class="form-control" type="text" id="user" name="username" />
                <span class="error"><?= $username_error ?></span>
            </fieldset>

            <fieldset class="form-group pad-left">
                <input class=" form-control form-control-sm" placeholder="Email" class="form-control" type="text" id="email" name="email" />
            </fieldset>

            <fieldset class="form-group pad-left">
                <input class="form-control form-control-sm" placeholder="Password" class="form-control" type="password" id="password" name="password" />
            </fieldset>

            <fieldset class="form-group pad-left">
                <button class="btn btn-linf-k btn-sm text-info" type="submit" name="login" id="btn" value="Login">Connect</button>
            </fieldset>
        </form>
    </header>



    <div class="container">
        <h1 class="text-info">Get started</h1>
        <h3 class="text-muted">Register as new member or login your account</h3>
    </div>


    <div class="container frm_to_signup">



        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row">
                <fieldset class="form-group col-md-4">
                    <label for="username">Username</label>
                    <input class="form-control " placeholder="Username" type="text" id="username" name="username" value="<?= $username ?>" autofocus>
                    <span class="error"><?= $username_error ?></span>
                </fieldset>

                <fieldset class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input class="form-control " placeholder="Email" type="text" id="email" name="email" value="<?= $email ?>" autofocus>
                    <small id="emailHelp" class="form-text text-info">We'll never share your email with anyone else.</small>
                    <span class="error"><?= $email_error ?></span>
                </fieldset>

                <fieldset class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input class="form-control " placeholder="Password" type="password" id="password" name="password" value="<?= $password ?>" autofocus>
                    <small id="emailHelp" class="form-text text-info">For the security, chose at least one capital letter, one number, one character.</small>
                    <span class="error"><?= $password_error ?></span>
                </fieldset>
            </div>

            <div class="row">
                <fieldset class="form-group col-md-6">
                    <label for="firstname">Firstname</label>
                    <input class="form-control " placeholder="Firstname" type="text" id="firstname" name="firstname" value="<?= $firstname ?>" autofocus>
                    <span class="error"><?= $firstname_error ?></span>
                </fieldset>

                <fieldset class="form-group col-md-6">
                    <label for="lastname">Lastname</label>
                    <input class="form-control" placeholder="Lastname" type="text" id="lastname" name="lasttname" value="<?= $lasttname ?>" autofocus>
                    <span class="error"><?= $lastname_error ?></span>
                </fieldset>
            </div>

            <fieldset class="form-group">
                <label for="linkedin">Linkedin</label>
                <input class="form-control " placeholder="http://" type="text" id="linkedin" name="url" value="<?= $linkedin ?>" autofocus>
                <span class="error"><?= $linkedin_error ?></span>
            </fieldset>

            <fieldset class="form-group">
                <label for="github">Github</label>
                <input class="form-control" placeholder="http://" type="text" id="github" name="url" value="<?= $github ?>" autofocus>
                <span class="error"><?= $linked_error ?></span>
            </fieldset>

            <fieldset class="form-group">
                <button class="btn btn-outline-info" type="submit" id="signup" name="signup" value="signup">Sign up</button>
            </fieldset>
        </form>
    </div>




</body>

</html>