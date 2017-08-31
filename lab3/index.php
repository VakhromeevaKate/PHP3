<?php
require_once "NewsDB.php";
try {
    $news = new NewsDB();
    if (!$news) throw new Exception("База не создалась! ");
}
catch (Exception $e){
    echo $e->getMessage();
}

?>