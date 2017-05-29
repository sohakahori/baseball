@extends('layouts.app')
@section('content')

<h2>野手編集</h2>
<br><br>
<form class='form-horizontal' method="POST" action="{{url('/admin/editfielder', $playerInfo->id)}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    
    <!--エラーメッセージ-->
    @if($errors->any())
    <center>
        <div class=""alert alert-dange>
            <div>
                @foreach($errors->all() as $value)
                    <div class="text-danger">{{$value}}</div>
                @endforeach
            </div>
        </div>
    </center>
    <br>
    <br>
    @endif
    
    

    <!--登録選手名-->
    <div class="form-group">
        <label class="control-label col-sm-2">登録選手名</label>
        <div class="col-sm-10">
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $playerInfo->name) }}">
        </div>
    </div>
    <!--背番号-->
    <div class="form-group">
        <label class="control-label col-sm-2">背番号</label>
        <div class="col-sm-10">
            <input type="text" name="number" id="number" class="form-control" value="{{ old('number', $playerInfo->number) }}">
        </div>
    </div>
    <!--所属チーム-->
    <div class="form-group">
        <label class="control-label col-sm-2">所属チーム</label>
        <div class="col-sm-10">
            <select name="club" id="club" class="form-control">
                <option value="">所属チームの選択</option>
                <option value="1" @if(old('club', $playerInfo->club) == '1') selected @endif>日本ハムファイターズ</option>
                <option value="2" @if(old('club', $playerInfo->club) == '2') selected @endif>東北楽天ゴールデンイーグルス</option>
                <option value="3" @if(old('club', $playerInfo->club) == '3') selected @endif>千葉ロッテマーリンズ</option>
                <option value="4" @if(old('club', $playerInfo->club) == '4') selected @endif>埼玉西武来ライオンズ</option>
                <option value="5" @if(old('club', $playerInfo->club) == '5') selected @endif>オリックスバッファローズ</option>
                <option value="6" @if(old('club', $playerInfo->club) == '6') selected @endif>福岡ソフトバンクホークス</option>
                <option value="7" @if(old('club', $playerInfo->club) == '7') selected @endif>東京読売ジャイアンツ</option>
                <option value="8" @if(old('club', $playerInfo->club) == '8') selected @endif>東京ヤクルトスワローズ</option>
                <option value="9" @if(old('club', $playerInfo->club) == '9') selected @endif>横浜DeNAベイスターズ</option>
                <option value="10" @if(old('club', $playerInfo->club) == '10') selected @endif>中日ドラゴンズ</option>
                <option value="11" @if(old('club', $playerInfo->club) == '11') selected @endif>阪神タイガース</option>
                <option value="12" @if(old('club', $playerInfo->club) == '12') selected @endif>中日ドラゴンズ</option>
            </select>
        </div>
    </div>
    <!--守備位置-->
    <div class="form-group">
        <label class="control-label col-sm-2">守備位置</label>
        <div class="col-sm-10">
            <select name="position" id="position" class="form-control">
                <option value="">守備位置の選択</option>
                <option value="捕" @if(old('position', $playerInfo->position) == '捕') selected @endif>捕</option>
                <option value="一" @if(old('position', $playerInfo->position) == '一') selected @endif>一</option>
                <option value="二" @if(old('position', $playerInfo->position) == '二') selected @endif>二</option>
                <option value="三" @if(old('position', $playerInfo->position) == '三') selected @endif>三</option>
                <option value="遊" @if(old('position', $playerInfo->position) == '遊') selected @endif>遊</option>
                <option value="左" @if(old('position', $playerInfo->position) == '左') selected @endif>左</option>
                <option value="中" @if(old('position', $playerInfo->position) == '中') selected @endif>中</option>
                <option value="右" @if(old('position', $playerInfo->position) == '右') selected @endif>右</option>
            </select>
        </div>
    </div>
    
    <!--選手画像-->
    <!--
    <div class="form-group">
        <label class="control-label col-sm-2">選手画像</label>
        <div class="col-sm-10">
            <input type="file" name="image" id="image" class="form-control">
        </div>
    </div>
    -->
    
    <!--弾道-->
    <div class="form-group">
        <label class="control-label col-sm-2">弾道</label>
        <div class="col-sm-10">
            <select name="dandou" id="dandou" class="form-control">
                <option value="">弾道の選択</option>
                <option value="4" @if(old('dandou', $detail->dandou) == '4') selected @endif>4</option>
                <option value="3" @if(old('dandou', $detail->dandou) == '3') selected @endif>3</option>
                <option value="2" @if(old('dandou', $detail->dandou) == '2') selected @endif>2</option>
                <option value="1" @if(old('dandou', $detail->dandou) == '1') selected @endif>1</option>
            </select>
        </div>
    </div>
    <!--ミート-->
    <div class="form-group">
        <label class="control-label col-sm-2">ミート</label>
        <div class="col-sm-10">
            <select name="meet" id="meet" class="form-control">
                <option value="">ミートの選択</option>
                <option value="A" @if(old('meet', $detail->meet) == 'A') selected @endif>A</option>
                <option value="B" @if(old('meet', $detail->meet) == 'B') selected @endif>B</option>
                <option value="C" @if(old('meet', $detail->meet) == 'C') selected @endif>C</option>
                <option value="D" @if(old('meet', $detail->meet) == 'D') selected @endif>D</option>
                <option value="E" @if(old('meet', $detail->meet) == 'E') selected @endif>E</option>
                <option value="F" @if(old('meet', $detail->meet) == 'F') selected @endif>F</option>
                <option value="G" @if(old('meet', $detail->meet) == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--パワー-->
    <div class="form-group">
        <label class="control-label col-sm-2">パワー</label>
        <div class="col-sm-10">
            <select name="power" id="power" class="form-control">
                <option value="">パワーの選択</option>
                <option value="A" @if(old('power', $detail->power) == 'A') selected @endif>A</option>
                <option value="B" @if(old('power', $detail->power) == 'B') selected @endif>B</option>
                <option value="C" @if(old('power', $detail->power) == 'C') selected @endif>C</option>
                <option value="D" @if(old('power', $detail->power) == 'D') selected @endif>D</option>
                <option value="E" @if(old('power', $detail->power) == 'E') selected @endif>E</option>
                <option value="F" @if(old('power', $detail->power) == 'F') selected @endif>F</option>
                <option value="G" @if(old('power', $detail->power) == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--走力ー-->
    <div class="form-group">
        <label class="control-label col-sm-2">走力</label>
        <div class="col-sm-10">
            <select name="run" id="run" class="form-control">
                <option value="">走力の選択</option>
                <option value="A" @if(old('run', $detail->run) == 'A') selected @endif>A</option>
                <option value="B" @if(old('run', $detail->run) == 'B') selected @endif>B</option>
                <option value="C" @if(old('run', $detail->run) == 'C') selected @endif>C</option>
                <option value="D" @if(old('run', $detail->run) == 'D') selected @endif>D</option>
                <option value="E" @if(old('run', $detail->run) == 'E') selected @endif>E</option>
                <option value="F" @if(old('run', $detail->run) == 'F') selected @endif>F</option>
                <option value="G" @if(old('run', $detail->run) == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--肩力ー-->
    <div class="form-group">
        <label class="control-label col-sm-2">肩力</label>
        <div class="col-sm-10">
            <select name="shoulder" id="power" class="form-control">
                <option value="">肩力の選択</option>
                <option value="A" @if(old('shoulder', $detail->shoulder) == 'A') selected @endif>A</option>
                <option value="B" @if(old('shoulder', $detail->shoulder) == 'B') selected @endif>B</option>
                <option value="C" @if(old('shoulder', $detail->shoulder) == 'C') selected @endif>C</option>
                <option value="D" @if(old('shoulder', $detail->shoulder) == 'D') selected @endif>D</option>
                <option value="E" @if(old('shoulder', $detail->shoulder) == 'E') selected @endif>E</option>
                <option value="F" @if(old('shoulder', $detail->shoulder) == 'F') selected @endif>F</option>
                <option value="G" @if(old('shoulder', $detail->shoulder) == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--守備力ー-->
    <div class="form-group">
        <label class="control-label col-sm-2">守備力</label>
        <div class="col-sm-10">
            <select name="defense" id="defense" class="form-control">
                <option value="">守備力の選択</option>
                <option value="A" @if(old('defense', $detail->defense) == 'A') selected @endif>A</option>
                <option value="B" @if(old('defense', $detail->defense) == 'B') selected @endif>B</option>
                <option value="C" @if(old('defense', $detail->defense) == 'C') selected @endif>C</option>
                <option value="D" @if(old('defense', $detail->defense) == 'D') selected @endif>D</option>
                <option value="E" @if(old('defense', $detail->defense) == 'E') selected @endif>E</option>
                <option value="F" @if(old('defense', $detail->defense) == 'F') selected @endif>F</option>
                <option value="G" @if(old('defense', $detail->defense) == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--捕球ー-->
    <div class="form-group">
        <label class="control-label col-sm-2">捕球</label>
        <div class="col-sm-10">
            <select name="catch" id="catch" class="form-control">
                <option value="">捕球の選択</option>
                <option value="A" @if(old('catch', $detail->catch) == 'A') selected @endif>A</option>
                <option value="B" @if(old('catch', $detail->catch) == 'B') selected @endif>B</option>
                <option value="C" @if(old('catch', $detail->catch) == 'C') selected @endif>C</option>
                <option value="D" @if(old('catch', $detail->catch) == 'D') selected @endif>D</option>
                <option value="E" @if(old('catch', $detail->catch) == 'E') selected @endif>E</option>
                <option value="F" @if(old('catch', $detail->catch) == 'F') selected @endif>F</option>
                <option value="G" @if(old('catch', $detail->catch) == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--特殊能力-->
    <div class="form-group">
        <label class="control-label col-sm-2">特殊能力</label>
        <div class="col-sm-10">
            <textarea name="special_ability" id="special_ability" class="form-control" style="height:100px;">{{old('special_ability', $detail->special_ability)}}</textarea>
        </div>
    </div>
    
    <!--ボタン-->
    <button class="btn btn-lg btn-primary btn-block" type="submit">送信</button>
</form>

@endsection
