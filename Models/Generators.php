<?php
  class Generators {
   function __construct() {}

    function key() {
      $bytes = random_bytes(4);
      $key = bin2hex($bytes);
      return $key;
    }
  }
?>