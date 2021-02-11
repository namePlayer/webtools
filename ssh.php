<?php
require_once 'vendor/autoload.php';

ob_start();
imagepng(__DIR__.'/storage/user/0NtMVVJXEW.png', '');
$imageString = base64_encode(ob_get_contents());
ob_end_clean();

?>

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
    <img src="data:image/png;base64,<?= $imageString ?>">
</body>
</html>
