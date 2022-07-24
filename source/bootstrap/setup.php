<?php

namespace Source\Lib;

use Dotenv\Dotenv;
use Source\Lib\Router;

class Setup {

  private $url = null;
  private $dotenv;

  public $router;

  public function __construct()
  {
    require_once __DIR__."/../vendor/autoload.php";
  }

  public function loadEnvironmentVariables()
  {
    $this->dotenv = Dotenv::createImmutable(__DIR__.'../../');
    $this->dotenv->load();
  }

  public function instaceRouter()
  {
      $this->router = new Router($this);
  }

  public function setRouterAndControllerLocation($namespace, $routerPath)
  {
     $this->router->setControllerNamespace($namespace);
     $this->router->getRouterPath($routerPath);
     return $this->router;
  }

}

return new Setup();
