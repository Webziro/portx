<?php
function asset_url($path) {
    // Use filesystem paths to figure out how deep the current script is relative to the app root
    $script_dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_FILENAME']));
    $app_root_dir = str_replace('\\', '/', realpath(__DIR__ . '/..'));
    
    $relative_path = str_replace($app_root_dir, '', $script_dir);
    $relative_path = trim($relative_path, '/');
    
    if (empty($relative_path)) {
        $depth = 0;
    } else {
        $depth = substr_count($relative_path, '/') + 1;
    }
    
    return str_repeat('../', $depth) . ltrim($path, '/');
}
