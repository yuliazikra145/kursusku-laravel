<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$routes = Illuminate\Support\Facades\Route::getRoutes();
echo "<h3>Daftar Route Courses</h3><ul>";
foreach ($routes as $route) {
    if (str_contains($route->getName(), 'courses.')) {
        echo "<li><b>" . $route->getName() . "</b> | " . $route->uri() . " | " . implode(',', $route->methods()) . "</li>";
    }
}
echo "</ul>";