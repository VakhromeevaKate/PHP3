<?php
    require_once '/var/www/html/php3/lab2/NewsDB.php';

    $news = new NewsDB();
    $errMsg = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once '/var/www/html/php3/lab2/save_news.inc.php';
        require_once '/var/www/html/php3/lab2/delete_news.inc.php';
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Новостная лента</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<h1>Последние новости</h1>
<?php
    if ($errMsg != "") echo $errMsg." <p> Не удалось. Удалось не пришел. <br>";
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Заголовок новости:<br />
<input type="text" name="title" /><br />
Выберите категорию:<br />
<select name="category">
<option value="1">Политика</option>
<option value="2">Культура</option>
<option value="3">Спорт</option>
</select>
<br />
Текст новости:<br />
<textarea name="description" cols="50" rows="5"></textarea><br />
Источник:<br />
<input type="text" name="source" /><br />
<br />
<input type="submit" value="Добавить!" />

</form>
<?php
    if ($errMsg != "") echo $errMsg." <p> Не удалось удалить. <br>";
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<hr>
    <p>Удалить новость с id:<br />
    <input type="text" name="id" /><br />
    <br />
    <input type="submit" value="Удалить!" />
<hr>
</form>

<?php
    require_once '/var/www/html/php3/lab2/get_news.inc.php';

?>

</body>
</html>