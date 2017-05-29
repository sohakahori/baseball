<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    //テーブル名とモデル名を紐付ける
    protected $table = 'user_permissions';
    
    //論理削除
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
