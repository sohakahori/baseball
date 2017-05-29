<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Player;

use App\Pitcher;

use App\Fielder;

use App\Http\Requests\AdminRequest;

use App\Http\Requests\SearchRequest;

use App\Http\Requests\PicherRequest;

use Illuminate\Support\Facades\Auth;

use App\Permission;



class AdminBaseballController extends Controller
{
    
    
    protected $adminUserId;
    
    //ログイン認証
    public function __construct() {
        $this->middleware('auth');
        
        //ログインユーザのIdを取得
        if(Auth::user()){
            $this->adminUserId  = Auth::user()->id; //ログインユーザーのidを取得
        }
    }
    
    //検索画面
    public function getSearch()
    {
        return view('admin.list')->with('listFlg', '0');
    }
    
    //一覧画面
    public function getList(SearchRequest $request)
    {   
        $name   = $request->name;
        $number = $request->number;
        $club   = $request->club;
        
        //一覧データ取得処理
        $query = Player::query();
        if(!empty($name)){
            $query->where('name', '=', $name);
        }
        if($number === 0){
            $query->where('number', '=', $number);
        }else if(!empty($number)){
            $query->where('number', '=', $number);
        }
        
        if(!empty($club)){
            $query->where('club', '=', $club);
        }
        $list = $query->paginate(10);
        $formatList = Player::getStringByValue($list);
        
        //ログインユーザーが編集・削除可能なplayers_id(選手id)を取得
        $userPermissions = Permission::where('users_id', '=', $this->adminUserId)->get();
        
        //$listに編集・削除可能かどうかのステータスを付与 ※他の箇所でも使用するならメソッド化
        foreach($list as &$listVal){
            $listVal->status = 0; //編集削除の権限なし
            foreach($userPermissions as $perVal){
                if($listVal->id == $perVal->players_id){
                    $listVal->status = 1; //編集・削除の権限あり
                }
            }
        }
        
        //入力値表示用
        $inputValue["name"] = $name;
        $inputValue["number"] = $number;
        $inputValue["club"] = $club;

        return view('admin.list')->with('formatList', $formatList)
                                 ->with('listFlg', '1')
                                 ->with('inpVal', $inputValue);
    }
    
    //登録画面(野手)
    public function getCreate()
    {
        
        return view('admin.create');
    }
    
    //登録処理（野手）
    public function postCreate(AdminRequest $request)
    {
        //画像アップロード処理
        /*
        $file       = $request->file("image");
        $fileName   = $file->getClientOriginalName();
        $upload     = $file->move('image', $fileName);
         * 
         */

        $player =  new Player();
        $player->name     = $request->name;
        $player->number   = $request->number;
        $player->club     = $request->club;
        $player->position = $request->position;
        /*
        if(empty($request->image)){
            $player = $request->image;
        }
         * 
         */
        $player->save();
        //insertしたidを取得
        $last_insert_id = $player->id;
        
        $fielder                  = new Fielder();
        $fielder->players_id      = $last_insert_id;
        $fielder->dandou          = $request->dandou;
        $fielder->meet            = $request->meet;
        $fielder->power           = $request->power;
        $fielder->run             = $request->run;
        $fielder->shoulder        = $request->shoulder;
        $fielder->defense         = $request->defense;
        $fielder->catch           = $request->catch;
        $fielder->special_ability = $request->special_ability;
        $fielder->save();
        
        
        //登録処理をした、管理者のidと登録したplayerのidをを権限テーブルにインサート
        $permission = new Permission();
        $permission->players_id = $last_insert_id;
        $permission->users_id   = $this->adminUserId;
        $permission->save();
        
        
        $msg = $request->input('name').'を登録しました。';
        
        return redirect()->to('admin/search')->with('msg', $msg);
    }
    
    //登録画面（投手）
    public function getCreatepicher()
    {
        
        return view('admin.createpicher');
    }
    
