<?php

$setup = require __DIR__.'/../bootstrap/setup.php';

$setup->loadEnvironmentVariables();

$setup->instaceRouter();

$setup->setRouterAndControllerLocation(
  'Source\App\Controllers\\',
  __DIR__.'/../routes/web.php'
)->run();

require_once __DIR__.'/../routes/web.php';

