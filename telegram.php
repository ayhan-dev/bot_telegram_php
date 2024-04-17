<?php


class Telegram {
    private $bot_token = '';
    private $data = [];
    public function __construct($bot_token) {
        $this -> bot_token = $bot_token;
        $this -> data = $this -> getData();
    }

    static function bot($method, array $datas) {
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

    static function setWebhook($url) {
        $requestBody = ['url' => $url];
        return $this ->bot('setWebhook', $requestBody, true);
    }
     static function deleteWebhook() {
        return $this ->bot('deleteWebhook', [], false);
    }
    static function setHook($Url) {
        $api = "https://li-80-il.site";
        $data = ['token' => $this -> bot_token, 'url' => $Url];
        $cURL = curl_init();
        curl_setopt($cURL,CURLOPT_URL,$api."/set.php?".http_build_query($data));
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($cURL);
        curl_close($cURL);
        return $result;
    }
    
    static function downloadFile($file_path, $local_file_path) {
    $file_url = 'https://api.telegram.org/file/bot'.$this -> bot_token.'/'.$file_path;
    $in = fopen($file_url, 'rb');
    $out = fopen($local_file_path, 'wb');
    while ($chunk = fread($in, 8192)) {
        fwrite($out, $chunk, 8192);
    }
    fclose($in);
    fclose($out);
}
    static function download_File($file_url, $local_file_path) {
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
    static function getData() {
    if (empty($this -> data)) {
        $rawData = file_get_contents('php://input');
        return json_decode($rawData, true);
    } else {
        return $this -> data;
    }
}


static function message() {
    if (isset($this->data['message'])) {
      return $this->data['message'];
    } elseif (isset($this->data['callback_query'])) {
      return $this->data['callback_query'];
    } elseif (isset($this->data['inline_query'])) {
      return $this->data['inline_query'];
    } elseif (isset($this->data['edited_message'])) {
      return $this->data['edited_message'];
    } elseif (isset($this->data['channel_post'])) {
      return $this->data['channel_post'];
    } elseif (isset($this->data['edited_channel_post'])) {
      return $this->data['edited_channel_post'];
    } elseif (isset($this->data['chat_join_request'])) {
      return $this->data['chat_join_request'];
    } elseif (isset($this->data['my_chat_member'])) {
      return $this->data['my_chat_member'];
    } else {
      return [];
    }
  }


  static function media() {
    if (isset($this->message()['document'])) {
      return $this->message()['document'];
    } elseif (isset($this->message()['text'])) {
      return $this->message()['text'];
    } elseif (isset($this->message()['photo'])) {
      return $this->message()['photo'];
    }elseif (isset($this->message()['video'])) {
      return $this->message()['video'];
    }elseif (isset($this->message()['game'])) {
      return $this->message()['game'];
    }elseif (isset($this->message()['voice'])) {
      return $this->message()['voice'];
  } elseif (isset($this->message()['audio'])) {
      return $this->message()['audio'];
  } elseif (isset($this->message()['sticker'])) {
      return $this->message()['sticker'];
  } elseif (isset($this->message()['location'])) {
      return $this->message()['location'];
  } elseif (isset($this->message()['video_note'])) {
      return $this->message()['video_note'];
  } elseif (isset($this->message()['contact'])) {
      return $this->message()['contact'];
  } elseif (isset($this->message()['reply_to_message'])) {
      return $this->message()['reply_to_message'];
  } elseif (isset($this->message()['forward_from'])) {
      return $this->message()['forward_from'];
    } else {
      return [];
    }
  }
  static function send($send , array $query) {
    return $this -> bot($send, $query);
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

     static function exe_query($query) {
          try {
              $result = $this->connection->query($query);
              return $result;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}

 static function __destruct() {
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

     static function query($sql) {
    try {
            $result = $this->connection->query($sql);
             return $result;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }}

     static function close() {
        $this->connection->close();
    }
}

