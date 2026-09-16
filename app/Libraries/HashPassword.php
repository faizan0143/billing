<?php

namespace App\Libraries;

class HashPassword
{
    public static function check($insertedpassword, $databasepassword)
    {
        if (password_verify($insertedpassword, $databasepassword)) {
            return true;
        } else {
            return false;
        }
    }

    public static function make($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
