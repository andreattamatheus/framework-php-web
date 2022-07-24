<?php

namespace Source\App\Models;

class Category extends Model
{
    protected $table = 'categories';

    protected $field = array('name');

    public function __construct($data = null)
    {
      parent::__construct($data);
    }



}
