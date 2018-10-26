<?php

class SessionManager {

    public $session_access;
    public function __construct()
    {
        session_start();
        $this->session_access = $_SESSION['login'];
    }

    function getAccessLevel() {
        return $this->session_access;
    }
}

?>