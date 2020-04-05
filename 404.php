<?php
$salt =  '`~1!2@3#4$5%6^7&8*9(0)-_=+';
$password = "mypasswordisroot";
$passwordWithSalt = $salt . $password;
$storedHash = password_hash($passwordWithSalt, PASSWORD_DEFAULT);
echo ($storedHash);

if (password_verify($salt . $password, $storedHash)) {
    echo ('        verified');
}
?>
<p>kshdfkhjskfdjhkjf</p>