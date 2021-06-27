<?php
class DB
{
    private static $instance = NULl;
    public static function getInstance() {
      if (!isset(self::$instance)) {
        try {
          self::$instance = new PDO('mysql:host=127.0.0.1;dbname=newspage', 'root', 'password');
          self::$instance->exec("SET NAMES 'utf8'");
        } catch (PDOException $ex) {
          die($ex->getMessage());
        }
      }
      return self::$instance;
    }

    public function connect()
    {
      try {
        $conn = new PDO('mysql:host=localhost;dbname=newspage', 'root', 'password');
        $conn->exec("SET NAMES 'utf8'");
      } catch (PDOException $ex) {
        die($ex->getMessage());
      }

      return $conn;
    }
}
