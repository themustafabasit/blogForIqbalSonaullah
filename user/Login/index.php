<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    sleep(5);
    die('invalid username or password');
}
?>

<body>
    <form method="POST" action="<?php echo htmlspecialchars('../' . basename(dirname(__FILE__)) . '/'); ?>">
        <input type="text" name="username" id="username">
        <input type="password" name="password" id="pass">
        <input type="submit" value="login" name="loginSubmit">
    </form>
</body>

</html>