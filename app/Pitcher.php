<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Pitcher extends Model
{
    //テーブル名とモデル名を紐付ける
    protected $table = 'pitchers';
    
    //論理削除
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
