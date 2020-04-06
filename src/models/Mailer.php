<?php

namespace Model;

use Exception;

class Mailer
{
    public function sendMessage($email, $message)
    {
        if(empty($email))
        {
            throw new Exception('Email is empty');
        }
        sleep(3);
        echo 'send '.$message . ' to '. $email;

        return true;
    }

    public function send($email, $message)
    {
        if(empty($email))
        {
            throw new Exception('Email is empty');
        }

        echo 'send '.$message . ' to '. $email;

        return true;
    }

    public static function sendStatic($email, $message)
    {
        if(empty($email))
        {
            throw new Exception('Email is empty');
        }

        echo 'send '.$message . ' to '. $email;

        return true;
    }
}