<?php
/**
 * Created by PhpStorm.
 * User: Bac Truong Van
 * Date: 16/03/2017
 * Time: 9:24 CH
 */
namespace common\components;

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
}