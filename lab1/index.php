<?php
function __autoload($class_name) {
    require $class_name.".php";
}


$user1=new User("Kate Vakromeeva","Kate","MyPass1");
$user2=new User("Vasily Pupkin","Vasya","MyPass10");
$user3=new User("Piotr Ivanov","Petya","MyPass101");
$user4=clone $user1;
$user5=new SuperUser("Kate Vakromeeva","SA","MyPass123","admin");

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();
$user4->showInfo();
$user5->showInfo();

echo "<br>"."<hr>";

var_dump($user5->getInfo());

echo "<br>"."<hr>";

echo "<p> Всего обычных пользователей: ".User::$ucount;
echo "<p> Всего суперпользователей: ".SuperUser::$ucount;

echo "<br>"."<hr>";
