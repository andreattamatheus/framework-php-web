<?php

namespace Source\App\Controllers;

use Source\App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
      $products = (new Product())->all();
      return $this->view('dashboard/index',[
        'products'  => $products
      ]);
    }

    public function error()
    {
      return $this->view('page-error');
    }

}


