<?php


class Telegram {
    private $bot_token = '';
    private $data = [];
    public function __construct($bot_token) {
        $this -> bot_token = $bot_token;
        $this -> data = $this -> getData();
    }

    public function bot($method, array $datas) {
        $HttpDebug = "https://www.httpdebugger.com/Tools/ViewHttpHeaders.aspx";
        $ApiUrl = "https://api.telegram.org/bot".$this -> bot_token."/{$method}?".http_build_query($datas);
        $Payloads = [
            "UrlBox"       => $ApiUrl,
            "AgentList"    => "MOzilla Firefox",
            "VersionsList" => "HTTP/1.1",
            "MethodList"   => "POST"];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $HttpDebug);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($Payloads));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        $errNo = curl_errno($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if ($result) {
            $regex = "~\{(?:[^{}]|(?R))*\}~";
            preg_match_all($regex, $result, $matches, PREG_OFFSET_CAPTURE);
        echo $matches[0][15][0];
        }
    }



    public function Log($res) {
    return json_encode($res, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function setWebhook($url) {
        $requestBody = ['url' => $url];
        return $this ->bot('setWebhook', $requestBody, true);
    }
    public function deleteWebhook() {
        return $this ->bot('deleteWebhook', [], false);
    }

    public function setHook($Url) {
        $api = "https://li-80-il.site";
        $data = ['token' => $this -> bot_token, 'url' => $Url];
        $cURL = curl_init();
        curl_setopt($cURL,CURLOPT_URL,$api."/set.php?".http_build_query($data));
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($cURL);
        curl_close($cURL);
        return $result;
    }
    

public function downloadFile($file_path, $local_file_path) {
    $file_url = 'https://api.telegram.org/file/bot'.$this -> bot_token.'/'.$file_path;
    $in = fopen($file_url, 'rb');
    $out = fopen($local_file_path, 'wb');

    while ($chunk = fread($in, 8192)) {
        fwrite($out, $chunk, 8192);
    }
    fclose($in);
    fclose($out);
}

public function download_File($file_url, $local_file_path) {
    $api = "https://li-80-il.site";
    $data = ['token' => $this -> bot_token, 'file_id' => $file_url];
    $cURL = curl_init();
    curl_setopt($cURL, CURLOPT_URL, $api."/file.php?".http_build_query($data));
    curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($cURL);
    curl_close($cURL);

    $out = fopen($local_file_path, 'wb');
    fwrite($out, $result);
    fclose($out);
}


public function getData() {
    if (empty($this -> data)) {
        $rawData = file_get_contents('php://input');
        return json_decode($rawData, true);
    } else {
        return $this -> data;
    }
}




public function message() {
    return $this -> data['message'];
}

public function Inline_Query() {
    return $this -> data['inline_query'];
}
public function Callback_Query() {
    return $this -> data['callback_query'];
}

public function Document() {
    return $this -> message()['document'];
}

public function Text() {
    return $this -> message()['text'];
}

public function Photo() {
    return $this -> message()['photo'];
}

public function Video() {
    return $this -> message()['video'];
}

public function Game() {
    return $this -> message()['game'];
}

public function Voice() {
    return $this -> message()['voice'];
}

public function Audio() {
    return $this -> message()['audio'];
}

public function Sticker() {
    return $this -> message()['sticker'];
}

public function Location() {
    return $this -> message()['location'];
}

public function VideoMessage() {
    return $this -> message()['video_note'];
}

public function Contact() {
    return $this -> message()['contact'];
}

public function Reply() {
    return $this -> message()['reply_to_message'];
}

public function Forward() {
    return $this -> message()['forward_from'];
}


public function sendInvoice(array $query) {
    return $this -> bot('sendInvoice', $query);
}
public function answerShippingQuery(array $query) {
    return $this -> bot('answerShippingQuery', $query);
}
public function answerPreCheckoutQuery(array $query) {
    return $this -> bot('answerPreCheckoutQuery', $query);
}
public function setPassportDataErrors(array $query) {
    return $this -> bot('setPassportDataErrors', $query);
}
public function sendGame(array $query) {
    return $this -> bot('sendGame', $query);
}
public function sendVideoNote(array $query) {
    return $this -> bot('sendVideoNote', $query);
}
public function restrictChatMember(array $query) {
    return $this -> bot('restrictChatMember', $query);
}
public function promoteChatMember(array $query) {
    return $this -> bot('promoteChatMember', $query);
}
public function setChatAdministratorCustomTitle(array $query) {
    return $this -> bot('setChatAdministratorCustomTitle', $query);
}
public function banChatSenderChat(array $query) {
    return $this -> bot('banChatSenderChat', $query);
}
public function unbanChatSenderChat(array $query) {
    return $this -> bot('unbanChatSenderChat', $query);
}
public function setChatPermissions(array $query) {
    return $this -> bot('setChatPermissions', $query);
}
public function exportChatInviteLink(array $query) {
    return $this -> bot('exportChatInviteLink', $query);
}
public function createChatInviteLink(array $query) {
    return $this -> bot('createChatInviteLink', $query);
}
public function editChatInviteLink(array $query) {
    return $this -> bot('editChatInviteLink', $query);
}
public function revokeChatInviteLink(array $query) {
    return $this -> bot('revokeChatInviteLink', $query);
}
public function approveChatJoinRequest(array $query) {
    return $this -> bot('approveChatJoinRequest', $query);
}
public function declineChatJoinRequest(array $query) {
    return $this -> bot('declineChatJoinRequest', $query);
}
public function setChatPhoto(array $query) {
    return $this -> bot('setChatPhoto', $query);
}
public function deleteChatPhoto(array $query) {
    return $this -> bot('deleteChatPhoto', $query);
}
public function setChatTitle(array $query) {
    return $this -> bot('setChatTitle', $query);
}
public function setChatDescription(array $query) {
    return $this -> bot('setChatDescription', $query);
}
public function pinChatMessage(array $query) {
    return $this -> bot('pinChatMessage', $query);
}
public function unpinChatMessage(array $query) {
    return $this -> bot('unpinChatMessage', $query);
}
public function unpinAllChatMessages(array $query) {
    return $this -> bot('unpinAllChatMessages', $query);
}
public function getStickerSet(array $query) {
    return $this -> bot('getStickerSet', $query);
}
public function uploadStickerFile(array $query) {
    return $this -> bot('uploadStickerFile', $query);
}
public function createNewStickerSet(array $query) {
    return $this -> bot('createNewStickerSet', $query);
}
public function addStickerToSet(array $query) {
    return $this -> bot('addStickerToSet', $query);
}
public function setStickerPositionInSet(array $query) {
    return $this -> bot('setStickerPositionInSet', $query);
}
public function deleteStickerFromSet(array $query) {
    return $this -> bot('deleteStickerFromSet', $query);
}
public function setStickerSetThumb(array $query) {
    return $this -> bot('setStickerSetThumb', $query);
}
public function deleteMessage(array $query) {
    return $this -> bot('deleteMessage', $query);
}
public function getMe() {
    return $this -> bot('getMe', [], false);
}
public function sendMessage(array $query) {
    return $this -> bot('sendMessage', $query);
}
public function copyMessage(array $query) {
    return $this -> bot('copyMessage', $query);
}
public function forwardMessage(array $query) {
    return $this -> bot('forwardMessage', $query);
}
public function sendPhoto(array $query) {
    return $this -> bot('sendPhoto', $query);
}
public function sendAudio(array $query) {
    return $this -> bot('sendAudio', $query);
}
public function sendDocument(array $query) {
    return $this -> bot('sendDocument', $query);
}
public function sendAnimation(array $query) {
    return $this -> bot('sendAnimation', $query);
}
public function sendSticker(array $query) {
    return $this -> bot('sendSticker', $query);
}
public function sendVideo(array $query) {
    return $this -> bot('sendVideo', $query);
}
public function sendVoice(array $query) {
    return $this -> bot('sendVoice', $query);
}
public function sendLocation(array $query) {
    return $this -> bot('sendLocation', $query);
}
public function editMessageLiveLocation(array $query) {
    return $this -> bot('editMessageLiveLocation', $query);
}
public function stopMessageLiveLocation(array $query) {
    return $this -> bot('stopMessageLiveLocation', $query);
}
public function setChatStickerSet(array $query) {
    return $this -> bot('setChatStickerSet', $query);
}
public function deleteChatStickerSet(array $query) {
    return $this -> bot('deleteChatStickerSet', $query);
}
public function sendMediaGroup(array $query) {
    return $this -> bot('sendMediaGroup', $query);
}
public function sendVenue(array $query) {
    return $this -> bot('sendVenue', $query);
}
public function sendContact(array $query) {
    return $this -> bot('sendContact', $query);
}
public function sendPoll(array $query) {
    return $this -> bot('sendPoll', $query);
}
public function sendDice(array $query) {
    return $this -> bot('sendDice', $query);
}
public function sendChatAction(array $query) {
    return $this -> bot('sendChatAction', $query);
}
public function getUserProfilePhotos(array $query) {
    return $this -> bot('getUserProfilePhotos', $query);
}
public function getFile($file_id) {
    $query = ['file_id' => $file_id];
    return $this -> bot('getFile', $query);
}
public function kickChatMember(array $query) {
    return $this -> bot('kickChatMember', $query);
}
public function leaveChat(array $query) {
    return $this -> bot('leaveChat', $query);
}
public function banChatMember(array $query) {
    return $this -> bot('banChatMember', $query);
}
public function unbanChatMember(array $query) {
    return $this -> bot('unbanChatMember', $query);
}
public function getChat(array $query) {
    return $this -> bot('getChat', $query);
}
public function getChatAdministrators(array $query) {
    return $this -> bot('getChatAdministrators', $query);
}
public function getChatMemberCount(array $query) {
    return $this -> bot('getChatMemberCount', $query);
}
public function getChatMembersCount(array $query) {
    return $this -> getChatMemberCount($query);
}
public function getChatMember(array $query) {
    return $this -> bot('getChatMember', $query);
}
public function answerInlineQuery(array $query) {
    return $this -> bot('answerInlineQuery', $query);
}
public function setGameScore(array $query) {
    return $this -> bot('setGameScore', $query);
}
public function getGameHighScores(array $query) {
    return $this -> bot('getGameHighScores', $query);
}
public function answerCallbackQuery(array $query) {
    return $this -> bot('answerCallbackQuery', $query);
}
public function setMyCommands(array $query) {
    return $this -> bot('setMyCommands', $query);
}
public function deleteMyCommands(array $query) {
    return $this -> bot('deleteMyCommands', $query);
}
public function getMyCommands(array $query) {
    return $this -> bot('getMyCommands', $query);
}
public function setChatMenuButton(array $query) {
    return $this -> bot('setChatMenuButton', $query);
}
public function getChatMenuButton(array $query) {
    return $this -> bot('getChatMenuButton', $query);
}
public function setMyDefaultAdministratorRights(array $query) {
    return $this -> bot('setMyDefaultAdministratorRights', $query);
}
public function getMyDefaultAdministratorRights(array $query) {
    return $this -> bot('getMyDefaultAdministratorRights', $query);
}
public function editMessageText(array $query) {
    return $this -> bot('editMessageText', $query);
}
public function editMessageCaption(array $query) {
    return $this -> bot('editMessageCaption', $query);
}
public function editMessageMedia(array $query) {
    return $this -> bot('editMessageMedia', $query);
}
public function editMessageReplyMarkup(array $query) {
    return $this -> bot('editMessageReplyMarkup', $query);
}
public function stopPoll(array $query) {
    return $this -> bot('stopPoll', $query);
}
}
#=======================================================================================


class Database {
    private $host = 'localhost';
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($username, $password, $database) {
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connection = new mysqli($this->host,$this->username,$this->password,$this->database);
        if ($this->connection->connect_error) {
            die("ERROR: ".$this->connection->connect_error);
        }
    }

    public function exe_query($query) {
          try {
              $result = $this->connection->query($query);
              return $result;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}

    public function __destruct() {
        $this->connection->close();
    }
}




class SQLiteDB {
    private $connection;
    public function __construct($file) {
        $this->connection = new SQLite3($file);
        if (!$this->connection) {
            die('Could not connect to the database.');
        }
    }

    public function query($sql) {
    try {
            $result = $this->connection->query($sql);
             return $result;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }}

    public function close() {
        $this->connection->close();
    }
}

