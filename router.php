<?php
  class Router {
    static public function parse($url, $request) {
      $url = trim($url);

      if ($url == "/URL_Shortener/") {
        $request->controller = "urlShortener";
        $request->action = "index";
        $request->params = [];
      }
      else {
        $explode_url = explode('/', $url);
        $explode_url = array_slice($explode_url, 1);
        $request->controller = "urlShortener";
        $request->action = $explode_url[1];
        $request->params = array_slice($explode_url, 2);
      }
    }
  }
?>