<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заминский лицей</title>
</head>
<body>
    <h1 style="text-align:center">Зиминский лицей</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam dolor nemo tempore nisi a libero laborum eos illo! Itaque nisi impedit labore sit illo blanditiis unde voluptatum fuga sequi fugit?</p>

        <?php foreach($newsList as $newsItem): ?>
        <div>
            <?php echo $newsItem["NewsTitle"]?>
            <?php echo $newsItem["NewsContent"]?>
        </div>
        <?php endforeach;?>

</body>
</html>