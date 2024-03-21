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
$api->sendMessage(array('chat_id' => $chat_id, 'text' => 'h hi hi / @ayhan_dev'));
```


 ## RUN: 
  - If you need to settle in Sur outside of Iran:

```php
 $api->setWebhook('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
```
