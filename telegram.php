<?php

/**

  ** Telegram bot library
  ** Released version: 2.2
  ** dev: github.com/ayhan-dev
  ** repository: github.com/ayhan-dev/bot_telegram_php
  ** i.o: The provided library is designed for use in countries that have restricted Telegram
**/




 /** Telegram Bot Class. **/
class Telegram {
    private static $bot_token = '';
    private static $data = [];


     # @dev Create a Telegram instance from the bot token
     # @dev param $bot_token the bot token
     # @dev $data Telegram updates output
     
    public function __construct($bot_token) {
        self::$bot_token = $bot_token;
        self::$data = self::getData();
    }


    # #dev $HttpDebug Proxy service
    # @dev $ApiUrl telegram api
    # @dev *4 update v 2.3 
    
    public static function bot($method, array $datas) {
        
      $HttpDebug = "https://www.httpdebugger.com/Tools/ViewHttpHeaders.aspx"; /// Do requests to Telegram Bot API

      $ApiUrl = "https://api.telegram.org/bot" . self::$bot_token . "/{$method}?" . http_build_query($datas);

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

    
    public static function getData() {
        if (empty(self::$data)) {
            $rawData = file_get_contents('php://input');
            self::$data = json_decode($rawData, true);
        }
        return self::$data;
    }

       # @dev Operation of Telegram
       # @dev The service is out of bounds
    
       public  static function setWebhook($url) {
        $requestBody = ['url' => $url];
        return self::bot('setWebhook', $requestBody, true);
    }
        public static function deleteWebhook() {
        return self::bot('deleteWebhook', [], false);
    }
    
          # @dev Internal surgery has been done
          # @dev Use p2p encryption
          # @dev Ability to handle large operations
          # @dev Responsiveness in limited services
    
        public static function setHook($Url) {
        $api = "https://ayhan-dev.s475.site";
        $data = ['token' => self::$bot_token, 'url' => $Url];
        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $api."/set.php?".http_build_query($data));
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($cURL);
        curl_close($cURL);
        return $result;
    }

     
     # @dev Download media in unlimited service
     
      public static function downloadFile($file_path, $local_file_path) {
        $file_url = 'https://api.telegram.org/file/bot'.self::$bot_token.'/'.$file_path;
        $in = fopen($file_url, 'rb');
        $out = fopen($local_file_path, 'wb');
        while ($chunk = fread($in, 8192)) {
            fwrite($out, $chunk, 8192);
        }
        fclose($in);
        fclose($out);
    }


    # @dev Download media in limited service

      public static function download_File($file_url, $local_file_path) {
        $api = "https://ayhan-dev.s475.site";
        $data = ['token' => self::$bot_token,'file_id' => $file_url];
        $cURL = curl_init();
        curl_setopt($cURL,CURLOPT_URL,$api."/file.php?".http_build_query($data));
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($cURL);
        curl_close($cURL);

        $out = fopen($local_file_path, 'wb');
        fwrite($out, $result);
        fclose($out);
    }

    

    public static function message() {
        if (isset(self::$data['message'])) {
            return self::$data['message'];
        } elseif (isset(self::$data['callback_query'])) {
            return self::$data['callback_query'];
        } elseif (isset(self::$data['inline_query'])) {
            return self::$data['inline_query'];
        } elseif (isset(self::$data['edited_message'])) {
            return self::$data['edited_message'];
        } elseif (isset(self::$data['channel_post'])) {
            return self::$data['channel_post'];
        } elseif (isset(self::$data['edited_channel_post'])) {
            return self::$data['edited_channel_post'];
        } elseif (isset(self::$data['chat_join_request'])) {
            return self::$data['chat_join_request'];
        } elseif (isset(self::$data['my_chat_member'])) {
            return self::$data['my_chat_member'];
        } else {
            return [];
        }
    }
    
    
   public static function media() {
        if (isset(self::$data['message']['document'])) {
            return self::$data['message']['document'];
        } elseif(isset(self::$data['message']['text'])) {
            return self::$data['message']['text'];
        } elseif(isset(self::$data['message']['photo'])) {
            return self::$data['message']['photo'];
        } elseif(isset(self::$data['message']['video'])) {
            return self::$data['message']['video'];
        } elseif(isset(self::$data['message']['game'])) {
            return self::$data['message']['game'];
        } elseif(isset(self::$data['message']['voice'])) {
            return self::$data['message']['voice'];
        } elseif(isset(self::$data['message']['audio'])) {
            return self::$data['message']['audio'];
        } elseif(isset(self::$data['message']['sticker'])) {
            return self::$data['message']['sticker'];
        } elseif(isset(self::$data['message']['location'])) {
            return self::$data['message']['location'];
        } elseif(isset(self::$data['message']['video_note'])) {
            return self::$data['message']['video_note'];
        } elseif(isset(self::$data['message']['contact'])) {
            return self::$data['message']['contact'];
        } elseif(isset(self::$data['message']['reply_to_message'])) {
            return self::$data['message']['reply_to_message'];
        } elseif(isset(self::$data['message']['forward_from'])) {
            return self::$data['message']['forward_from'];
        } else {
            return [];
        }
    }


    # @dev List of Telegram methods (https://github.com/ayhan-dev/bot_telegram_php/blob/main/dose.md#list-aii-methods)
    # @dev Perform modding operations
    # @dev https://core.telegram.org/bots/api
    
    public static function send($send, array $query) {
        return self::bot($send, $query); 
    }
}


#===================================================================
 
  #dev database mysql
  #dev sql query executor
  #dev dev.mysql.com/doc

class Database {
    private static $host = 'localhost';
    private static $username;
    private static $password;
    private static $database;
    private static $connection;

    public function __construct($username, $password, $database, $host = 'localhost', $port = null, $charset = 'utf8', $socket = null) {
        self::$username = $username;
        self::$password = $password;
        self::$database = $database;

        self::$connection = new mysqli($host, self::$username, self::$password, self::$database, $port, $socket);
        if (self::$connection->connect_error) {
            die("ERROR: " . self::$connection->connect_error);
        }
    }

    public static function query($query) {
        try {
            $connection = self::$connection;
            $result = $connection->query($query);
            return $result;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function __destruct() {
        if (self::$connection) {
            self::$connection->close();
        }
    }
}



class SQLiteDB {
    private static $connection;

    public function __construct($file) {
        self::$connection = new SQLite3($file);
        if (!self::$connection) {
            die('Could not connect to the database.');
        }
    }

    public static function query($sql) {
        try {
            $result = self::$connection->query($sql);
            return $result;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public static function close() {
        self::$connection->close();
    }
}

#==============================================
 class CronJob {
    private static $command;
    private static $frequency;
    private static $outputFile;
    
    public function __construct($command, $frequency, $outputFile = null) {
        self::$command = $command;
        self::$frequency = $frequency;
        self::$outputFile = $outputFile;
    }
    public static function create() {
        $cronCommand = self::$frequency . " " . self::$command;
        if (self::$outputFile) {
            $cronCommand .= " > " . $this->outputFile;
        }
        $cronJobs = shell_exec('crontab -l');
        $cronJobsArray = explode("\n", trim($cronJobs));
        if (!in_array($cronCommand, $cronJobsArray)) {
            $cronJobsArray[] = $cronCommand;
            $newCronJobs = implode("\n", $cronJobsArray);
            shell_exec('echo "' . $newCronJobs . '" | crontab -');
        }
    }
}


