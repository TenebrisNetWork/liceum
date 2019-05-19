<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>login</p>
        <input name="login" type="text">
        <p>passwoerrd</p>
        <input name="password" type="text">
        <p>password confirm</p>
        <input name="password_confirm" type="text">
        <p>email</p>
        <input name="email" type="text">
        <button type="sumbit" name="sumbit">регистарция</button>
    </form>
    <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    
</body>
</html>