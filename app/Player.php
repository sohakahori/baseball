<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Pitcher;

use App\Fielder;

use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    //テーブル名とモデル名を紐付ける
    protected $table = 'players';
    
    //論理削除
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function getPicherDetail(){
        return $this->hasOne('App\Pitcher', 'players_id', 'id');
    }
    
    public function getFilderDetail(){
        return $this->hasOne('App\Fielder', 'players_id', 'id');
    }
    
    //所属チーム名を取得 数値→チーム名(string)変換メソッド
    public static function getStringByValue($obj)
    {
        foreach($obj as &$value){
            switch($value->club){
                case '1';
                    $value->club = '北海道日本ハムファイターズ';
                    break;
                case '2';
                    $value->club = '東北楽天ゴールデンイーグルス';
                    break;
                case '3';
                    $value->club = '千葉ロッテマリーンズ';
                    break;
                case '4';
                    $value->club = '埼玉西武ライオンズ';
                    break;
                case '5';
                    $value->club = 'オリックスバッファローズ';
                    break;
                case '6';
                    $value->club = '福岡ソフトバンクホークス';
                    break;
                case '7';
                    $value->club = '東京読売ジャイアンツ';
                    break;
                case '8';
                    $value->club = '東京ヤクルトスワローズ';
                    break;
                case '9';
                    $value->club = '横浜DeNAベイスターズ';
                    break;
                case '10';
                    $value->club = '中日ドラゴンズ';
                    break;
                case '11';
                    $value->club = '阪神タイガース';
                    break;
                case '12';
                    $value->club = '広島東洋カープ';
                    break;
            }       
        }
        return $obj;
    }
    
    //所属チーム名を取得 数値→チーム名(string)変換メソッド ※1レコードの場合
    public static function getStringByValueNoArray($obj)
    {
        switch($obj->club){
            case '1';
                $obj->club = '北海道日本ハムファイターズ';
                break;
            case '2';
                $obj->club = '東北楽天ゴールデンイーグルス';
                break;
            case '3';
                $obj->club = '千葉ロッテマリーンズ';
                break;
            case '4';
                $obj->club = '埼玉西武ライオンズ';
                break;
            case '5';
                $obj->club = 'オリックスバッファローズ';
                break;
            case '6';
                $obj->club = '福岡ソフトバンクホークス';
                break;
            case '7';
                $obj->club = '東京読売ジャイアンツ';
                break;
            case '8';
                $obj->club = '東京ヤクルトスワローズ';
                break;
            case '9';
                $obj->club = '横浜DeNAベイスターズ';
                break;
            case '10';
                $obj->club = '中日ドラゴンズ';
                break;
            case '11';
                $obj->club = '阪神タイガース';
                break;
            case '12';
                $obj->club = '広島東洋カープ';
                break;
        }
        return $obj;
    }
    
}
