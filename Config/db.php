<?php
  class Database {
    private static $bdd = null;

    private function __construct() {}

    public static function getBdd() {
      if (is_null(self::$bdd)) {
        self::$bdd = new PDO("mysql:host=localhost;dbname=url_shortener", 'root', '');
      }
      return self::$bdd;
    }
  }
?>