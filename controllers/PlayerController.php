<?php

class PlayerController
{
    public static function newPlayer(): string
    {
        return md5(time());
    }

    public static function saveUserId($id)
    {
        $_SESSION['user_id'] = $id;
    }

    public static function getUserId()
    {
        return $_SESSION['user_id'];
    }
}