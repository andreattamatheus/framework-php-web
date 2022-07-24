<?php

namespace Source\App\Models;

use Source\App\Models\Model;

class Product extends Model
{
  /** @var string $entity database table */

  protected $table = 'products';

  /** @var array $safe no update or create */
  protected $field = array(
    'name',
    'sku',
    'category_id',
    'price',
    'quantity',
    'description',
    'image_path',
    'created_at'
  );


  public function __construct($data = null)
  {
    parent::__construct($data);
  }

}
