<?php
    if(!$data = $news->getNews()) {
        $errMsg = "<p> Произошла ошибка при выводе новостной ленты! <br>";
    }
    else {
        $string ="";
        foreach ($data as $item){
            $string .= sprintf(
                '<p> %s %s %s %s %s %s',
                $item['id'],
                $item['title'],
                $item['category'],
                $item['descrition'],
                $item['source'],
                $item['datetime']
            );
        }
        echo $string;
    }
?>