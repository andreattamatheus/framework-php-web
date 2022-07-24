<?php

namespace Source\App\Controllers;

use Source\App\Models\Category;
use Source\App\Models\Product;
use Source\Lib\Request;

class ProductsController extends Controller
{
  public function __construct()
  {
    session_start();
  }

  public function index()
  {
    $product = new Product();
    $getAllProducts = $product->all();
    return $this->view('products/index', [
      'products'  => $getAllProducts
    ]);
  }

  public function create()
  {
    $categories = (new Category())->all();
    return $this->view('products/addProduct', [
      'categories'     => $categories
    ]);
  }

  public function store(Request $request)
  {
    $validate = $this->validate($request->convertToArray(), [
      'name'          => 'required',
      'sku'           => 'required',
      'category_id'   => 'required',
      'price'         => 'required',
      'quantity'      => 'required',
      'description'   => 'required'
    ]);

    if ($validate->error()) {
      return $this->redirect('/products/create');
    }

    try {
      $getRequest = $request->getRequest();
      $product = new Product();
      $category = (new Category())->findById($getRequest->category_id)->get();
      $product->create([
        'name'        => $getRequest->name,
        'sku'         => $getRequest->sku,
        'category_id' => $category['id'],
        'price'       => (int) str_replace([',', '.'], '', $getRequest->price),
        'quantity'    => $getRequest->quantity,
        'description' => $getRequest->description,
        'image_path' => "https://picsum.photos/200/300",
      ]);
      return $this->redirect('/products');
    } catch (\Exception $e) {
      return $this->redirect('/page-error');
    }
  }

  public function edit(Request $request)
  {
    try {
      $getRequest = $request->getRequest();
      $product = new Product();
      $getProductById = $product->findById($getRequest->id);
      $categories = (new Category())->all();
      if (!$getProductById) {
        return $this->view('products/index');
      }
      return $this->view('products/editProduct', [
        'product'     => $getProductById->get(),
        'categories'  => $categories
      ]);
    } catch (\Exception $e) {
      return $this->redirect('/page-error');
    }
  }

  public function update(Request $request)
  {
    $getRequest = $request->getRequest();
    $validate = $this->validate($request->convertToArray(), [
      'name'          => 'required',
      'sku'           => 'required',
      'category_id'   => 'required',
      'price'         => 'required',
      'quantity'      => 'required',
      'description'   => 'required'
    ]);
    if ($validate->error()) {
      return $this->redirect('/products/edit?id=' . $getRequest->id);
    }

    try {
      $product = new Product();
      $getProductById = $product->findById($getRequest->id);
      $category = (new Category())->findById($getRequest->category_id)->get();
      $getProductById->update([
        'name'        => $getRequest->name,
        'sku'         => $getRequest->sku,
        'category_id' => $category['id'],
        'price'       => (int) str_replace([',', '.'], '', $getRequest->price),
        'quantity'    => $getRequest->quantity,
        'description' => $getRequest->description,
        'image_path' => "https://picsum.photos/200/300",
      ]);
      return $this->redirect('/products');
    } catch (\Exception $e) {
      var_dump($e->getMessage());
      return $this->redirect('/page-error');
    }
  }


  public function destroy(Request $request)
  {
    try {
      $getRequest = $request->getRequest();
      $product = new Product();
      $getProductById = $product->findById($getRequest->id);
      if (!$getProductById) {
        return $this->view('products/index');
      }
      $getProductById->delete($getRequest->id);
      return $this->redirect('/products');
    } catch (\Exception $e) {
      return $this->redirect('/page-error');
    }
  }
}
