<?php

function sanitizeInput($input)
{

    //$input = mysqli_real_escape_string($input);
    $input = strip_tags($input);
    $input = htmlspecialchars($input);
    return $input;
}
