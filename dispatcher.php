<?php
  class Dispatcher {
    private $request;

    public function dispatch(){
      $this->request = new Request();
      Router::parse($this->request->url, $this->request);

      $controller = $this->loadController();

      if (method_exists($controller, $this->request->action) && is_callable(array($controller, $this->request->action))) {
        call_user_func_array([$controller, $this->request->action], $this->request->params);
      }
      else {
        call_user_func_array([$controller, 'key'], [$this->request->action]);
      }
    }

    public function loadController() {
      $name = $this->request->controller . "Controller";
      $file = ROOT . 'Controllers/' . $name . '.php';
      require($file);
      $controller = new $name();
      return $controller;
    }
  }
?>