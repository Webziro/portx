<?php
if (!function_exists('asset_url')) {
    function asset_url($path = '')
    {
        $app_root_dir = str_replace('\\', '/', realpath(__DIR__ . '/..') ?: dirname(__DIR__));
        $script_dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_FILENAME'] ?? ''));

        if (!empty($app_root_dir) && !empty($script_dir) && strpos($script_dir, $app_root_dir) === 0) {
            $relative_path = trim(substr($script_dir, strlen($app_root_dir)), '/');
            $depth = empty($relative_path) ? 0 : count(explode('/', $relative_path));
        } else {
            $depth = 0;
        }

        return str_repeat('../', $depth) . ltrim($path, '/');
    }
}
?>