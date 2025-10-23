<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "PHP Version: " . PHP_VERSION . "\n";
echo "Testing MadelineProto setup...\n\n";

if(!file_exists('madeline.php')){
    echo "Downloading MadelineProto...\n";
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}

echo "Including madeline.php...\n";
include 'madeline.php';

echo "Creating API instance...\n";
$settings = [];
$settings['app_info']['api_id'] = 6;
$settings['app_info']['api_hash'] = 'eb06d4abfb49dc3eeb1aeb98ae0f581e';
$settings['logger']['max_size'] = 5*1024*1024;

try {
    $MadelineProto = new \danog\MadelineProto\API('test_session.madeline', $settings);
    echo "API instance created successfully!\n";
    echo "Attempting to login with bot token...\n";
    $MadelineProto->botLogin('8290477948:AAEog2I1VOWq_M-FKoW7DiDoIXzvsFRX36s');
    echo "Bot logged in successfully!\n";
    echo "Bot is ready!\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
}
