<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Starting bot test...\n";

if(!file_exists('madeline.php')){
    echo "Downloading MadelineProto...\n";
    copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}

include 'madeline.php';

use danog\MadelineProto\Settings;
use danog\MadelineProto\Settings\AppInfo;
use danog\MadelineProto\Settings\Logger;

$settings = new Settings;
$settings->getAppInfo()
    ->setApiId(6)
    ->setApiHash('eb06d4abfb49dc3eeb1aeb98ae0f581e');
$settings->getLogger()->setLevel(\danog\MadelineProto\Logger::WARNING);

echo "Creating MadelineProto instance...\n";
$MadelineProto = new \danog\MadelineProto\API('BotSorce.madeline', $settings);

echo "Logging in with bot token...\n";
$MadelineProto->botLogin('8290477948:AAEog2I1VOWq_M-FKoW7DiDoIXzvsFRX36s');

echo "Bot logged in successfully!\n";
echo "Bot is ready to receive messages.\n";

$MadelineProto->loop();
