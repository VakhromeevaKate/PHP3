<?php
class SuperUser extends User implements ISuperUser {
    public $role;
    public static $ucount = 0;

    public function __construct($nm, $lgn, $pswd, $role) {
        parent:: __construct($nm, $lgn, $pswd);
        $this->role=$role;
        ++self::$ucount;
    }

    public function showInfo() {
        parent::showInfo();
        echo "<p> Роль: ".$this->role;
    }

    public function getInfo() {
        return (array)$this;
    }

    public function __destruct() {
        echo "<p> Суперпользователь с логином ".$this->login." удален.";
    }
}