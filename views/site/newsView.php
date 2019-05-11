<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $newsItem["NewsTitle"]?></title>
</head>
<body>
    <div class="post">
        <h1><?php echo $newsItem["NewsTitle"]?></h1>
        <p>
        <?php echo $newsItem["NewsContent"]?>
        </p>
    </div>
    
</body>
</html>