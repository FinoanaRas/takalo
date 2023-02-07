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
        <h1>Upload de photo</h1>
        <form action="<?php echo site_url('ImageController/multiUploads')?>" method="post">
            <p><input type="text" name="images[]" class="form-controler"></p>
            <p><input type="text" name="images[]" class="form-controler"></p>
            <p><input type="text" name="images[]" class="form-controler"></p>
            <input type="submit" value="valider">
        </form>
        </div>
    </body>
</html>