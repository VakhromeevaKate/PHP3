<?php
class NewsDB /*implements INewsDB*/ {
    const DB_NAME = 'news.db';
    const RSS_NAME = 'rss.xml';
    private $_db;

    public function __construct(){
        echo "<br> constructor <br>";
        if (!is_file(self::DB_NAME)){
            $this->_db = new SQLite3(self::DB_NAME);
            $this->prepareDB();
        }
        else {
            $this->_db = new SQLite3(self::DB_NAME);
        }
    }

    function saveNews($title, $category, $description, $source){
        $dt = time();
        $sql = "INSERT INTO msgs (title, category, description, source, datetime) VALUES ('$title', '$category', '$description', '$source', Date() )";
        $stmt= $this->_db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':source', $source);
        $stmt->bindParam(':dt', $dt);
        $result=$stmt->execute();
        $stmt->close();
        return $result;
    }

    function getNews(){
        $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime FROM msgs, category WHERE category.id = msgs.category ORDER BY  msgs.id DESC ";
        $result = $this->_db->query($sql);
        $array=[];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)){
            $array[]=$row;
        }
        return $array;
    }

    function deleteNews($id){
        $sql = "DELETE FROM msgs WHERE id = '$id'";
        $stmt = $this->_db->prepare($sql);
        $result=$stmt->execute();
        return $result;
    }
    public function prepareDB(){
        $category = "CREATE TABLE category (id INTEGER , name TEXT)";
        $this->_db->exec($category);

        $msgs = "CREATE TABLE msgs (id INTEGER PRIMARY KEY AUTOINCREMENT, title TEXT, category INTEGER, description TEXT, source TEXT, datetime INTEGER)";
        $this->_db->exec($msgs);

        $seed = "INSERT INTO category (id, name)
                  SELECT 1 as id, 'Политика' as name 
                  UNION 
                  SELECT 2 as id, 'Культура' as name
                  UNION
                  SELECT 3 as id, 'Спорт' as name ";
        $this->_db->exec($seed);
    }

    public function filter($var){
        //$var = htmlspecialchars(trim($var));
        return $this->_db->escapeString($var);
    }

    public function countNews(){
        $sql = "SELECT COUNT(*) FROM msgs";
        $result = $this->_db->querySingle($sql);
        return $result;
    }

    public function __destruct(){
        echo "<br> destructor <br>";
        unset($this->_db);
    }

}
