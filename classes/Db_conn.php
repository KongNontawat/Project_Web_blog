<?php
class Db_conn
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "project_web_blog";

    public function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,FALSE);
            return $conn;
        } catch (PDOException $e) {
            echo "<script>console.error({$e->getMessage()});</script>";
        }
    }
}