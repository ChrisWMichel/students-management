<?php
// Change to the directory of your Laravel application
chdir(__DIR__);
// Include the Composer autoload file
require 'vendor/autoload.php';
// Include the Laravel application
$app = require_once 'bootstrap/app.php';
// Create an instance of the Artisan console
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
// Run the Artisan commands
$kernel->call('cache:clear');
$kernel->call('config:cache');
$kernel->call('route:cache');
$kernel->call('view:cache');
// Output the results
echo "Caches cleared successfully.";
