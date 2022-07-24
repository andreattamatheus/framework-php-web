<?php

namespace Source\Lib;

class Request
{
  public $request;

  public function __construct($request)
  {
    $this->request = (object) $request;
  }

  public function getRequest()
  {
    $request = $this->request;
    return $request;
  }

  public function convertToArray() : array
  {
    return (array) $this->request;
  }
}
