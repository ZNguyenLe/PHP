<?php
/**
* Database Class
**/
class Session {
    private $user;

    public function __construct() {
        session_start();
            if(isset($_SESSION['user'])) {
                $this->user = $_SESSION['user'];
            }
    }
    public function isLoggedIn() {
        if($this->user) {
            return $this->user;
        } else {
            return false;
        }
    }
    public function getUser() {
        if($this->user) {
            return $this->user;
        } else {
            return false;
        }
    }
    public function login($userObj) {
        $this->user = $userObj;
        $_SESSION['user'] = $userObj;
    }
    public function logout() {
        $this->user = false;
        unset($_SESSION['user']); 
        session_destroy(); 
    }
}

?>