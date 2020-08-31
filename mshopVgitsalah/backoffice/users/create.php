<?php 
include('../../app/database/connect.php');
include('../../app/database/db.php');
include('../../app/controllers/middleware.php');
adminOnly();
include('../../app/helpers/validateUser.php');
include('../../app/controllers/users.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Add user | backoffice </title>
</head>
<body>
<div class="container">
        <form action="" method="post">
            <h1>Register</h1>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Back to dashboard</a>
            <?php include('../../app/helpers/flashmessage.php') ?>
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
                <input id="my-input" class="form-control" type="tel" name="phone_number" placeholder="06XXXXXXXX" pattern="[0-9]{10}" required>
            </div>
            <div class="form-group">
           
                   <label class="">
                       <input type="checkbox" name="admin" > admin
                   </label>
               </div>
       
            <button type="submit" name="registerBackoffice" class="btn btn-primary">Submit</button>
        </form>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>