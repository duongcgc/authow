<?php

require_once __DIR__ . '/class-goso-library-source.php';
require_once __DIR__ . '/class-goso-library.php';

add_action('init', function () {
    if (defined('ELEMENTOR_VERSION')) {
        new Goso_Library;
    }
});
