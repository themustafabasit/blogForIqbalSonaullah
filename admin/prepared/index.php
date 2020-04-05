<!DOCTYPE html>
<html lang="en">


<?php
require('../../global/connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = dbPreparedStatementSelectLogin('1', '1');
    if ($data === false) {
        echo ('failed');
    } else {
        echo ($data['username']);
        echo ($data['password']);
        echo ($data['usertype']);
    }
}
?>


<head>
    <meta charset=" UTF - 8 ">
    <meta name=" viewport " content=" width = device - width, initial - scale = 1.0 ">
    <meta http-equiv=" X - UA - Compatible " content=" ie = edge ">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="<?php echo htmlspecialchars('../' . basename(dirname(__FILE__)) . '/'); ?>">
        <input type="text" name="pass" id="">
        <input type="text" name="user" id="">
        <input type="submit" value="">
    </form>


</body>

</html>