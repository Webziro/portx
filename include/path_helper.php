<?php
function asset_url($path) {
    // Use PHP_SELF to determine depth from web root
    $self = $_SERVER['PHP_SELF'];
    $depth = substr_count(trim(dirname($self), '/'), '/');
    if ($depth === 0) {
        return $path;
    }
    return str_repeat('../', $depth) . $path;
}
