<?php
include('../app/database/connect.php');
include('../app/database/db.php');
include('../app/helpers/validateUser.php');
include('../app/controllers/users.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h1>Register</h1>
            <?php include('../app/helpers/flashmessage.php') ?>
            <div class="form-group">
                <label for="my-input">full name</label>
                <input id="my-input" class="form-control" type="text" name="fullname">
            </div>
            <div class="form-group">
                <label for="my-input">email</label>
                <input id="my-input" class="form-control" type="email" name="email">
            </div>
            <div class="form-group">
                <label for="my-input">password</label>
                <input id="my-input" class="form-control" type="password" name="password">
            </div>
            <div class="form-group">
                <label for="my-input">phone number</label>
                <input id="my-input" class="form-control" type="text" name="phone_number">
            </div>
            <button type="submit" name="register" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="container mt-10">
        <h1>Login</h1>
        <?php
        if (isset($_POST['login'])) {
            if (count($errorLogin) > 0) : ?>

                <div class="alert alert-danger">
                    <?php foreach ($errorLogin as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </div>
        <?php endif;
        } ?>
        <form method="POST" action="login-reg.php">
            <div class="form-group">
                <label for="my-input">email</label>
                <input id="my-input" class="form-control" type="text" name="email">
            </div>
            <div class="form-group">
                <label for="my-input">password</label>
                <input id="my-input" class="form-control" type="text" name="password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>