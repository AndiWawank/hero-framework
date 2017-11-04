<?php

  class Route{

    protected $controller = 'HomeController';
    protected $method     = 'index';
    protected $param      = [];

    public function __construct(){

      if( isset($_GET['url']) ){
        $url = explode('/', filter_var(trim($_GET['url']), FILTER_SANITIZE_URL )); //Ngefilter url jika ada karakter aneh
        $urlUp  = ucfirst($url[0]);
        $url[0] = $urlUp .'Controller';
      }else{
        return require_once '../app/views/index.php';
      }

        //Mengecek File Controller
        if( file_exists('../app/controllers/'. $url[0] .'.php') ){ //url masih lowercase!
          $this->controller = $url[0];
        }else{
          return require_once '../app/views/error/404.php';
        }

        require_once '../app/controllers/'. $this->controller .'.php';
        $this->controller = new $this->controller;

      //Mengecek Metode Controller
      if( isset($url[1]) ){
        if(method_exists($this->controller, $url[1])){
          $this->method = $url[1];
        }
      }
      unset($url[0]); //Menghapus array url
      unset($url[1]);
      $this->param = $url;
      call_user_func_array([$this->controller, $this->method], $this->param);

    }

  }
