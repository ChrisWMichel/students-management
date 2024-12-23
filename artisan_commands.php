<?php
// Ensure this script is not publicly accessible
if ($_SERVER['REMOTE_ADDR'] !== '172.58.167.238') {
    die('Access denied');
}

// Run Artisan commands
$output = shell_exec('php artisan config:cache');
$output .= shell_exec('php artisan route:cache');
$output .= shell_exec('php artisan view:cache');
$output .= shell_exec('php artisan cache:clear');

echo nl2br($output);


