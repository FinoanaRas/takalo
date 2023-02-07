<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url()?>assets/css/bootstrap/bootstrap.css">
    <title>Document</title>
</head>
    <body>
        <div class="container">
        <h1>S'inscrire</h1>
        <form action="<?php echo site_url('SignIn/checkSignIn')?>" method="post">
            <p><input type="text" name="nom" placeholder="nom" class="form-controler"></p>
            <p><input type="text" name="email" placeholder="email" class="form-controler"></p>
            <p><input type="date" name="dtn" class="form-controler"></p>
            <p><input type="password" name="pass" placeholder="password" class="form-controler"></p>
            <input type="submit" value="valider">
        </form>
        <a href="<?php echo site_url('Login')?>">Déjà inscrit? Se connecter</a>
        </div>
    </body>
</html>