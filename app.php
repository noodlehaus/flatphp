<?php declare(strict_types=1);

$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$path = strtr($path, '/', DIRECTORY_SEPARATOR);
$path = empty($path) ? 'index' : $path;

$root = __DIR__.'/pages';
$file = join(DIRECTORY_SEPARATOR, [$root, "{$path}.php"]);

if (!file_exists($file)) {
  http_response_code(404);
  return require "{$root}/404.php";
}

return require $file;
