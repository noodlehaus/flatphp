<?php declare(strict_types=1);

namespace flat;

/**
 * Serves the request URL against the files in the pages directory.
 * If the requested path maps directly to a file, no special steps are
 * done, and the matching file is required by the function.
 *
 * @param string $pages Root directory where pages are located.
 * @param string $uri URL for the request to be mapped against pages.
 * @return void
 */
function serve(string $pages, string $uri): void {

  $path = trim(parse_url($uri, PHP_URL_PATH), '/');
  $path = strtr($path, '/', DIRECTORY_SEPARATOR);
  $path = empty($path) ? 'index' : $path;
  $file = join(DIRECTORY_SEPARATOR, [$pages, "{$path}.php"]);

  if (!file_exists($file)) {
    http_response_code(404);
    require join(DIRECTORY_SEPARATOR, [$pages, "404.php"]);
  } else {
    require $file;
  }
}
