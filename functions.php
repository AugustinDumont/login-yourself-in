<?php

function test_password($pass)
{
    $pass = stripslashes($pass); // remove the \
    $pass = htmlspecialchars($pass); // convert special characters in html characters
    return $pass;
};

function test_input($data)
{ // allow to sort display datas from user before posting
    $data = trim($data); // remove the useless characters
    $data = stripslashes($data); // remove the \
    $data = htmlspecialchars($data); // convert special characters in html characters
    return $data;
};
