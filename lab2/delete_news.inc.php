<?php
if(isset($_POST['id'])) {
    #echo "Установлено: ".var_dump((int)$_POST['id']);
    $news->deleteNews((int)$_POST['id']);
}

?>