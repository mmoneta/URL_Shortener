<?php
  class Generators {
    function key() {
      $bytes = random_bytes(4);
      $key = bin2hex($bytes);
      return $key;
    }
  }
?>
