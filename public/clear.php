<?php
$routesCache = __DIR__.'/../bootstrap/cache/routes-v7.php';
if (file_exists($routesCache)) {
    unlink($routesCache);
    echo "Routes cache deleted. ";
} else {
    echo "Routes cache not found. ";
}
$viewsCacheDir = __DIR__.'/../storage/framework/views/';
$files = glob($viewsCacheDir . '*');
foreach($files as $file) {
  if(is_file($file) && !str_ends_with($file, '.gitignore')) {
    unlink($file);
  }
}
echo "Views cache deleted.";
