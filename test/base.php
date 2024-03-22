<?php
//V.2 
// DAtaBase mysql

error_reporting(0);
include "telegram.php";

$api = new Telegram("6179391015:AAEEfndu7_wsl63AM-LG2Nb1YtVFbCN9EsU");
$sql = new Database('server101_ayhan', 'go[j45@6ou}-lud@1u5o{', 'server101_ayhan');

if (!is_file('URL.log')){ 
    $api->setHook('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    file_put_contents('URL.log',"OK"); 
}

$text = $api->Text();
$from_id = $api->message()['from']['id'];
$first_name = $api->message()['from']['first_name'];

if($text === "/start"){
       
        $USER = $sql->exe_query("SELECT * FROM user WHERE id = '{$from_id}'")->fetch_assoc(); 
        $from = $USER['from'];

    $api->sendMessage(array('chat_id' =>$from_id, 'text' =>"HI {$first_name [$from]} | @Ayhan_Dev"));

    //Query DataBase
}
