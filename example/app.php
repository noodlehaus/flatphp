<?php declare(strict_types=1);

require __DIR__.'/../flat.php';

use function flat\serve;

serve(__DIR__.'/pages', $_SERVER['REQUEST_URI']);