    //登録処理（投手）
    public function postCreatepicher(PicherRequest $request)
    {
        //画像アップロード処理
        /*
        $file       = $request->file("image");
        $fileName   = $file->getClientOriginalName();
        $upload     = $file->move('image', $fileName);
         * 
         */

        $player =  new Player();
        $player->name     = $request->name;
        $player->number   = $request->number;
        $player->club     = $request->club;
        $player->position = $request->position;
        /*
        if(empty($request->image)){
            $player = $request->image;
        }
         * 
         */
        $player->save();
        //insertしたidを取得
        $last_insert_id = $player->id;
        
        $pitcher                  = new Pitcher();
        $pitcher->players_id      = $last_insert_id;
        $pitcher->speed           = $request->speed;
        $pitcher->control         = $request->control;
        $pitcher->stamina         = $request->stamina;
        $pitcher->breaking_ball   = $request->breaking_ball;
        $pitcher->special_ability = $request->special_ability;
        $pitcher->save();
        
        //登録処理をした、管理者のidと登録したplayerのidをを権限テーブルにインサート
        $permission = new Permission();
        $permission->players_id = $last_insert_id;
        $permission->users_id   = $this->adminUserId;
        $permission->save();

        $msg = $request->input('name').'を登録しました。';
        
        return redirect()->to('admin/search')->with('msg', $msg);
    }
    
    //詳細画面処理
    public function getDetail($id)
    {
        $player      = new Player();
        $getPlayer   = $player->find($id);
        $playerInfo  = Player::getStringByValueNoArray($getPlayer);
                
        if($playerInfo->position == '投'){
            $detail  = $playerInfo->getPicherDetail;
            $positionFlg = 0;
        }else{
            $detail  = $playerInfo->getFilderDetail;
            $positionFlg = 1;
        }
        
        return view('admin.detail')->with('playerInfo', $playerInfo)
                                   ->with('detail', $detail)
                                   ->with('pozitionFlg', $positionFlg);
    }          
    
    //変更画面表示
    public function getEdit($id)
    {
        $playerInfo  = Player::find($id);
        if($playerInfo->position == '投'){ //投手の時、投手データを取得
            $detail  = $playerInfo->getPicherDetail;
            $file    = 'admin/editpicher';
        }else{ //野手の時野手データを取得
            $detail  = $playerInfo->getFilderDetail;
            $file    = 'admin/editfielder';
        }
        
        return view($file)->with('playerInfo', $playerInfo)
                          ->with('detail', $detail);
    }
    
    //野手変更処理
    public function postEditfielder(AdminRequest $request, $id)
    {
        $playerInfo            = Player::find($id);
        $playerInfo->name      = $request->name;
        $playerInfo->number    = $request->number;
        $playerInfo->club      = $request->club;
        $playerInfo->position  = $request->position;
        $playerInfo->save();
        
        $detail                  = $playerInfo->getFilderDetail;
        $detail->dandou          = $request->dandou;
        $detail->meet            = $request->meet;
        $detail->power           = $request->power;
        $detail->run             = $request->run;
        $detail->shoulder        = $request->shoulder;
        $detail->defense         = $request->defense;
        $detail->catch           = $request->catch;
        $detail->special_ability = $request->special_ability;
        $detail->save();
        
        $msg = $request->input('name').'を更新しました。';
        
        return redirect()->to('admin/search')->with('msg', $msg);
    }
    
    //投手変更処理
    public function postEditpicher(PicherRequest $request, $id)
    {
        $playerInfo   = Player::find($id);
        $playerInfo->name      = $request->name;
        $playerInfo->number    = $request->number;
        $playerInfo->club      = $request->club;
        $playerInfo->position  = $request->position;
        $playerInfo->save();
        
        $detail                  = $playerInfo->getPicherDetail;
        $detail->speed           = $request->speed;
        $detail->control         = $request->control;
        $detail->stamina         = $request->stamina;
        $detail->breaking_ball   = $request->breaking_ball;
        $detail->special_ability = $request->special_ability;
        $detail->save();
        
        $msg = $request->input('name').'を更新しました。';

        return redirect()->to('admin/search')->with('msg', $msg);
    }
    
    //削除処理
    public function getDelete($id)
    {
        $playerInfo = Player::find($id);
        if($playerInfo->position == '投'){
            $detail = $playerInfo->getPicherDetail;
        }else{
            $detail = $playerInfo->getFilderDetail;
        }
        
        //削除
        $playerInfo->delete();
        $detail->delete();
        Permission::where('players_id', '=', $id)->delete();
        
        return redirect()->to('admin/search');
    }
    
    //csv出力
    public function getCsv(SearchRequest $request)
    {
        $query = Player::query();
        
        if(!empty($request->name)){
            $query->where('name', '=', $request->name);
        }
        if(!empty($request->number)){
            $query->where('number', '=', $request->number);
        }
        if(!empty($club)){
            $query->where('club', '=', $request->club);
        }
        $playerInfo = $query->get(['name', 'number', 'club', 'position'])->toArray();
        
        $csvHeader = ['登録選手名', '背番号', '所属チーム', 'ポジション'];

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
