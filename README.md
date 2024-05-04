# bot-telegram-php

  
 - [API](https://core.telegram.org/bots/api) - [Telegram](https://t.me/ayhan_dev)

  - The Telegram bot library for the development of the province has a beta version of the library in PHP language and is being tested


## install:
```bash
git clone https://github.com/ayhan-dev/bot_telegram_php.git && cd bot_telegram_php 
```


## To use:

  ```php
$api = new Telegram();
$api::bot('sendMessage',
              array('chat_id' => $chat_id,
                    'text' => 'h hi hi / @ayhan_dev'
        ));
```





-----------------------------------------------------------------------------------------
 ## RUN: 
  - If you need to deploy on a server outside of Iran:

```php
 $api::setWebhook('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
```

  - If you need to deploy on Iran server:

```php
$api::setHook('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
```
-----------------------------------------------------------------------------------------


## Download file from Telegram:

  - Download from external servers:
```php
$api::downloadFile($file_id,"data/")
```

  - Download from Iranian servers:
```php
$api::download_File($file_id, "data/");
```
