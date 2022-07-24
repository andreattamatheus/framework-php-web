<?php

namespace Source\App\Controllers;

use Source\App\Models\Category;
use Source\App\Services\HelperService;
use Source\Lib\Request;

class CategoriesController extends Controller
{

  public function __construct()
  {
    session_start();
  }

  public function index()
  {
    $categories = (new Category())->all();
    return $this->view('categories/index', [
      'categories'  => $categories
    ]);
  }

  public function create()
  {
    return $this->view('categories/addCategory');
  }

  public function store(Request $request)
  {
    $validate = $this->validate($request->convertToArray(), [
      'name'        => 'required'
    ]);

    if ($validate->error()) {
      return $this->redirect('/categories/create');
    }
    try {
      $getRequest = $request->getRequest();
      $category = new Category();
      $category->create([
        'name'        => $getRequest->name
      ]);
      return $this->redirect('categories');
    } catch (\Exception $e) {
      return $this->redirect('/page-error');
    }
  }

  public function edit(Request $request)
  {
    $getRequest = $request->getRequest();
    $category = new Category();
    $getCategoryById = $category->findById($getRequest->id);
    if (!$getCategoryById) {
      return $this->view('categories/index');
    }
    return $this->view('categories/editCategory', [
      'category'     => $getCategoryById->get()
    ]);
  }

  public function update(Request $request)
  {
    $getRequest = $request->getRequest();
    $validate = $this->validate($request->convertToArray(), [
      'name'  => 'required'
    ]);

    if ($validate->error()) {
      return $this->redirect('/categories/edit?id=' . $getRequest->id);
    }

    try {
      $category = new Category();
      $getCategoryById = $category->findById($getRequest->id);
      $getCategoryById->update([
        'id'        => $getRequest->id,
        'name'        => $getRequest->name
      ]);
      return $this->redirect('/categories');
    } catch (\Exception $e) {
      return $this->redirect('/page-error');
    }
  }


  public function destroy(Request $request)
  {
    try {
      $getRequest = $request->getRequest();
      $category = new Category();
      $getCategoryById = $category->findById($getRequest->id);
      if (!$getCategoryById) {
        return $this->view('categories/index');
      }
      $getCategoryById->delete($getRequest->id);
      return $this->redirect('/categories');
    } catch (\Exception $e) {
      return $this->redirect('/page-error');
    }
  }
}
