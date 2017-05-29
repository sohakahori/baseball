@extends('layouts.app')
@section('content')

<h2>野手登録</h2>
<br><br>
<form class='form-horizontal' method="POST" action="{{url('/admin/create')}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="position_flg" value="2"><!--投手用入力フォームの場合は1、野手用の入力フォームの場合は2-->
    
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
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>
    </div>
    <!--背番号-->
    <div class="form-group">
        <label class="control-label col-sm-2">背番号</label>
        <div class="col-sm-10">
            <input type="text" name="number" id="number" class="form-control" value="{{ old('number') }}">
        </div>
    </div>
    <!--所属チーム-->
    <div class="form-group">
        <label class="control-label col-sm-2">所属チーム</label>
        <div class="col-sm-10">
            <select name="club" id="club" class="form-control">
                <option value="">所属チームの選択</option>
                <option value="1" @if(old('club') == '1') selected @endif>日本ハムファイターズ</option>
                <option value="2" @if(old('club') == '2') selected @endif>東北楽天ゴールデンイーグルス</option>
                <option value="3" @if(old('club') == '3') selected @endif>千葉ロッテマーリンズ</option>
                <option value="4" @if(old('club') == '4') selected @endif>埼玉西武来ライオンズ</option>
                <option value="5" @if(old('club') == '5') selected @endif>オリックスバッファローズ</option>
                <option value="6" @if(old('club') == '6') selected @endif>福岡ソフトバンクホークス</option>
                <option value="7" @if(old('club') == '7') selected @endif>東京読売ジャイアンツ</option>
                <option value="8" @if(old('club') == '8') selected @endif>東京ヤクルトスワローズ</option>
                <option value="9" @if(old('club') == '9') selected @endif>横浜DeNAベイスターズ</option>
                <option value="10" @if(old('club') == '10') selected @endif>中日ドラゴンズ</option>
                <option value="11" @if(old('club') == '11') selected @endif>阪神タイガース</option>
                <option value="12" @if(old('club') == '12') selected @endif>中日ドラゴンズ</option>
            </select>
        </div>
    </div>
    <!--守備位置-->
    <div class="form-group">
        <label class="control-label col-sm-2">守備位置</label>
        <div class="col-sm-10">
            <select name="position" id="position" class="form-control">
                <option value="">守備位置の選択</option>
                <option value="投" @if(old('position') == '投') selected @endif>投</option>
                <option value="捕" @if(old('position') == '捕') selected @endif>捕</option>
                <option value="一" @if(old('position') == '一') selected @endif>一</option>
                <option value="二" @if(old('position') == '二') selected @endif>二</option>
                <option value="三" @if(old('position') == '三') selected @endif>三</option>
                <option value="遊" @if(old('position') == '遊') selected @endif>遊</option>
                <option value="左" @if(old('position') == '左') selected @endif>左</option>
                <option value="中" @if(old('position') == '中') selected @endif>中</option>
                <option value="右" @if(old('position') == '右') selected @endif>右</option>
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
                <option value="4" @if(old('dandou') == '4') selected @endif>4</option>
                <option value="3" @if(old('dandou') == '3') selected @endif>3</option>
                <option value="2" @if(old('dandou') == '2') selected @endif>2</option>
                <option value="1" @if(old('dandou') == '1') selected @endif>1</option>
            </select>
        </div>
    </div>
    <!--ミート-->
    <div class="form-group">
        <label class="control-label col-sm-2">ミート</label>
        <div class="col-sm-10">
            <select name="meet" id="meet" class="form-control">
                <option value="">ミートの選択</option>
                <option value="A" @if(old('meet') == 'A') selected @endif>A</option>
                <option value="B" @if(old('meet') == 'B') selected @endif>B</option>
                <option value="C" @if(old('meet') == 'C') selected @endif>C</option>
                <option value="D" @if(old('meet') == 'D') selected @endif>D</option>
                <option value="E" @if(old('meet') == 'E') selected @endif>E</option>
                <option value="F" @if(old('meet') == 'F') selected @endif>F</option>
                <option value="G" @if(old('meet') == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--パワー-->
    <div class="form-group">
        <label class="control-label col-sm-2">パワー</label>
        <div class="col-sm-10">
            <select name="power" id="power" class="form-control">
                <option value="">パワーの選択</option>
                <option value="A" @if(old('power') == 'A') selected @endif>A</option>
                <option value="B" @if(old('power') == 'B') selected @endif>B</option>
                <option value="C" @if(old('power') == 'C') selected @endif>C</option>
                <option value="D" @if(old('power') == 'D') selected @endif>D</option>
                <option value="E" @if(old('power') == 'E') selected @endif>E</option>
                <option value="F" @if(old('power') == 'F') selected @endif>F</option>
                <option value="G" @if(old('power') == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--走力ー-->
    <div class="form-group">
        <label class="control-label col-sm-2">走力</label>
        <div class="col-sm-10">
            <select name="run" id="run" class="form-control">
                <option value="">走力の選択</option>
                <option value="A" @if(old('run') == 'A') selected @endif>A</option>
                <option value="B" @if(old('run') == 'B') selected @endif>B</option>
                <option value="C" @if(old('run') == 'C') selected @endif>C</option>
                <option value="D" @if(old('run') == 'D') selected @endif>D</option>
                <option value="E" @if(old('run') == 'E') selected @endif>E</option>
                <option value="F" @if(old('run') == 'F') selected @endif>F</option>
                <option value="G" @if(old('run') == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--肩力ー-->
    <div class="form-group">
        <label class="control-label col-sm-2">肩力</label>
        <div class="col-sm-10">
            <select name="shoulder" id="power" class="form-control">
                <option value="">肩力の選択</option>
                <option value="A" @if(old('shoulder') == 'A') selected @endif>A</option>
                <option value="B" @if(old('shoulder') == 'B') selected @endif>B</option>
                <option value="C" @if(old('shoulder') == 'C') selected @endif>C</option>
                <option value="D" @if(old('shoulder') == 'D') selected @endif>D</option>
                <option value="E" @if(old('shoulder') == 'E') selected @endif>E</option>
                <option value="F" @if(old('shoulder') == 'F') selected @endif>F</option>
                <option value="G" @if(old('shoulder') == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--守備力ー-->
    <div class="form-group">
        <label class="control-label col-sm-2">守備力</label>
        <div class="col-sm-10">
            <select name="defense" id="defense" class="form-control">
                <option value="">守備力の選択</option>
                <option value="A" @if(old('defense') == 'A') selected @endif>A</option>
                <option value="B" @if(old('defense') == 'B') selected @endif>B</option>
                <option value="C" @if(old('defense') == 'C') selected @endif>C</option>
                <option value="D" @if(old('defense') == 'D') selected @endif>D</option>
                <option value="E" @if(old('defense') == 'E') selected @endif>E</option>
                <option value="F" @if(old('defense') == 'F') selected @endif>F</option>
                <option value="G" @if(old('defense') == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--捕球ー-->
    <div class="form-group">
        <label class="control-label col-sm-2">捕球</label>
        <div class="col-sm-10">
            <select name="catch" id="catch" class="form-control">
                <option value="">捕球の選択</option>
                <option value="A" @if(old('catch') == 'A') selected @endif>A</option>
                <option value="B" @if(old('catch') == 'B') selected @endif>B</option>
                <option value="C" @if(old('catch') == 'C') selected @endif>C</option>
                <option value="D" @if(old('catch') == 'D') selected @endif>D</option>
                <option value="E" @if(old('catch') == 'E') selected @endif>E</option>
                <option value="F" @if(old('catch') == 'F') selected @endif>F</option>
                <option value="G" @if(old('catch') == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--特殊能力-->
    <div class="form-group">
        <label class="control-label col-sm-2">特殊能力</label>
        <div class="col-sm-10">
            <textarea name="special_ability" id="special_ability" class="form-control" style="height:100px;"></textarea>
        </div>
    </div>
    
    <!--ボタン-->
    <button class="btn btn-lg btn-primary btn-block" type="submit">送信</button>
</form>

@endsection
