<?php
// Mode DEV pour Vercel
$_ENV['APP_ENV'] = 'dev';
$_ENV['APP_DEBUG'] = '1';
$_ENV['DATABASE_URL'] = 'sqlite:///' . dirname(__DIR__) . '/public/database.db';

require __DIR__ . '/../public/index.php';