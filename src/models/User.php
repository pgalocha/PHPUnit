<?php

namespace Model;

class User
{
    public $first_name;

    public $last_name;

    public $email;

    protected $mailer_callable;

    /**
     * @var Mailer
     */
    public $mailer;

    public function getFullName()
    {
        return trim($this->first_name.' '.$this->last_name);
    }

    public function __construct($email = null)
    {
        $this->email = $email;
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function notify($message)
    {
        return  $this->mailer->sendMessage($this->email,$message);
    }

    public function setMailerCallable($mailer_callable)
    {
        $this->mailer_callable = $mailer_callable;
    }

    /**
     * @param $message
     * @return bool
     * @throws \Exception
     */
    public function notifyUser($message)
    {
        return $this->mailer->send($this->email,$message);
    }

    /**
     * @param $message
     * @return bool
     * @throws \Exception
     */
    public function notifyUserStatic($message)
    {
        return call_user_func($this->mailer_callable,$this->email,$message);
    }

    /**
     * @param $message
     * @return bool
     * @throws \Exception
     */
    public function notifyMockery($message)
    {
        return Mailer::sendStatic($this->email,$message);
    }

}