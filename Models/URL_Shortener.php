<?php
  class URL_Shortener extends Model {
    public function select_link_by_key($key) {
      $sql = "SELECT `link` FROM `urls` WHERE `key`=?";
      $req = Database::getBdd()->prepare($sql);
      $req-> execute([$key]);
      $count = $req->rowCount();
      if ($count > 0) {
        $link = $req-> fetchObject();
        return $link-> link;
      }
      return false;
    }

    public function insert($data) {
      $sql = 'INSERT INTO `urls`(`key`, `link`) VALUES (:key,:link)';
      $req = Database::getBdd()->prepare($sql);
      $req-> execute($data);
    }
  }
?>
