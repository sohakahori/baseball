<?php

namespace App\Lib;

class Csv {
    
    public static function outputCsv($playerInfo)
    {
        $csvHeader = ['登録選手名', '背番号', '所属チーム', 'ポジション', '球速', 'コントロール', 'スタミナ', '変化球', 'ミート', '弾道', 'パワー', '走力', '肩力', '守備力', '捕球'];

        array_unshift($playerInfo, $csvHeader);
        $stream = fopen('php://temp', 'r+b');
        foreach($playerInfo as $value){
            fputcsv($stream, $value);
        }
        rewind($stream);
        $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        );
        
        return \Response::make($csv, 200, $headers);
    }
}