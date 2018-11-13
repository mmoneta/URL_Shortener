<?php
  class urlShortenerController extends Controller {
    function index() {
      if (isset($_COOKIE['keys'])) {
        $result = [];
        $keys = json_decode($_COOKIE['keys'], true);
        foreach ($keys as $key) {
          $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]$key";
          $result[] = ['key' => $key, 'link' => $link];
        }
        $d['collection'] = $result;
        $this->set($d);
      }
      $this->render("index");
    }

    function key($key) {
      require(ROOT . 'Models/URL_Shortener.php');
      $urlShortener = new URL_Shortener();
      $link = $urlShortener->select_link_by_key($key);
      if ($link)
        header("location: ".$link);
      else
        header("location: ".Config::getFullHost());
    }

    function creator() {
      $this->render("creator");	
    }

    function API($action) {	
      require(ROOT . 'Models/URL_Shortener.php');
      require(ROOT . 'Models/Generators.php');
      $urlShortener = new URL_Shortener();
      $generators = new Generators();

      switch ($action) {
        case 'add':
          $key = $generators->key();
          $data = [
            'key' => $key,
            'link' => $_POST['link']
          ];
          $urlShortener->insert($data);
          if (isset($_COOKIE['keys'])) {
            $keys = json_decode($_COOKIE['keys'], true);
          }
          else {
            $keys = [];
          }
          array_push($keys, $key);
          setcookie('keys', json_encode($keys), time() + (10 * 365 * 24 * 60 * 60), "/", false);
          break;
      }
    }
  }
?>
