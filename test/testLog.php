<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $date  = date_create('now', timezone_open('Asia/Saigon'))->format('Y-m-d H:i:s');
    echo $date;
    ?>
</body>

</html>