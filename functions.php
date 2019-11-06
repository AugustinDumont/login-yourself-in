<?php

function test_password($login)
{
    $data = stripslashes($login); // remove the \
    $data = htmlspecialchars($login); // convert special characters in html characters
    return $login;
};


function test_input($data)
{ // allow to sort display datas from user before posting
    $data = trim($data); // remove the useless characters
    $data = stripslashes($data); // remove the \
    $data = htmlspecialchars($data); // convert special characters in html characters
    return $data;
};
