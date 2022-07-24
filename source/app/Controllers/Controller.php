<?php

namespace Source\App\Controllers;

use Source\Lib\Request;
use Source\Lib\ValidatesRequests;

class Controller
{
  use ValidatesRequests;

  private $error = false;

  public function view(string $name, $data = null)
  {
    require __DIR__ . '/../../views/' . $name . '.php';
    return $this;
  }

  public function redirect($route)
  {
    $url = $route;
    header("Location: {$url}");
  }


  public function error()
  {
    return $this->error;
  }

  public function validate(array $request, array $rules)
  {
    $this->error = false;
    foreach ($rules as $key => $req) {
      if (!$request[$key] && $rules[$key] == 'required') {
        $this->error = true;
      }
    }
    return $this;
  }
}
