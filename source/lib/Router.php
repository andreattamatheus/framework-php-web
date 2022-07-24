<?php

namespace Source\Lib;

class Router
{
  private array $handlers;
  public $routes = [];

  private const METHOD_GET = 'GET';
  private const METHOD_POST = 'POST';
  private const METHOD_PUT = 'PUT';
  private const METHOD_DELETE = 'DELETE';



  public function get($path, $handler)
  {
    return $this->addRoute($this->addHandler(self::METHOD_GET, $path, $handler));
  }

  public function post($path, $handler)
  {
    return $this->addRoute($this->addHandler(self::METHOD_POST, $path, $handler));
  }

  public function put($path, $handler)
  {
    return $this->addRoute($this->addHandler(self::METHOD_PUT, $path, $handler));
  }

  public function delete($path, $handler)
  {
    return $this->addRoute($this->addHandler(self::METHOD_DELETE, $path, $handler));
  }

  public function addHandler(string $method, string $path, $handler): array
  {
    return $this->handlers[$method . $path] = [
      'path' => $path,
      'method' => $method,
      'handler' => $handler,
    ];
  }

  public function addRoute(array $route)
  {
    return $this->routes[$route['method'] . '::' . $route['path']] = $route;
  }

  public function setControllerNamespace($namespace)
  {
    $this->namespace = $namespace;
  }

  public function getRouterPath($path)
  {
    $router = $this;
    require $path;
  }

  public function request($handler)
  {
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    if ($requestMethod !== $handler['method'])
      var_dump('Not Allowed');
    return [
      (
        new Request($_REQUEST)
      )
    ];
  }

  public function run()
  {
    $requestUri = parse_url($_SERVER['REQUEST_URI']);
    $requestPath = $requestUri['path'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $found = false;
    foreach ($this->handlers as $handler) {
      if ($requestPath === $handler['path'] && $requestMethod === $handler['method']) {
        $found = true;
        return $this->handleCallback($handler);
      }
    }
    if (!$found) {
      var_dump('Not found');
    }
  }

  public function handleCallback($handler)
  {
    $methodController = $this->convertCallbackFormat($handler['handler']);
    return call_user_func_array(
      [
        $methodController['Controller'],
        $methodController['Method']
      ],
      $this->request($handler)
    );
  }

  public function convertCallbackFormat($handler)
  {
    $call = explode('@', $handler);
    if (is_array($call) && count($call) === 2){
      return [
        'Controller' => $this->instanceController($call[0]),
        'Method'     => $call[1]
      ];
    }
    return $handler;
  }

  public function instanceController($className)
  {
    $instancedClass = $this->namespace.$className;
    return new $instancedClass;
  }
}
