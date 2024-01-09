<?php
// config.php

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'wiki_ko');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// Autoload classes
spl_autoload_register(function ($class) {
    require_once 'config/' . $class . '.php';
});

// Initialize the database connection
$db = Database::connect();
