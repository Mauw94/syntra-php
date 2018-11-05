<?php

class SessionManager {

    public $session_access;
    public function __construct()
    {
        session_start();
        $this->session_access = $_SESSION['login'];
    }

    public function getAccessLevel() {
        return $this->session_access;
    }

    public function checkValidTime()
    {
        $time = date("h:i:sa");
        if ($time > '12:00:00pm') {
            return false;
        } else {
            return true;
        }
    }

}

?>