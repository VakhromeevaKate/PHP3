<?php
class User extends AbstractUser {
    public      $name, 
                $login, 
                $password;
    public static $ucount = 0;                

    public function __construct($nm, $lgn, $pswd){
        $this->name=$nm;
        $this->login=$lgn;
        $this->password=$pswd;
        ++self::$ucount;
    }

    public function showInfo(){
        echo "<p> User name: ".$this->name;
        echo "<p> Login: ".$this->login;
        echo "<p> Password: ".$this->password;
    }

    public function __clone(){
        $this->name=null;
        $this->login=null;
        $this->password=null;
    }

    public function __destruct() {
        echo "<p> Пользователь ".$this->login." удален.";
    }

}