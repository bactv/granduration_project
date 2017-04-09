<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 16/03/2017
 * Time: 9:24 CH
 */
namespace common\components;

use Yii;

class Utility
{
    public static function formatDataTime($date_time, $symbol_origin, $symbol_format, $isDateTime = false)
    {
        if ($date_time == '') {
            return '';
        }
        $date = trim($date_time);
        $time = '';
        if ($isDateTime) {
              $date = explode(' ', trim($date_time))[0];
              $time = explode(' ', trim($date_time))[1];
        }
        $new_date = explode(trim($symbol_origin), $date)[2] . trim($symbol_format) . explode(trim($symbol_origin), $date)[1] . trim($symbol_format) . explode(trim($symbol_origin), $date)[0];
        return trim($new_date . ' ' . $time);
    }

    public static function uploadFile($folder_remote, $file)
    {
        $ftp_server = Yii::$app->params['ftp']['ftp_server'];
        $ftp_user_name = Yii::$app->params['ftp']['ftp_user_name'];
        $ftp_user_pass = Yii::$app->params['ftp']['ftp_user_pass'];

        // set up basic connection
        $conn_id = ftp_connect($ftp_server);

        // login with username and password
        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
        if (!$login_result) {
            return false;
        }

        if (file_exists ($folder_remote)) {
            ftp_mkdir($conn_id, $folder_remote);
        }
        // upload a file
        if (ftp_put($conn_id, $folder_remote, $file, FTP_BINARY)) {
            // close the connection
            ftp_close($conn_id);
            return true;
        } else {
            // close the connection
            ftp_close($conn_id);
            return false;
        }
    }

    /**
     * @param string $url
     * @param array $data
     * @return \StdClass
     */
    public static  function curlSendPost($url, $data = [])
    {
        $resource = curl_init();
        curl_setopt($resource, CURLOPT_URL, $url);
        curl_setopt($resource, CURLOPT_POST, true);
        curl_setopt($resource, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($resource, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($resource, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($resource);
        curl_close($resource);
        return $result;
    }
    /**
     * @param string $url
     * @param array $data
     * @return \StdClass
     */
    public static function curlSendGet($url, $data = [])
    {
        $resource = curl_init();
        curl_setopt($resource, CURLOPT_URL, $url.http_build_query($data));
        curl_setopt($resource, CURLOPT_HTTPGET, true);
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($resource, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($resource, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($resource);
        curl_close($resource);
        return $result;
    }

    /**
     * Chuyển đổi tiền sang xu
     * @param $real_money
     * @param int $bonus: 30%
     * @return float|int
     */
    public static function exchangeMoney($real_money, $bonus = 0)
    {
        $virtual = $real_money * 100;
        if ($bonus != 0) {
            return $bonus * $virtual / 100;
        }
        return $virtual;
    }
}