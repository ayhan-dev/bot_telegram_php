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
  - If you need to deploy on a server outside of Iran:

```php
 $api->setWebhook('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
```

  - If you need to deploy on Iran server:

```php
$api->setHook('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
```



## LIst:
   ```php

    $list_method = [
        'getUpdates',
        'setWebhook',
        'deleteWebhook',
        'getWebhookInfo',
        'getMe',
        'logOut',
        'close',
        'sendMessage',
        'forwardMessage',
        'copyMessage',
        'sendPhoto',
        'sendAudio',
        'sendDocument',
        'sendSticker',
        'sendVideo',
        'sendAnimation',
        'sendVoice',
        'sendVideoNote',
        'sendMediaGroup',
        'sendLocation',
        'editMessageLiveLocation',
        'stopMessageLiveLocation',
        'sendVenue',
        'sendContact',
        'sendPoll',
        'sendDice',
        'sendChatAction',
        'getUserProfilePhotos',
        'getFile',
        'banChatMember',
        'unbanChatMember',
        'restrictChatMember',
        'promoteChatMember',
        'setChatAdministratorCustomTitle',
        'banChatSenderChat',
        'unbanChatSenderChat',
        'setChatPermissions',
        'exportChatInviteLink',
        'createChatInviteLink',
        'editChatInviteLink',
        'revokeChatInviteLink',
        'approveChatJoinRequest',
        'declineChatJoinRequest',
        'setChatPhoto',
        'deleteChatPhoto',
        'setChatTitle',
        'setChatDescription',
        'pinChatMessage',
        'unpinChatMessage',
        'unpinAllChatMessages',
        'leaveChat',
        'getChat',
        'getChatAdministrators',
        'getChatMemberCount',
        'getChatMember',
        'setChatStickerSet',
        'deleteChatStickerSet',
        'getForumTopicIconStickers',
        'createForumTopic',
        'editForumTopic',
        'closeForumTopic',
        'reopenForumTopic',
        'deleteForumTopic',
        'unpinAllForumTopicMessages',
        'editGeneralForumTopic',
        'closeGeneralForumTopic',
        'reopenGeneralForumTopic',
        'hideGeneralForumTopic',
        'unhideGeneralForumTopic',
        'unpinAllGeneralForumTopicMessages',
        'answerCallbackQuery',
        'answerInlineQuery',
        'setMyCommands',
        'deleteMyCommands',
        'getMyCommands',
        'setMyName',
        'getMyName',
        'setMyDescription',
        'getMyDescription',
        'setMyShortDescription',
        'getMyShortDescription',
        'setChatMenuButton',
        'getChatMenuButton',
        'setMyDefaultAdministratorRights',
        'getMyDefaultAdministratorRights',
        'editMessageText',
        'editMessageCaption',
        'editMessageMedia',
        'editMessageReplyMarkup',
        'stopPoll',
        'deleteMessage',
        'getStickerSet',
        'getCustomEmojiStickers',
        'uploadStickerFile',
        'createNewStickerSet',
        'addStickerToSet',
        'setStickerPositionInSet',
        'deleteStickerFromSet',
        'setStickerEmojiList',
        'setStickerKeywords',
        'setStickerMaskPosition',
        'setStickerSetTitle',
        'setStickerSetThumbnail',
        'setCustomEmojiStickerSetThumbnail',
        'deleteStickerSet',
        'answerWebAppQuery',
        'sendInvoice',
        'createInvoiceLink',
        'answerShippingQuery',
        'answerPreCheckoutQuery',
        'setPassportDataErrors',
        'sendGame',
        'setGameScore',
        'getGameHighScores',
        'deleteWebhook',
        'getWebhookInfo',
        'getMe',
        'logOut',
        'close',
        'deleteMyCommands',
        'getMyCommands',
        'setMyName',
        'getMyName',
        'setMyDescription',
        'getMyDescription',
        'setMyShortDescription',
        'getMyShortDescription',
        'setChatMenuButton',
        'getChatMenuButton',
        'setMyDefaultAdministratorRights',
        'getMyDefaultAdministratorRights',
    ];
```
