<!---->
<!--<form action='/upload' method='post' enctype='multipart/form-data'>-->
<!--    <input type='file' name='receipt'>-->
<!--    <button type='submit'>Upload</button>-->
<!--</form>-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Home page
    <div>
        <?php if(!empty($invoice)) : ?>
            Invoice Id <?= $invoice['id'] ?> <br>
            Invoice Amount <?= $invoice['amount'] ?> <br>
            Invoice Full name <?= $invoice['full_name'] ?> <br>
        <?php endif ?>
    </div>
</body>
</html>