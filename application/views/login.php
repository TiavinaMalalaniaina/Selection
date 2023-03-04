<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="<?php echo site_url('welcome/login'); ?>" method="post">
        <input type="text" name="user" placeholder="insert your username"> 
        <input type="text" name="mdp" placeholder="insert your password"> 
        <input type="submit" value="valider">
    </form>
</body>
</html>