<?php
include("constants.php");

function conect()
{
    $host = HOST_NAME;
    $username_db = USERNAME_DB;
    $password_db = PASSWORD_DB;
    $name_db = NAME_DB;

    $con = mysqli_connect($host, $username_db, $password_db, $name_db);

    return $con;
}
