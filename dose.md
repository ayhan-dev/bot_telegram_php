 # Library document


   - The library and training document should be used and listed to come to the [Telegram group](https://t.me/chat_deve) for suggestion.

--------------------------------------------------------------------------------------------

 ## Database LIb:


  - Mysql:
  ```php
<?php
$sql = new Database('user', 'pass', 'user');
$USER = $spl->query("Query SQl")->fetch_assoc(); // exe query
$from = $USER['from'];
```


 - SQlite:
 ```php
<?php
$db = new SQLiteDB('data/database.db');
$db->query($query);
```



-------------------------------------------------------------------------------------------------
## CronJob file: 
 - Internal CronJob for direct use
```php
$cronJob = new CronJob('php /path/to/your/script.php','* * * * *','/tmp/output.txt');
$cronJob->create();
```











-------------------------------------------------------------------------------------------------
 
## LIst AII methods:
   ```php
<?php

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
