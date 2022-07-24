<?php

namespace Source\Lib;

use Source\Lib\Request;

trait ValidatesRequests
{

  public function validate(
    Request $request,
    array $rules
  ) {

    $this->has_error = false;
    foreach($params as $key => $res){
      if( $params[$key] === 'required' && !$request[$key] ){
          $this->has_error = true;
          $capitalize = ucfirst($key);
          array_push($this->errorsMessage,[
            'message' => "<strong>{$capitalize}</strong> is required",
            'name' => $key
          ]);
      }
    }

    return $this;
  }
}
