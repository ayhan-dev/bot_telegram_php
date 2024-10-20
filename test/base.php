<?php


  #dev Demo and basic built with libry
  #dev github.com/ayhan-dev/bot_telegram_php
  #dev v2.2
  
  error_reporting(E_ALL);
  include "telegram.php";
 
   $api  = new Telegram("7242746850:AAEE1eZ8bv4SFsm7xoYh5ye4RiCokqXQf38");
  # @dev $deta = new Database("user","pass","user");
  # @dev $data->query("query"); 
 
 /** Internal set.webhook
  ** if(!is_file('URL.log')){ 
  ** $api->setHook('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  **      file_put_contents('URL.log', "Webhook set successfully");
  **  }
  **/
    

$message    = $api->message();
$doc  = $api->media(); 

$document   = $doc['document'];
$text       = $message['text'];
$from_id    = $message['from']['id'];
$first_name = $message['from']['first_name'];


if($text == "/start"){
    $api->send('sendMessage',[
        'chat_id' => $from_id,
        'text' => "Hi {$first_name} | @Ayhan_Dev"
         
        ]);
}
