<?php

    if (!isset($_POST['title'], $_POST['category'],$_POST['description'], $_POST['source'])){
        $errMsg = "Заполните все поля!";
    }

    $title = $news->filter($_POST['title']);
    $category = (int)$news->filter($_POST['category']);
    $description = $news->filter($_POST['description']);
    $source = $news->filter($_POST['source']);

    if (!$news->saveNews($title, $category, $description, $source)){
        $errMsg = "Произоша ошибка выполнения записи.";
    }
    else {
        //Todo: header('Location'); #редирект на ту же стр для прома - для тестирования не нужно
    }
?>